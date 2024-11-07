<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIplanChecklistRequest;
use App\Http\Requests\UpdateIPlanChecklistRequest;
use App\Models\IplanChecklist;
use App\Models\IplanCommodity;
use App\Models\IplanRankAndComposite;
use App\Models\SesChecklist;
use App\Models\SesRequirements;
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
        $subprojects = Subproject::join('provinces', 'subprojects.province', '=', 'provinces.id')->join('municipalities', 'subprojects.municipality', '=', 'municipalities.id')->join('barangays', 'subprojects.barangay', '=', 'barangays.id')->where('subprojects.id', $id)->firstOrFail();

        $iPlanChecklists = iPlanChecklist::where('iplan_checklists.subprojectId', $id)->first();

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

        return view('iplan.view-subprojects.view-subproject', [
            'subprojects' => $subprojects,
            'iPlanChecklists' => $iPlanChecklists,
            'commodities' => $commodities,
            'rankAndComposite' => $rankAndComposite,
            'sesChecklists' => $sesChecklists,
            'sesRequirements' => $sesRequirements,
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
        $checklist = IplanChecklist::where('subprojectId', $id)->first();

        $checklistId = $checklist->id;

        $fields = [
            'sensitivity' => [
                'label' => 'Sensitivity',
                'value' => $checklist->sensitivity,
                'type' => 'text',
                'name' => 'sensitivity',
            ],
            'exposure' => [
                'label' => 'Exposure',
                'value' => $checklist->exposure,
                'type' => 'text',
                'name' => 'exposure',
            ],
            'adaptiveCapacity' => [
                'label' => 'Adaptive Capacity',
                'value' => $checklist->adaptiveCapacity,
                'type' => 'text',
                'name' => 'adaptiveCapacity',
            ],
            'overallVulnerability' => [
                'label' => 'Overall Vulnerability',
                'value' => $checklist->overallVulnerability,
                'type' => 'text',
                'name' => 'overallVulnerability',
            ],
            'recommendation' => [
                'label' => 'Recommendation',
                'value' => $checklist->recommendation,
                'type' => 'textarea',
                'name' => 'recommendation',
            ],
        ];

        if (isset($checklist->generalRecommendation)) {
            $fields['generalRecommendation'] = [
                'label' => 'General Recommendation',
                'value' => $checklist->generalRecommendation,
                'type' => 'textarea',
                'name' => 'generalRecommendation',
            ];
        }

        $selectedCommodities = IplanCommodity::where('checklistId', $checklistId)->pluck('commodityName')->toArray();

        $allCommodities = ['Mango', 'Onion', 'Goat', 'Peanut', 'Tomato', 'Mungbean', 'Bangus', 'Garlic', 'Coffee', 'Hogs'];

        $commodities = array_filter($allCommodities, function ($commodity) use ($selectedCommodities) {
            return in_array($commodity, $selectedCommodities);
        });

        $unselectedCommodities = array_diff($allCommodities, $selectedCommodities);

        $rankCompositeData = DB::table('iplan_rank_and_composites')->where('checklistId', $checklistId)->first();

        $commodityData = [];
        foreach ($commodities as $commodity) {
            $evsaRankColumn = 'evsaRank' . $commodity;
            $compositeIndexColumn = 'compositeIndex' . $commodity;

            $commodityData[$commodity] = [
                'evsaRank' => $rankCompositeData->$evsaRankColumn ?? null,
                'compositeIndex' => $rankCompositeData->$compositeIndexColumn ?? null,
            ];
        }

        return view('iplan.edit-subproject', compact(
            'subproject',
            'checklist',
            'checklistId',
            'commodities',
            'selectedCommodities',
            'unselectedCommodities',
            'commodityData',
            'fields'
        ));
    }

    public function validateSubproject($id)
    {
        $subproject = Subproject::findOrFail($id);

        return view('iplan.iplan-checklist', compact('subproject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIPlanChecklistRequest $request, $id)
    {
        $user = Auth::user();
        $request->validated();

        $subproject = Subproject::findOrFail($id);

        $fileFields = [
            'justificationFile' => 'uploadedFiles/justificationFile',
            'pageMatrixVca' => 'uploadedFiles/pageMatrixVca',
            'pageMatrixPcip' => 'uploadedFiles/pageMatrixPcip',
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

        $iPLANValue = 'OK';

        $linkedVca = $request->get('linkedVca', $subproject->linkedVca);
        $pcip = $request->get('pcip', $subproject->pcip);

        if ($linkedVca === 'No') {
            $iPLANValue = 'Failed';
        } elseif ($pcip === 'No') {
            $iPLANValue = 'Failed';
        } else {
            $hasJustification = $request->filled('explanation') || isset($paths['justificationFile']);

            if ($hasJustification) {
                $iPLANValue = 'OK';
            } else {
                $rankCompositeData = [
                    ['rank' => $request->get('evsaRankMango'), 'index' => $request->get('compositeIndexMango')],
                    ['rank' => $request->get('evsaRankOnion'), 'index' => $request->get('compositeIndexOnion')],
                    ['rank' => $request->get('evsaRankGoat'), 'index' => $request->get('compositeIndexGoat')],
                    ['rank' => $request->get('evsaRankPeanut'), 'index' => $request->get('compositeIndexPeanut')],
                    ['rank' => $request->get('evsaRankTomato'), 'index' => $request->get('compositeIndexTomato')],
                    ['rank' => $request->get('evsaRankMungbean'), 'index' => $request->get('compositeIndexMungbean')],
                    ['rank' => $request->get('evsaRankBangus'), 'index' => $request->get('compositeIndexBangus')],
                    ['rank' => $request->get('evsaRankGarlic'), 'index' => $request->get('compositeIndexGarlic')],
                    ['rank' => $request->get('evsaRankCoffee'), 'index' => $request->get('compositeIndexCoffee')],
                    ['rank' => $request->get('evsaRankHogs'), 'index' => $request->get('compositeIndexHogs')],
                ];

                foreach ($rankCompositeData as $data) {
                    $evsaRank = $data['rank'];
                    $compositeIndex = $data['index'];

                    if ($evsaRank === null || $compositeIndex === null) continue;

                    if ($evsaRank > 10 || $compositeIndex < 0.4) {
                        $iPLANValue = 'Pending';
                        break;
                    }
                }
            }
        }

        $subprojectId = $request->get('subprojectId');
        $currentSubproject = Subproject::find($subprojectId);
        $updateData = ['iPLAN' => $iPLANValue];

        if ($iPLANValue === 'Pending' && $currentSubproject->iPLAN === 'OK') {
            $updateData['total'] = DB::raw('total - 1');
        }
        elseif ($iPLANValue === 'OK' && $currentSubproject->iPLAN !== 'OK') {
            $updateData['total'] = DB::raw('total + 1');
        }

        Subproject::where('id', $subprojectId)->update($updateData);

        $iplanChecklistUpdateData = [
            'explanation' => $request->get('explanation', null),
            'linkedVca' => $linkedVca,
            'valueChainSegment' => $request->get('valueChainSegment', null),
            'opportunity' => $request->get('opportunity', null),
            'specificIntervention' => $request->get('specificIntervention', null),
            'pcip' => $pcip,
            'page' => $request->get('page', null),
            'sensitivity' => $request->get('sensitivity', null),
            'exposure' => $request->get('exposure', null),
            'adaptiveCapacity' => $request->get('adaptiveCapacity', null),
            'overallVulnerability' => $request->get('overallVulnerability', null),
            'recommendation' => $request->get('recommendation', null),
            'generalRecommendation' => $request->get('generalRecommendation', null),
        ];

        if (isset($paths['justificationFile'])) {
            $iplanChecklistUpdateData['justificationFile'] = $paths['justificationFile'];
        }
        if (isset($paths['pageMatrixVca'])) {
            $iplanChecklistUpdateData['pageMatrixVca'] = $paths['pageMatrixVca'];
        }
        if (isset($paths['pageMatrixPcip'])) {
            $iplanChecklistUpdateData['pageMatrixPcip'] = $paths['pageMatrixPcip'];
        }

        IplanChecklist::where('subprojectId', $subproject->id)->update($iplanChecklistUpdateData);

        $checklistId = $request->get('checklistId');

        IplanRankAndComposite::where('checklistId', $checklistId)->update([
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
        ]);

        $commodities = $request->input('commodities', []);
        foreach ($commodities as $commodity) {
            IplanCommodity::create([
                'checklistId' => $checklistId,
                'commodityName' => $commodity,
                'userId' => $user->id,
            ]);
        }

        return redirect()
            ->route('iplan.view-subproject', ['id' => $request->get('subprojectId')])
            ->with('success', 'Subproject has been validated successfully!');
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

        $iPLANValue = 'OK';

        $linkedVca = $request->get('linkedVca');
        $pcip = $request->get('pcip');
        if ($linkedVca === 'No' || $pcip === 'No') {
            $iPLANValue = 'Failed';
        } else {
            $hasJustification = $request->filled('explanation') || isset($paths['justificationFile']);

            if ($hasJustification) {
                $iPLANValue = 'OK';
            } else {
                $rankCompositeData = [
                    ['rank' => $request->get('evsaRankMango'), 'index' => $request->get('compositeIndexMango')],
                    ['rank' => $request->get('evsaRankOnion'), 'index' => $request->get('compositeIndexOnion')],
                    ['rank' => $request->get('evsaRankGoat'), 'index' => $request->get('compositeIndexGoat')],
                    ['rank' => $request->get('evsaRankPeanut'), 'index' => $request->get('compositeIndexPeanut')],
                    ['rank' => $request->get('evsaRankTomato'), 'index' => $request->get('compositeIndexTomato')],
                    ['rank' => $request->get('evsaRankMungbean'), 'index' => $request->get('compositeIndexMungbean')],
                    ['rank' => $request->get('evsaRankBangus'), 'index' => $request->get('compositeIndexBangus')],
                    ['rank' => $request->get('evsaRankGarlic'), 'index' => $request->get('compositeIndexGarlic')],
                    ['rank' => $request->get('evsaRankCoffee'), 'index' => $request->get('compositeIndexCoffee')],
                    ['rank' => $request->get('evsaRankHogs'), 'index' => $request->get('compositeIndexHogs')],
                ];

                foreach ($rankCompositeData as $data) {
                    $evsaRank = $data['rank'];
                    $compositeIndex = $data['index'];

                    if ($evsaRank === null || $compositeIndex === null) continue;

                    if ($evsaRank > 10 || $compositeIndex < 0.4) {
                        $iPLANValue = 'Pending';
                        break;
                    }
                }
            }
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

        $subprojectId = $request->get('subprojectId');
        $updateData = ['iPLAN' => $iPLANValue];
        if ($iPLANValue === 'OK') {
            $updateData['total'] = DB::raw('total + 1');
        }
        Subproject::where('id', $subprojectId)->update($updateData);

        return redirect()
            ->route('iplan.view-subproject', ['id' => $request->get('subprojectId')])
            ->with('success', 'Subproject has been validated successfully!');
    }
}
