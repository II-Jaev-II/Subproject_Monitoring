<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIplanChecklistRequest;
use App\Models\IplanChecklist;
use App\Models\IplanCommodity;
use App\Models\IplanRankAndComposite;
use App\Models\Subproject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('iplan.dashboard');
    }

    public function view($id)
    {
        $subprojects = Subproject::join('provinces', 'subprojects.province', '=', 'provinces.id')
            ->join('municipalities', 'subprojects.municipality', '=', 'municipalities.id')
            ->join('barangays', 'subprojects.barangay', '=', 'barangays.id')
            ->where('subprojects.id', $id)
            ->firstOrFail();

        $iPlanChecklists = iPlanChecklist::where('iplan_checklists.subprojectId', $id)
            ->first();

        $commodities = [];
        if ($iPlanChecklists) {
            $commodities = IplanCommodity::where('checklistId', $iPlanChecklists->id)
                ->get();
        }

        $rankAndComposite = null;
        if ($iPlanChecklists) {
            $rankAndComposite = IplanRankAndComposite::where('checklistId', $iPlanChecklists->id)->first();
        }

        return view('iplan.view-subprojects.view-subproject', [
            'subprojects' => $subprojects,
            'iPlanChecklists' => $iPlanChecklists,
            'commodities' => $commodities,
            'rankAndComposite' => $rankAndComposite,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $subprojects = Subproject::all();

        return view('iplan.subprojects', [
            'subprojects' => $subprojects,
        ]);
    }

    public function showClearances()
    {
        $subprojects = Subproject::all();

        return view('iplan.clearances.clearances', [
            'subprojects' => $subprojects,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subproject = Subproject::findOrFail($id);

        return view('iplan.iplan-checklist', compact('subproject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIplanChecklistRequest $request)
    {
        $user = Auth::user();

        $request->validated();

        $fileFields = [
            'justificationFile' => 'uploadedFiles/justificationFile',
            'pageMatrixVca' => 'uploadedFiles/pageMatrixVca',
            'pageMatrixPcip' => 'uploadedFiles/pageMatrixPcip',
        ];

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

        $checklist = IplanChecklist::create([
            'subprojectId' => $request->get('subprojectId', null),
            'explanation' => $request->get('explanation', null),
            'justificationFile' => $paths['justificationFile'] ?? null,
            'linkedVca' => $request->get('linkedVca', null),
            'valueChainSegment' => $request->get('valueChainSegment', null),
            'opportunity' => $request->get('opportunity', null),
            'specificIntervention' => $request->get('specificIntervention', null),
            'pageMatrixVca' => $paths['pageMatrixVca'] ?? null,
            'pcip' => $request->get('pcip', null),
            'page' => $request->get('page', null),
            'pageMatrixPcip' => $paths['pageMatrixPcip'] ?? null,
            'sensitivity' => $request->get('sensitivity', null),
            'exposure' => $request->get('exposure', null),
            'adaptiveCapacity' => $request->get('adaptiveCapacity', null),
            'overallVulnerability' => $request->get('overallVulnerability', null),
            'recommendation' => $request->get('recommendation', null),
            'generalRecommendation' => $request->get('generalRecommendation', null),
            'userId' => $user->id,
        ]);

        $checklistId = $checklist->id;

        $commodities = $request->input('commodities', []);

        foreach ($commodities as $commodity) {
            IplanCommodity::create([
                'checklistId' => $checklistId,
                'commodityName' => $commodity,
                'userId' => $user->id,
            ]);
        }

        IplanRankAndComposite::create([
            'checklistId' => $checklistId,
            'evsaRankMango' => $request->get('evsaRankMango', null),
            'compositeIndexMango' => $request->get('compositeIndexMango', null),
            'evsaRankOnion' => $request->get('evsaRankOnion', null),
            'compositeIndexOnion' => $request->get('compositeIndexOnion', null),
            'evsaRankGoat' => $request->get('evsaRankGoat', null),
            'compositeIndexGoat' => $request->get('compositeIndexGoat', null),
            'evsaRankPeanut' => $request->get('evsaRankPeanut', null),
            'compositeIndexPeanut' => $request->get('compositeIndexPeanut', null),
            'evsaRankTomato' => $request->get('evsaRankTomato', null),
            'compositeIndexTomato' => $request->get('compositeIndexTomato', null),
            'evsaRankMungbean' => $request->get('evsaRankMungbean', null),
            'compositeIndexMungbean' => $request->get('compositeIndexMungbean', null),
            'evsaRankBangus' => $request->get('evsaRankBangus', null),
            'compositeIndexBangus' => $request->get('compositeIndexBangus', null),
            'evsaRankGarlic' => $request->get('evsaRankGarlic', null),
            'compositeIndexGarlic' => $request->get('compositeIndexGarlic', null),
            'evsaRankCoffee' => $request->get('evsaRankCoffee', null),
            'compositeIndexCoffee' => $request->get('compositeIndexCoffee', null),
            'evsaRankHogs' => $request->get('evsaRankHogs', null),
            'compositeIndexHogs' => $request->get('compositeIndexHogs', null),
            'userId' => $user->id,
        ]);

        return redirect()->route('iplan.view-subproject', ['id' => $request->get('subprojectId')])->with('success', 'Subproject has been validated successfully!');
    }
}
