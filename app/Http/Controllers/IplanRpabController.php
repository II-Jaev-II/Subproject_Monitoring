<?php

namespace App\Http\Controllers;

use App\Models\IplanRpabChecklist;
use App\Models\Subproject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IplanRpabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function view()
    {
        return view('iplan.rpab.view-subproject');
    }

    public function validateSubproject($id)
    {
        $subproject = Subproject::findOrFail($id);

        return view('iplan.rpab.iplan-rpab-checklist', compact('subproject'));
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
        $user = Auth::user();

        IplanRpabChecklist::create([
            'userId' => $user->id,
            'subprojectId' => $request->get('subprojectId'),
            'reviewDate' => $request->get('reviewDate'),
            'percentageAccomplishment' => $request->get('percentageAccomplishment'),
            'geographyStatus' => $request->get('geographyStatus', null),
            'geographyComments' => $request->get('geography', null),
            'landAreaDescriptionStatus' => $request->get('landAreaDescriptionStatus', null),
            'landAreaDescriptionComments' => $request->get('landAreaDescription', null),
            'incomeClassificationStatus' => $request->get('incomeClassificationStatus', null),
            'incomeClassificationComments' => $request->get('incomeClassification', null),
            'interestingFactsStatus' => $request->get('interestingFactsStatus', null),
            'interestingFactsComments' => $request->get('interestingFacts', null),
            'briefRuralStatus' => $request->get('briefRuralStatus', null),
            'briefRuralComments' => $request->get('briefRural', null),
            'awardsStatus' => $request->get('awardsStatus', null),
            'awardsComments' => $request->get('awards', null),
            'visionAgricultureStatus' => $request->get('visionAgricultureStatus', null),
            'visionAgricultureComments' => $request->get('visionAgriculture', null),
            'totalPopulationStatus' => $request->get('totalPopulationStatus', null),
            'totalPopulationComments' => $request->get('totalPopulation', null),
            'averageHouseholdSizeStatus' => $request->get('averageHouseholdSizeStatus', null),
            'averageHouseholdSizeComments' => $request->get('averageHouseholdSize', null),
            'educationPopulationStatus' => $request->get('educationPopulationStatus', null),
            'educationPopulationComments' => $request->get('educationPopulation', null),
            'populationStatus' => $request->get('populationStatus', null),
            'populationComments' => $request->get('population', null),
            'agricultureIncomeStatus' => $request->get('agricultureIncomeStatus', null),
            'agricultureIncomeComments' => $request->get('agricultureIncome', null),
            'incomeDisaggregationStatus' => $request->get('incomeDisaggregationStatus', null),
            'incomeDisaggregationComments' => $request->get('incomeDisaggregation', null),
            'povertyIncidenceStatus' => $request->get('povertyIncidenceStatus', null),
            'povertyIncidenceComments' => $request->get('povertyIncidence', null),
            'availableFacilitiesStatus' => $request->get('availableFacilitiesStatus', null),
            'availableFacilitiesComments' => $request->get('availableFacilities', null),
            'economicVisionStatus' => $request->get('economicVisionStatus', null),
            'economicVisionComments' => $request->get('economicVision', null),
            'employmentRateStatus' => $request->get('employmentRateStatus', null),
            'employmentRateComments' => $request->get('employmentRate', null),
            'priorityCommoditiesStatus' => $request->get('priorityCommoditiesStatus', null),
            'priorityCommoditiesComments' => $request->get('priorityCommodities', null),
            'existingMarketsStatus' => $request->get('existingMarketsStatus', null),
            'existingMarketsComments' => $request->get('existingMarkets', null),
            'soilDescriptionStatus' => $request->get('soilDescriptionStatus', null),
            'soilDescriptionComments' => $request->get('soilDescription', null),
            'agriculturalVisionStatus' => $request->get('agriculturalVisionStatus', null),
            'agriculturalVisionComments' => $request->get('agriculturalVision', null),
            'waterResourcesStatus' => $request->get('waterResourcesStatus', null),
            'waterResourcesComments' => $request->get('waterResources', null),
            'climateRainfallStatus' => $request->get('climateRainfallStatus', null),
            'climateRainfallComments' => $request->get('climateRainfall', null),
            'enterprisesAvailableStatus' => $request->get('enterprisesAvailableStatus', null),
            'enterprisesAvailableComments' => $request->get('enterprisesAvailable', null),
            'evsaStatus' => $request->get('evsaStatus', null),
            'evsaComments' => $request->get('evsa', null),
            'productionAreaStatus' => $request->get('productionAreaStatus', null),
            'productionAreaComments' => $request->get('productionArea', null),
            'discussConstraintStatus' => $request->get('discussConstraintStatus', null),
            'discussConstraintComments' => $request->get('discussConstraint', null),
            'availableProductFormStatus' => $request->get('availableProductFormStatus', null),
            'availableProductFormComments' => $request->get('availableProductForm', null),
            'discussInterventionStatus' => $request->get('discussInterventionStatus', null),
            'discussInterventionComments' => $request->get('discussIntervention', null),
            'valueAddingMechanismStatus' => $request->get('valueAddingMechanismStatus', null),
            'valueAddingMechanismComments' => $request->get('valueAddingMechanism', null),
            'increaseValueStatus' => $request->get('increaseValueStatus', null),
            'increaseValueComments' => $request->get('increaseValue', null),
            'beneficiariesDemographicsStatus' => $request->get('beneficiariesDemographicsStatus', null),
            'beneficiariesDemographicsComments' => $request->get('beneficiariesDemographics', null),
            'numberHouseholdsStatus' => $request->get('numberHouseholdsStatus', null),
            'numberHouseholdsComments' => $request->get('numberHouseholds', null),
            'highlightStatus' => $request->get('highlightStatus', null),
            'highlightComments' => $request->get('highlight', null),
            'commodityAreaStatus' => $request->get('commodityAreaStatus', null),
            'commodityAreaComments' => $request->get('commodityArea', null),
            'priorityCommoditiesLocationStatus' => $request->get('priorityCommoditiesLocationStatus', null),
            'priorityCommoditiesLocationComments' => $request->get('priorityCommoditiesLocation', null),
            'percentageResidentsStatus' => $request->get('percentageResidentsStatus', null),
            'percentageResidentsComments' => $request->get('percentageResidents', null),
            'livingConditionsStatus' => $request->get('livingConditionsStatus', null),
            'livingConditionsComments' => $request->get('livingConditions', null)
        ]);


        return redirect()
            ->route('iplan.view-rpab-subproject', ['id' => $request->get('subprojectId')])
            ->with('success', 'Subproject has been validated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
