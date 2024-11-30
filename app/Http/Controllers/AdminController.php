<?php

namespace App\Http\Controllers;

use App\Models\EconChecklist;
use App\Models\GGUChecklist;
use App\Models\IplanChecklist;
use App\Models\IplanCommodity;
use App\Models\IplanRankAndComposite;
use App\Models\IreapChecklist;
use App\Models\SesChecklist;
use App\Models\SesRequirements;
use App\Models\Subproject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subprojects = Subproject::all();
        $subprojectsCount = $subprojects->count();
        $clearedSubprojectsCount = $subprojects->where('total', '>', 5)->count();
        $onGoingSubprojectsCount = $subprojects->where('total', '<', 6)->count();

        $failedSubprojectsCount = Subproject::where(function ($query) {
            $query->where('iPLAN', 'Failed')
                ->orWhere('iBUILD', 'Failed')
                ->orWhere('econ', 'Failed')
                ->orWhere('ses', 'Failed')
                ->orWhere('ggu', 'Failed')
                ->orWhere('iREAP', 'Failed');
        })->count();

        $ongoingSubprojects = Subproject::where('total', '<', 6)->get();
        $onGoingSubprojectsCount = $ongoingSubprojects->filter(function ($subproject) {
            return $subproject->iPLAN !== 'Failed' &&
                $subproject->iBUILD !== 'Failed' &&
                $subproject->econ !== 'Failed' &&
                $subproject->ses !== 'Failed' &&
                $subproject->ggu !== 'Failed' &&
                $subproject->iREAP !== 'Failed';
        })->count();

        $records = Subproject::select('iPLAN', 'iBUILD', 'econ', 'ses', 'ggu', 'iREAP')->get();

        $okCount = [];

        foreach ($records as $record) {
            $countOK = 0;

            if ($record->iPLAN === 'OK') {
                $countOK++;
            }
            if ($record->iBUILD === 'OK') {
                $countOK++;
            }
            if ($record->econ === 'OK') {
                $countOK++;
            }
            if ($record->ses === 'OK') {
                $countOK++;
            }
            if ($record->ggu === 'OK') {
                $countOK++;
            }
            if ($record->iREAP === 'OK') {
                $countOK++;
            }

            $okCount[] = $countOK;
        }

        $groupedData = array_count_values($okCount);

        $clearancesData = [];
        for ($i = 0; $i <= 9; $i++) {
            $clearancesData[] = $groupedData[$i] ?? 0;
        }

        //Project Type Data
        $projectTypeCounts = Subproject::select('projectType', DB::raw('count(*) as total'))
            ->whereIn('projectType', ['FMR', 'FMB', 'Bridge', 'CIS', 'PWS', 'VCRI'])
            ->groupBy('projectType')
            ->pluck('total', 'projectType');

        $projectTypeLabels = ['FMR', 'FMB', 'Bridge', 'CIS', 'PWS', 'VCRI'];
        $projectTypeData = [];
        foreach ($projectTypeLabels as $projectTypeLabel) {
            $projectTypeData[] = $projectTypeCounts->get($projectTypeLabel, 0);
        }

        //Project Category Data
        $projectCategoryCounts = Subproject::select('projectCategory', DB::raw('count(*) as total'))
            ->whereIn('projectCategory', ['Construction', 'Rehabilitation'])
            ->groupBy('projectCategory')
            ->pluck('total', 'projectCategory');

        $projectCategoryLabels = ['Construction', 'Rehabilitation'];
        $projectCategoryData = [];
        foreach ($projectCategoryLabels as $projectCategoryLabel) {
            $projectCategoryData[] = $projectCategoryCounts->get($projectCategoryLabel, 0);
        }

        //Provinces Data
        $provinceCounts = Subproject::select('provinces.province_name as province', DB::raw('count(*) as total'))
            ->join('provinces', 'subprojects.province', '=', 'provinces.id')
            ->whereIn('provinces.province_name', ['Ilocos Sur', 'Ilocos Norte', 'La Union', 'Pangasinan'])
            ->groupBy('provinces.province_name')
            ->pluck('total', 'province');

        $provinceLabels = ['Ilocos Sur', 'Ilocos Norte', 'La Union', 'Pangasinan'];
        $provinceData = [];
        foreach ($provinceLabels as $provinceLabel) {
            $provinceData[] = $provinceCounts->get($provinceLabel, 0);
        }

        return view('admin.dashboard', [
            'subprojects' => $subprojects,
            'subprojectsCount' => $subprojectsCount,
            'clearancesData' => $clearancesData,
            'projectTypeData' => $projectTypeData,
            'projectCategoryData' => $projectCategoryData,
            'provinceData' => $provinceData,
            'provinceLabels' => $provinceLabels,
            'clearedSubprojectsCount' => $clearedSubprojectsCount,
            'onGoingSubprojectsCount' => $onGoingSubprojectsCount,
            'failedSubprojectsCount' => $failedSubprojectsCount
        ]);
    }

    public function view($id)
    {
        $address = Subproject::join('provinces', 'subprojects.province', '=', 'provinces.id')
            ->join('municipalities', 'subprojects.municipality', '=', 'municipalities.id')
            ->join('barangays', 'subprojects.barangay', '=', 'barangays.id')
            ->where('subprojects.id', $id)
            ->firstOrFail();

        $subprojects = Subproject::where('subprojects.id', $id)
            ->select('subprojects.*', 'subprojects.letterOfRequest', 'subprojects.letterOfEndorsement')
            ->first();

        $iPlanChecklists = IplanChecklist::where('iplan_checklists.subprojectId', $id)->first();
        $commodities = [];
        if ($iPlanChecklists) {
            $commodities = IplanCommodity::where('checklistId', $iPlanChecklists->id)->get();
        }
        $rankAndComposite = null;
        if ($iPlanChecklists) {
            $rankAndComposite = IplanRankAndComposite::where('checklistId', $iPlanChecklists->id)->first();
        }

        $sesChecklists = SesChecklist::where('ses_checklists.subprojectId', $id)->first();
        $sesRequirements = [];
        if ($sesChecklists) {
            $sesRequirements = SesRequirements::where('checklistId', $sesChecklists->id)->get();
        }

        $gguChecklists = GGUChecklist::where('ggu_checklists.subprojectId', $id)->first();

        $gguReport = $gguChecklists ? $gguChecklists->report : null;

        $econChecklists = EconChecklist::where('econ_checklists.subprojectId', $id)->first();

        $iReapChecklists = IreapChecklist::where('ireap_checklists.subprojectId', $id)->first();

        // Query each checklist independently
        $vcriChecklists = DB::table('ibuild_vcri_checklists')
            ->where('subprojectId', $id)
            ->first();

        $fmrBridgeChecklists = DB::table('ibuild_fmr_bridge_checklists')
            ->where('subprojectId', $id)
            ->first();

        $pwsCisChecklists = DB::table('ibuild_pws_cis_checklists')
            ->where('subprojectId', $id)
            ->first();

        // Determine if any checklist exists
        $hasRecords = $vcriChecklists || $fmrBridgeChecklists || $pwsCisChecklists;

        // Determine the subproject type
        $subprojectType = null;
        if ($vcriChecklists) {
            $subprojectType = 'VCRI';
        } elseif ($fmrBridgeChecklists) {
            $subprojectType = 'Bridge';
        } elseif ($pwsCisChecklists) {
            $subprojectType = 'PWS';
        }

        $formattedReviewDateIPlan = null;
        if ($iPlanChecklists && $iPlanChecklists->reviewDate) {
            $formattedReviewDateIPlan = Carbon::parse($iPlanChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateSes = null;
        if ($sesChecklists && $sesChecklists->reviewDate) {
            $formattedReviewDateSes = Carbon::parse($sesChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateGgu = null;
        if ($gguChecklists && $gguChecklists->reviewDate) {
            $formattedReviewDateGgu = Carbon::parse($gguChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateIBuildVcri = null;
        if ($vcriChecklists && $vcriChecklists->reviewDate) {
            $formattedReviewDateIBuildVcri = Carbon::parse($vcriChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateIBuildFmrBridge = null;
        if ($fmrBridgeChecklists && $fmrBridgeChecklists->reviewDate) {
            $formattedReviewDateIBuildFmrBridge = Carbon::parse($fmrBridgeChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateIBuildPwsCis = null;
        if ($pwsCisChecklists && $pwsCisChecklists->reviewDate) {
            $formattedReviewDateIBuildPwsCis = Carbon::parse($pwsCisChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateEcon = null;
        if ($econChecklists && $econChecklists->reviewDate) {
            $formattedReviewDateEcon = Carbon::parse($econChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateIReap = null;
        if ($iReapChecklists && $iReapChecklists->reviewDate) {
            $formattedReviewDateIReap = Carbon::parse($iReapChecklists->reviewDate)->format('F j, Y');
        }

        return view('admin.view-subprojects.view-subproject', [
            'subprojects' => $subprojects,
            'address' => $address,
            'iPlanChecklists' => $iPlanChecklists,
            'commodities' => $commodities,
            'rankAndComposite' => $rankAndComposite,
            'sesChecklists' => $sesChecklists,
            'sesRequirements' => $sesRequirements,
            'gguChecklists' => $gguChecklists,
            'gguReport' => $gguReport,
            'vcriChecklists' => $vcriChecklists,
            'fmrBridgeChecklists' => $fmrBridgeChecklists,
            'pwsCisChecklists' => $pwsCisChecklists,
            'subprojectType' => $subprojectType,
            'hasRecords' => $hasRecords,
            'econChecklists' => $econChecklists,
            'iReapChecklists' => $iReapChecklists,

            'formattedReviewDateIPlan' => $formattedReviewDateIPlan,
            'formattedReviewDateSes' => $formattedReviewDateSes,
            'formattedReviewDateGgu' => $formattedReviewDateGgu,
            'formattedReviewDateIBuildVcri' => $formattedReviewDateIBuildVcri,
            'formattedReviewDateIBuildFmrBridge' => $formattedReviewDateIBuildFmrBridge,
            'formattedReviewDateIBuildPwsCis' => $formattedReviewDateIBuildPwsCis,
            'formattedReviewDateEcon' => $formattedReviewDateEcon,
            'formattedReviewDateIReap' => $formattedReviewDateIReap,
        ]);
    }

    public function getSubprojectData()
    {
        $data = [
            'iPLAN' => [
                'cleared' => DB::table('subprojects')->whereIn('iPLAN', ['OK', 'Passed'])->count(),
                'failed' => DB::table('subprojects')->where('iPLAN', 'Failed')->count(),
                'pending' => DB::table('subprojects')
                    ->where('iPLAN', 'Pending')
                    ->orWhereNull('iPLAN')
                    ->count(),
            ],
            'iBUILD' => [
                'cleared' => DB::table('subprojects')->whereIn('iBUILD', ['OK', 'Passed'])->count(),
                'failed' => DB::table('subprojects')->where('iBUILD', 'Failed')->count(),
                'pending' => DB::table('subprojects')
                    ->where('iBUILD', 'Pending')
                    ->orWhereNull('iBUILD')
                    ->count(),
            ],
            'econ' => [
                'cleared' => DB::table('subprojects')->whereIn('econ', ['OK', 'Passed'])->count(),
                'failed' => DB::table('subprojects')->where('econ', 'Failed')->count(),
                'pending' => DB::table('subprojects')
                    ->where('econ', 'Pending')
                    ->orWhereNull('econ')
                    ->count(),
            ],
            'ses' => [
                'cleared' => DB::table('subprojects')->whereIn('ses', ['OK', 'Passed'])->count(),
                'failed' => DB::table('subprojects')->where('ses', 'Failed')->count(),
                'pending' => DB::table('subprojects')
                    ->where('ses', 'Pending')
                    ->orWhereNull('ses')
                    ->count(),
            ],
            'ggu' => [
                'cleared' => DB::table('subprojects')->whereIn('ggu', ['OK', 'Passed'])->count(),
                'failed' => DB::table('subprojects')->where('ggu', 'Failed')->count(),
                'pending' => DB::table('subprojects')
                    ->where('ggu', 'Pending')
                    ->orWhereNull('ggu')
                    ->count(),
            ],
            'iREAP' => [
                'cleared' => DB::table('subprojects')->whereIn('iREAP', ['OK', 'Passed'])->count(),
                'failed' => DB::table('subprojects')->where('iREAP', 'Failed')->count(),
                'pending' => DB::table('subprojects')
                    ->where('iREAP', 'Pending')
                    ->orWhereNull('iREAP')
                    ->count(),
            ],
        ];

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.subprojects');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
