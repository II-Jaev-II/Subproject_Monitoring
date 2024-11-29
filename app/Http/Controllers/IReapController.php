<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIReapChecklistRequest;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IReapController extends Controller
{

    public function view($id)
    {
        $subprojects = Subproject::join('provinces', 'subprojects.province', '=', 'provinces.id')
            ->join('municipalities', 'subprojects.municipality', '=', 'municipalities.id')
            ->join('barangays', 'subprojects.barangay', '=', 'barangays.id')
            ->select('subprojects.*', 'subprojects.letterOfRequest', 'subprojects.letterOfEndorsement', 'provinces.province_name', 'municipalities.municipality_name', 'barangays.barangay_name')
            ->where('subprojects.id', $id)
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

        return view('ireap.view-subprojects.view-subproject', [
            'subprojects' => $subprojects,
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

            'formattedReviewDateIPlan' => $formattedReviewDateIPlan,
            'formattedReviewDateSes' => $formattedReviewDateSes,
            'formattedReviewDateGgu' => $formattedReviewDateGgu,
            'formattedReviewDateIBuildVcri' => $formattedReviewDateIBuildVcri,
            'formattedReviewDateIBuildFmrBridge' => $formattedReviewDateIBuildFmrBridge,
            'formattedReviewDateIBuildPwsCis' => $formattedReviewDateIBuildPwsCis,
            'formattedReviewDateEcon' => $formattedReviewDateEcon,
        ]);
    }

    public function validateSubproject($id)
    {
        $subproject = Subproject::findOrFail($id);

        return view('ireap.ireap-checklist', compact('subproject'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ireap.dashboard');
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
    public function store(StoreIReapChecklistRequest $request)
    {
        $user = Auth::user();
        $request->validated();

        $fileFields = [
            'authenticatedCopy' => 'uploadedFiles/authenticatedCopy',
            'byLaws' => 'uploadedFiles/byLaws',
            'certificateOfRegistration' => 'uploadedFiles/certificateOfRegistration',
            'certificateRegistry' => 'uploadedFiles/certificateRegistry',
            'certificates' => 'uploadedFiles/certificates',
            'existingOrganizationalStructure' => 'uploadedFiles/existingOrganizationalStructure',
            'secretaryCertificate' => 'uploadedFiles/secretaryCertificate',
            'photocopyReceipt' => 'uploadedFiles/photocopyReceipt',
            'latestFinancialReport' => 'uploadedFiles/latestFinancialReport',
            'swornAffidavit' => 'uploadedFiles/swornAffidavit',
            'moa' => 'uploadedFiles/moa',
            'releaseOfFunds' => 'uploadedFiles/releaseOfFunds',
        ];

        $multipleFileFields = [
            'accomplishmentReports' => 'uploadedFiles/accomplishmentReports',
            'photographs' => 'uploadedFiles/photographs',
            'fcaMembersProfile' => 'uploadedFiles/fcaMembersProfile',
        ];

        $paths = [];

        // Handle single file uploads
        foreach ($fileFields as $field => $basePath) {
            if (!file_exists($basePath)) {
                mkdir($basePath, 0755, true);
            }

            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . $field . '.' . $extension;
                $file->move($basePath, $filename);
                $paths[$field] = $basePath . '/' . $filename;
            }
        }

        // Handle multiple file uploads
        foreach ($multipleFileFields as $field => $basePath) {
            if (!file_exists($basePath)) {
                mkdir($basePath, 0755, true);
            }

            if ($request->hasFile($field)) {
                $files = $request->file($field);
                $uploadedPaths = [];

                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension;
                    $file->move($basePath, $filename);
                    $uploadedPaths[] = $basePath . '/' . $filename;
                }

                $paths[$field] = $uploadedPaths; // Save multiple file paths as an array
            }
        }

        IreapChecklist::create([
            'userId' => $user->id,
            'subprojectId' => $request->get('subprojectId'),
            'reviewDate' => $request->get('reviewDate'),
            'registeredAgency' => $request->get('registeredAgency'),
            'authenticatedCopy' => $paths['authenticatedCopy'] ?? null,
            'byLaws' => $paths['byLaws'] ?? null,
            'certificateOfRegistration' => $paths['certificateOfRegistration'] ?? null,
            'certificateRegistry' => $paths['certificateRegistry'] ?? null,
            'certificates' => $paths['certificates'] ?? null,
            'accomplishmentReports' => isset($paths['accomplishmentReports']) ? json_encode($paths['accomplishmentReports']) : null,
            'photographs' => isset($paths['photographs']) ? json_encode($paths['photographs']) : null,
            'existingOrganizationalStructure' => $paths['existingOrganizationalStructure'] ?? null,
            'secretaryCertificate' => $paths['secretaryCertificate'] ?? null,
            'fcaMembersProfile' => isset($paths['fcaMembersProfile']) ? json_encode($paths['fcaMembersProfile']) : null,
            'photocopyReceipt' => $paths['photocopyReceipt'] ?? null,
            'latestFinancialReport' => $paths['latestFinancialReport'] ?? null,
            'swornAffidavit' => $paths['swornAffidavit'] ?? null,
            'moa' => $paths['moa'] ?? null,
            'releaseOfFunds' => $paths['releaseOfFunds'] ?? null,
            'priorityCommodity' => $request->get('priorityCommodity'),
        ]);

        $subprojectId = $request->get('subprojectId');
        $status = $request->get('status');

        if ($subprojectId && $status) {
            $subproject = Subproject::find($subprojectId);

            if ($subproject) {
                switch ($status) {
                    case 'OK':
                        $subproject->iREAP = 'OK';
                        $subproject->total += 1;
                        break;
                    case 'Failed':
                        $subproject->iREAP = 'Failed';
                        break;
                    case 'Pending':
                        $subproject->iREAP = 'Pending';
                        break;
                }
                $subproject->save();
            }
        }

        return redirect()
            ->route('ireap.view-subproject', ['id' => $request->get('subprojectId')])
            ->with('success', 'Subproject has been validated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $subprojects = Subproject::all();

        return view('ireap.subprojects', [
            'subprojects' => $subprojects,
        ]);
    }

    public function showClearances()
    {
        $subprojects = Subproject::all();

        return view('ireap.clearances.clearances', [
            'subprojects' => $subprojects,
        ]);
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
