<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubprojectRequest;
use App\Models\GGUChecklist;
use App\Models\IplanChecklist;
use App\Models\IplanCommodity;
use App\Models\IplanRankAndComposite;
use App\Models\Province;
use App\Models\SesChecklist;
use App\Models\SesRequirements;
use App\Models\Subproject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IBuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ibuild.dashboard');
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

        return view('ibuild.view-subprojects.view-subproject', [
            'subprojects' => $subprojects,
            'address' => $address,
            'iPlanChecklists' => $iPlanChecklists,
            'commodities' => $commodities,
            'rankAndComposite' => $rankAndComposite,
            'sesChecklists' => $sesChecklists,
            'sesRequirements' => $sesRequirements,
            'gguChecklists' => $gguChecklists,
            'gguReport' => $gguReport,

            'formattedReviewDateIPlan' => $formattedReviewDateIPlan,
            'formattedReviewDateSes' => $formattedReviewDateSes,
            'formattedReviewDateGgu' => $formattedReviewDateGgu,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();

        return view('ibuild.create-subproject', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubprojectRequest $request)
    {
        $user = Auth::user();

        $request->validated();

        $fileFields = [
            'letterOfInterest' => 'uploadedFiles/letterOfInterest',
            'letterOfRequest' => 'uploadedFiles/letterOfRequest',
            'letterOfEndorsement' => 'uploadedFiles/letterOfEndorsement',
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

        Subproject::create([
            'proponent' => $request->get('proponent', ''),
            'cluster' => $request->get('cluster', ''),
            'region' => $request->get('region', ''),
            'province' => $request->get('province', ''),
            'municipality' => $request->get('municipality', ''),
            'barangay' => $request->get('barangay', ''),
            'projectName' => $request->get('projectName', ''),
            'projectType' => $request->get('projectType', ''),
            'projectCategory' => $request->get('projectCategory', ''),
            'fundSource' => $request->get('fundSource', ''),
            'indicativeCost' => $request->get('indicativeCost', ''),
            'letterOfInterest' => $paths['letterOfInterest'] ?? null,
            'letterOfRequest' => $paths['letterOfRequest'] ?? null,
            'letterOfEndorsement' => $paths['letterOfEndorsement'] ?? null,
            'userId' => $user->id,
        ]);

        return redirect()->route('ibuild.subprojects')->with('success', 'Subproject has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $subprojects = Subproject::all();

        return view('ibuild.subprojects', [
            'subprojects' => $subprojects,
        ]);
    }

    public function showClearances()
    {
        $subprojects = Subproject::all();

        return view('ibuild.clearances.clearances', [
            'subprojects' => $subprojects,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subprojects = Subproject::all();

        return view('ibuild.clearances.clearances', [
            'subprojects' => $subprojects,
        ]);
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
