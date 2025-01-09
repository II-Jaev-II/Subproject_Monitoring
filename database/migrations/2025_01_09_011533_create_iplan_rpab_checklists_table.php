<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('iplan_rpab_checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('subprojectId');
            $table->date('reviewDate');
            $table->string('percentageAccomplishment');
            $table->string('geographyStatus')->nullable();
            $table->text('geographyComments')->nullable();
            $table->string('landAreaDescriptionStatus')->nullable();
            $table->text('landAreaDescriptionComments')->nullable();
            $table->string('incomeClassificationStatus')->nullable();
            $table->text('incomeClassificationComments')->nullable();
            $table->string('interestingFactsStatus')->nullable();
            $table->text('interestingFactsComments')->nullable();
            $table->string('briefRuralStatus')->nullable();
            $table->text('briefRuralComments')->nullable();
            $table->string('awardsStatus')->nullable();
            $table->text('awardsComments')->nullable();
            $table->string('visionAgricultureStatus')->nullable();
            $table->text('visionAgricultureComments')->nullable();
            $table->string('totalPopulationStatus')->nullable();
            $table->text('totalPopulationComments')->nullable();
            $table->string('averageHouseholdSizeStatus')->nullable();
            $table->text('averageHouseholdSizeComments')->nullable();
            $table->string('educationPopulationStatus')->nullable();
            $table->text('educationPopulationComments')->nullable();
            $table->string('populationStatus')->nullable();
            $table->text('populationComments')->nullable();
            $table->string('agricultureIncomeStatus')->nullable();
            $table->text('agricultureIncomeComments')->nullable();
            $table->string('incomeDisaggregationStatus')->nullable();
            $table->text('incomeDisaggregationComments')->nullable();
            $table->string('povertyIncidenceStatus')->nullable();
            $table->text('povertyIncidenceComments')->nullable();
            $table->string('availableFacilitiesStatus')->nullable();
            $table->text('availableFacilitiesComments')->nullable();
            $table->string('economicVisionStatus')->nullable();
            $table->text('economicVisionComments')->nullable();
            $table->string('employmentRateStatus')->nullable();
            $table->text('employmentRateComments')->nullable();
            $table->string('priorityCommoditiesStatus')->nullable();
            $table->text('priorityCommoditiesComments')->nullable();
            $table->string('existingMarketsStatus')->nullable();
            $table->text('existingMarketsComments')->nullable();
            $table->string('soilDescriptionStatus')->nullable();
            $table->text('soilDescriptionComments')->nullable();
            $table->string('agriculturalVisionStatus')->nullable();
            $table->text('agriculturalVisionComments')->nullable();
            $table->string('waterResourcesStatus')->nullable();
            $table->text('waterResourcesComments')->nullable();
            $table->string('climateRainfallStatus')->nullable();
            $table->text('climateRainfallComments')->nullable();
            $table->string('enterprisesAvailableStatus')->nullable();
            $table->text('enterprisesAvailableComments')->nullable();
            $table->string('evsaStatus')->nullable();
            $table->text('evsaComments')->nullable();
            $table->string('productionAreaStatus')->nullable();
            $table->text('productionAreaComments')->nullable();
            $table->string('discussConstraintStatus')->nullable();
            $table->text('discussConstraintComments')->nullable();
            $table->string('availableProductFormStatus')->nullable();
            $table->text('availableProductFormComments')->nullable();
            $table->string('discussInterventionStatus')->nullable();
            $table->text('discussInterventionComments')->nullable();
            $table->string('valueAddingMechanismStatus')->nullable();
            $table->text('valueAddingMechanismComments')->nullable();
            $table->string('increaseValueStatus')->nullable();
            $table->text('increaseValueComments')->nullable();
            $table->string('beneficiariesDemographicsStatus')->nullable();
            $table->text('beneficiariesDemographicsComments')->nullable();
            $table->string('numberHouseholdsStatus')->nullable();
            $table->text('numberHouseholdsComments')->nullable();
            $table->string('highlightStatus')->nullable();
            $table->text('highlightComments')->nullable();
            $table->string('commodityAreaStatus')->nullable();
            $table->text('commodityAreaComments')->nullable();
            $table->string('priorityCommoditiesLocationStatus')->nullable();
            $table->text('priorityCommoditiesLocationComments')->nullable();
            $table->string('percentageResidentsStatus')->nullable();
            $table->text('percentageResidentsComments')->nullable();
            $table->string('livingConditionsStatus')->nullable();
            $table->text('livingConditionsComments')->nullable();
            $table->timestamps();

            $table->foreign('subprojectId')->references('id')->on('subprojects')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iplan_rpab_checklists');
    }
};
