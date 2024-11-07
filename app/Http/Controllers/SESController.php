<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSesChecklistRequest;
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

class SESController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ses.dashboard');
    }

    public function view($id)
    {
        $subprojects = Subproject::join('provinces', 'subprojects.province', '=', 'provinces.id')
            ->join('municipalities', 'subprojects.municipality', '=', 'municipalities.id')
            ->join('barangays', 'subprojects.barangay', '=', 'barangays.id')
            ->where('subprojects.id', $id)
            ->firstOrFail();

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

        $formattedReviewDateIPlan = null;
        if ($iPlanChecklists && $iPlanChecklists->reviewDate) {
            $formattedReviewDateIPlan = Carbon::parse($iPlanChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateSes = null;
        if ($sesChecklists && $sesChecklists->reviewDate) {
            $formattedReviewDateSes = Carbon::parse($sesChecklists->reviewDate)->format('F j, Y');
        }

        return view('ses.view-subprojects.view-subproject', [
            'subprojects' => $subprojects,
            'iPlanChecklists' => $iPlanChecklists,
            'commodities' => $commodities,
            'rankAndComposite' => $rankAndComposite,
            'sesChecklists' => $sesChecklists,
            'sesRequirements' => $sesRequirements,

            'formattedReviewDateIPlan' => $formattedReviewDateIPlan,
            'formattedReviewDateSes' => $formattedReviewDateSes,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $subprojects = Subproject::all();

        return view('ses.subprojects', [
            'subprojects' => $subprojects,
        ]);
    }

    public function showClearances()
    {
        $subprojects = Subproject::all();

        return view('ses.clearances.clearances', [
            'subprojects' => $subprojects,
        ]);
    }

    public function edit($id)
    {
        $subproject = Subproject::findOrFail($id);
        $sesChecklist = SesChecklist::where('subprojectId', $id)->first();

        $sesRequirements = [];
        if ($sesChecklist) {
            $sesRequirements = SesRequirements::where('checklistId', $sesChecklist->id)->get();
        }

        return view('ses.edit-subproject', compact('subproject', 'sesChecklist', 'sesRequirements'));
    }

    public function validateSubproject($id)
    {
        $subproject = Subproject::findOrFail($id);

        return view('ses.ses-checklist', compact('subproject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSesChecklistRequest $request)
    {
        $user = Auth::user();
        $validatedData = $request->validated();

        $sesStatus = 'Pending';

        if ($request->input('checkboxReason')) {
            $sesStatus = 'Failed';
        } elseif ($request->input('checkboxCleared')) {
            $sesStatus = 'OK';
        } elseif ($request->input('checkboxRequirements')) {
            $sesStatus = 'Pending';
        }

        $checklist = SesChecklist::create([
            'userId' => $user->id,
            'subprojectId' => $request->get('subprojectId', null),
            'reviewDate' => $request->get('reviewDate', null),
            'requirementCompliance' => $request->get('requirementCompliance', null),
            'reason' => $request->get('reason', null),
            'cleared' => $request->get('cleared', null),
            'socialAssesment' => $request->get('socialAssesment', null),
            'environmentalAssesment' => $request->get('environmentalAssesment', null),
        ]);

        $checklistId = $checklist->id;

        if ($request->has('requirementsCheckbox') && $request->input('requirementsCheckbox') === 'on') {
            foreach ($request->input('requirements', []) as $requirement) {
                if (!empty($requirement['requirement']) && !empty($requirement['deadline'])) {
                    SesRequirements::create([
                        'userId' => $user->id,
                        'checklistId' => $checklistId,
                        'requirement' => $requirement['requirement'],
                        'deadline' => $requirement['deadline'],
                    ]);
                }
            }
        }

        $subproject = SubProject::find($request->input('subprojectId'));

        $subproject->ses = $sesStatus;
        if ($sesStatus === 'OK') {
            $subproject->increment('total');
        }

        $subproject->save();

        return redirect()
            ->route('ses.view-subproject', ['id' => $request->get('subprojectId')])
            ->with('success', 'Subproject has been validated successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSesChecklistRequest $request, $id)
    {
        $user = Auth::user();
        $request->validated();

        $subproject = Subproject::findOrFail($id);

        SesChecklist::where('subprojectId', $subproject->id)->update([
            'reviewDate' => $request->get('reviewDate', null),
            'reason' => $request->get('reason', null),
            'requirementCompliance' => $request->get('requirementCompliance', null),
            'cleared' => $request->get('cleared', null),
            'socialAssesment' => $request->get('socialAssesment', null),
            'environmentalAssesment' => $request->get('environmentalAssesment', null),
        ]);

        $checklistId = $request->get('checklistId');

        if ($request->has('existingRequirements')) {
            foreach ($request->input('existingRequirements', []) as $requirementId => $requirementData) {
                if (!empty($requirementData['requirement']) && !empty($requirementData['deadline'])) {
                    $sesRequirement = SesRequirements::find($requirementId);
                    if ($sesRequirement) {
                        $sesRequirement->update([
                            'requirement' => $requirementData['requirement'],
                            'deadline' => $requirementData['deadline'],
                        ]);
                    }
                }
            }
        }

        if ($request->has('requirementsCheckbox') && $request->input('requirementsCheckbox') === 'on') {
            foreach ($request->input('requirements', []) as $newRequirement) {
                if (!empty($newRequirement['requirement']) && !empty($newRequirement['deadline'])) {
                    SesRequirements::create([
                        'userId' => $user->id,
                        'checklistId' => $checklistId,
                        'requirement' => $newRequirement['requirement'],
                        'deadline' => $newRequirement['deadline'],
                    ]);
                }
            }
        }

        if ($request->has('checkboxReason')) {
            $subproject->update(['ses' => 'Failed']);
        } elseif ($request->has('checkboxCleared')) {
            if ($subproject->ses !== 'OK') {
                $subproject->increment('total');
            }
            $subproject->update(['ses' => 'OK']);
        }

        return redirect()
            ->route('ses.view-subproject', ['id' => $request->get('subprojectId')])
            ->with('success', 'Subproject has been validated successfully!');
    }
}
