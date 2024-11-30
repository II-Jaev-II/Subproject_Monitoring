<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEconChecklistRequest;
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

class EconController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('econ.dashboard');
    }

    public function view($id)
    {
        $subprojects = Subproject::join('provinces', 'subprojects.province', '=', 'provinces.id')->join('municipalities', 'subprojects.municipality', '=', 'municipalities.id')->join('barangays', 'subprojects.barangay', '=', 'barangays.id')->select('subprojects.*', 'subprojects.letterOfRequest', 'subprojects.letterOfEndorsement', 'provinces.province_name', 'municipalities.municipality_name', 'barangays.barangay_name')->where('subprojects.id', $id)->first();

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

        $vcriChecklists = DB::table('ibuild_vcri_checklists')->where('subprojectId', $id)->first();

        $fmrBridgeChecklists = DB::table('ibuild_fmr_bridge_checklists')->where('subprojectId', $id)->first();

        $pwsCisChecklists = DB::table('ibuild_pws_cis_checklists')->where('subprojectId', $id)->first();

        $hasRecords = $vcriChecklists || $fmrBridgeChecklists || $pwsCisChecklists;

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

        return view('econ.view-subprojects.view-subproject', [
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

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $subprojects = Subproject::all();

        return view('econ.subprojects', [
            'subprojects' => $subprojects,
        ]);
    }

    public function showClearances()
    {
        $subprojects = Subproject::all();

        return view('econ.clearances.clearances', [
            'subprojects' => $subprojects,
        ]);
    }

    public function validateSubproject($id)
    {
        $subproject = Subproject::findOrFail($id);

        $subprojectType = $subproject->projectType;

        return view('econ.econ-checklist', compact('subproject', 'subprojectType'));
    }

    public function edit($id)
    {
        $subproject = Subproject::findOrFail($id);
        $econChecklist = EconChecklist::where('subprojectId', $id)->join('subprojects', 'econ_checklists.subprojectId', '=', 'subprojects.id')->first();

        return view('econ.edit-subproject', compact('subproject', 'econChecklist'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'reviewDate' => 'required|date',
            'summary' => 'required',
            'status' => 'required',
        ]);

        $user = Auth::user();

        $subprojectId = $request->get('subprojectId');

        $econChecklistUpdateData = [
            'userId' => $user->id,
            'subprojectId' => $subprojectId,
            'reviewDate' => $validated['reviewDate'],
            'summary' => $validated['summary'],
            'status' => $validated['status'],
        ];

        EconChecklist::where('subprojectId', $subprojectId)->update($econChecklistUpdateData);

        $status = $request->get('status');
        $subproject = Subproject::find($subprojectId);

        if ($subproject->econ === 'Pending' && $status === 'OK') {
            $subproject->econ = 'OK';
            $subproject->total += 1;
        } elseif ($subproject->econ === 'Pending' && $status === 'Failed') {
            $subproject->econ = 'Failed';
        }

        $subproject->save();

        return redirect()
            ->route('econ.view-subproject', ['id' => $request->get('subprojectId')])
            ->with('success', 'Subproject has been validated successfully!');
    }

    public function store(StoreEconChecklistRequest $request)
    {
        $user = Auth::user();
        $request->validated();

        EconChecklist::create([
            'userId' => $user->id,
            'subprojectId' => $request->get('subprojectId'),
            'reviewDate' => $request->get('reviewDate'),
            'summary' => $request->get('summary'),
            'status' => $request->get('status'),
        ]);

        $subprojectId = $request->get('subprojectId');
        $status = $request->get('status');

        if ($subprojectId && $status) {
            $subproject = Subproject::find($subprojectId);

            if ($subproject) {
                switch ($status) {
                    case 'OK':
                        $subproject->econ = 'OK';
                        $subproject->total += 1;
                        break;
                    case 'Failed':
                        $subproject->econ = 'Failed';
                        break;
                    case 'Pending':
                        $subproject->econ = 'Pending';
                        break;
                }
                $subproject->save();
            }
        }

        return redirect()
            ->route('econ.view-subproject', ['id' => $request->get('subprojectId')])
            ->with('success', 'Subproject has been validated successfully!');
    }
}
