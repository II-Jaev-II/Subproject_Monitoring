<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGGUChecklistRequest;
use App\Models\EconChecklist;
use App\Models\GGUChecklist;
use App\Models\IplanChecklist;
use App\Models\IplanCommodity;
use App\Models\IplanRankAndComposite;
use App\Models\SesChecklist;
use App\Models\SesRequirements;
use App\Models\Subproject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GGUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ggu.dashboard');
    }

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

        return view('ggu.view-subprojects.view-subproject', [
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

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $subprojects = Subproject::all();

        return view('ggu.subprojects', [
            'subprojects' => $subprojects,
        ]);
    }

    public function showClearances()
    {
        $subprojects = Subproject::all();

        return view('ggu.clearances.clearances', [
            'subprojects' => $subprojects,
        ]);
    }

    public function validateSubproject($id)
    {
        $subproject = Subproject::findOrFail($id);

        return view('ggu.ggu-checklist', compact('subproject'));
    }

    public function edit($id)
    {
        $subproject = Subproject::findOrFail($id);
        $gguChecklist = GGUChecklist::where('subprojectId', $id)
            ->join('subprojects', 'ggu_checklists.subprojectId', '=', 'subprojects.id')
            ->first();

        return view('ggu.edit-subproject', compact('subproject', 'gguChecklist'));
    }

    public function store(StoreGGUChecklistRequest $request)
    {
        $user = Auth::user();
        $request->validated();

        $fileFields = [
            'kmzFile' => 'uploadedFiles/kmzFile',
            'gguReport' => 'uploadedFiles/gguReport',
        ];

        $paths = [];

        foreach ($fileFields as $field => $basePath) {
            if (!file_exists($basePath)) {
                mkdir($basePath, 0755, true);
            }

            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move($basePath, $filename);
                $paths[$field] = $basePath . '/' . $filename;
            }
        }

        GGUChecklist::create([
            'userId' => $user->id,
            'subprojectId' => $request->get('subprojectId', null),
            'reviewDate' => $request->get('reviewDate', null),
            'kmzFile' => $paths['kmzFile'] ?? null,
            'report' => $paths['gguReport'] ?? null,
            'remarks' => $request->get('remarks', null),
        ]);

        $subprojectId = $request->get('subprojectId');
        $status = $request->get('status');

        if ($subprojectId && $status) {
            $subproject = Subproject::find($subprojectId);

            if ($subproject) {
                switch ($status) {
                    case 'Passed':
                        $subproject->ggu = 'Passed';
                        $subproject->total += 1;
                        break;
                    case 'Failed':
                        $subproject->ggu = 'Failed';
                        break;
                    case 'Pending':
                        $subproject->ggu = 'Pending';
                        break;
                }
                $subproject->save();
            }
        }

        return redirect()
            ->route('ggu.view-subproject', ['id' => $request->get('subprojectId')])
            ->with('success', 'Subproject has been validated successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'reviewDate' => 'required|date',
        ]);

        $user = Auth::user();

        $fileFields = [
            'kmzFile' => 'uploadedFiles/kmzFile',
            'gguReport' => 'uploadedFiles/gguReport',
        ];

        $paths = [];
        $gguChecklist = GGUChecklist::where('subprojectId', $request->get('subprojectId'))->first();

        foreach ($fileFields as $field => $basePath) {
            if (!file_exists($basePath)) {
                mkdir($basePath, 0755, true);
            }

            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move($basePath, $filename);
                $paths[$field] = $basePath . '/' . $filename;
            } else {
                $paths[$field] = $gguChecklist->$field;
            }
        }

        $subprojectId = $request->get('subprojectId');

        $gguChecklistUpdateData = [
            'reviewDate' => $validated['reviewDate'] ?? null,
            'remarks' => $request->get('remarks', null),
        ];

        if (isset($paths['kmzFile'])) {
            $gguChecklistUpdateData['kmzFile'] = $paths['kmzFile'];
        }
        if (isset($paths['gguReport'])) {
            $gguChecklistUpdateData['report'] = $paths['gguReport'];
        }

        GGUChecklist::where('subprojectId', $subprojectId)->update($gguChecklistUpdateData);

        $status = $request->get('status');
        $subproject = Subproject::find($subprojectId);

        if ($subproject->ggu === 'Pending' && $status === 'Passed') {
            $subproject->ggu = 'Passed';
            $subproject->total += 1;
        } elseif ($subproject->ggu === 'Pending' &&  $status === 'Failed') {
            $subproject->ggu = 'Failed';
        }

        $subproject->save();

        return redirect()
            ->route('ggu.view-subproject', ['id' => $request->get('subprojectId')])
            ->with('success', 'Subproject has been validated successfully!');
    }
}
