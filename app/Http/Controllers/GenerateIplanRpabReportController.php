<?php

namespace App\Http\Controllers;

use App\Models\IplanChecklist;
use App\Models\IplanCommodity;
use App\Models\IplanRpabChecklist;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class GenerateIplanRpabReportController extends Controller
{
    public function generateReport($id)
    {
        $iPlanRpabChecklist = IplanRpabChecklist::where('id', $id)
            ->first();

        $iPlanChecklist = IplanRpabChecklist::join('subprojects', 'iplan_rpab_checklists.subprojectId', '=', 'subprojects.id')
            ->first();

        $commodityNames = IplanCommodity::join('iplan_checklists', 'iplan_commodities.checklistId', '=', 'iplan_checklists.id')
            ->where('iplan_checklists.subprojectId', $id)
            ->pluck('iplan_commodities.commodityName')
            ->toArray();

        $commaSeparatedCommodities = implode(', ', $commodityNames);


        $employeeName = IplanRpabChecklist::join('users', 'iplan_rpab_checklists.userId', '=', 'users.id')
            ->first();

        $userName = $employeeName->name ?? 'N/A';

        $phpWord = new PhpWord();
        $phpWord->setDefaultParagraphStyle(['lineHeight' => 1.0, 'spaceAfter' => 0]);
        $section = $phpWord->addSection();

        // IPLAN Title
        $section->addText(
            'I-PLAN Review of the Feasibility Study',
            ['name' => 'Cambria (Headings)', 'size' => 14, 'bold' => true],
            ['alignment' => 'center']
        );

        $section->addTextBreak(1);

        // Title of the Subproject
        $section->addText(
            'Title of the Sub-Project: ' . $iPlanChecklist->projectName,
            ['name' => 'Cambria (Headings)', 'size' => 11],
            ['alignment' => 'left']
        );

        // Counterpart
        $section->addText(
            'Counterpart: ' . $iPlanRpabChecklist->counterpart,
            ['name' => 'Cambria (Headings)', 'size' => 11],
            ['alignment' => 'left']
        );

        // Commodity
        $section->addText(
            'Commodities: ' . $commaSeparatedCommodities,
            ['name' => 'Cambria (Headings)', 'size' => 11],
            ['alignment' => 'left']
        );

        $section->addTextBreak(1);

        // Date of Review
        $reviewDate = $iPlanRpabChecklist->reviewDate ?? 'N/A';
        $formattedDate = ($reviewDate !== 'N/A') ? date('F j, Y', strtotime($reviewDate)) : 'N/A';
        $section->addText(
            'Date of Review: ' . $formattedDate,
            ['name' => 'Cambria (Headings)', 'size' => 11],
            ['alignment' => 'left']
        );

        $section->addTextBreak(1);

        // Municipal or Provincial Background Title
        $titleText = 'Municipal or Provincial Background';
        $titleStyle = ['name' => 'Times New Roman', 'size' => 14, 'bold' => true];
        $titleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center'];

        // Municipal or Provincial Background Checklist Table
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);

        // Add Title Row
        $titleRow = $table->addRow();
        $titleRowCell = $titleRow->addCell(15000, $titleCellStyle);
        $titleRowCell->addText($titleText, $titleStyle, ['alignment' => 'center']);

        // Add Header Row
        $table->addRow();
        $table->addCell(2000)->addText('Checklist', ['bold' => true]);
        $table->addCell(1000)->addText('Status', ['bold' => true]);
        $table->addCell(12000)->addText('Comments/Findings', ['bold' => true]);

        $municipalChecklistItems = [
            'Geography' => ['status' => $iPlanRpabChecklist->geographyStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->geographyComments ?? 'N/A'],
            'Land Area Description' => ['status' => $iPlanRpabChecklist->landAreaDescriptionStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->landAreaDescriptionComments ?? 'N/A'],
            'DILG Income Classification' => ['status' => $iPlanRpabChecklist->incomeClassificationStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->incomeClassificationComments ?? 'N/A'],
            'What is the place known for? (interesting facts)' => ['status' => $iPlanRpabChecklist->interestingFactsStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->interestingFactsComments ?? 'N/A'],
            'Brief rural and economic situationer (relative to other municipalities or provinces)' => ['status' => $iPlanRpabChecklist->briefRuralStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->briefRuralComments ?? 'N/A'],
            'SGLG, notable awards, or other distinguishing traits' => ['status' => $iPlanRpabChecklist->awardsStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->awardsComments ?? 'N/A'],
            'Vision in agriculture' => ['status' => $iPlanRpabChecklist->visionAgricultureStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->visionAgricultureComments ?? 'N/A'],
        ];

        foreach ($municipalChecklistItems as $municipalItem => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($municipalItem);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        // Demographics Title
        $titleText = 'Demographics';
        $titleStyle = ['name' => 'Times New Roman', 'size' => 14, 'bold' => true];
        $titleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 10];

        // Demographics Checklist Table
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);

        // Add Title Row
        $titleRow = $table->addRow();
        $titleRowCell = $titleRow->addCell(15000, $titleCellStyle);
        $titleRowCell->addText($titleText, $titleStyle, ['alignment' => 'center']);

        // Add Header Row
        $table->addRow();
        $table->addCell(2000)->addText('Checklist', ['bold' => true]);
        $table->addCell(1000)->addText('Status', ['bold' => true]);
        $table->addCell(12000)->addText('Comments/Findings', ['bold' => true]);

        $demographicsChecklistItems = [
            'Total Population' => ['status' => $iPlanRpabChecklist->totalPopulationStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->totalPopulationComments ?? 'N/A'],
            'Average Household Size' => ['status' => $iPlanRpabChecklist->averageHouseholdSizeStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->averageHouseholdSizeComments ?? 'N/A'],
            'Education of population (if available)' => ['status' => $iPlanRpabChecklist->educationPopulationStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->educationPopulationComments ?? 'N/A'],
            'Barangays, classifications, land area, no. of household, population' => ['status' => $iPlanRpabChecklist->populationStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->populationComments ?? 'N/A'],
        ];

        foreach ($demographicsChecklistItems as $demographicsItem => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($demographicsItem);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        // Economy Title
        $titleText = 'Economy';
        $titleStyle = ['name' => 'Times New Roman', 'size' => 14, 'bold' => true];
        $titleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 10];

        // Economy Checklist Table
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);

        // Add Title Row
        $titleRow = $table->addRow();
        $titleRowCell = $titleRow->addCell(15000, $titleCellStyle);
        $titleRowCell->addText($titleText, $titleStyle, ['alignment' => 'center']);

        // Add Header Row
        $table->addRow();
        $table->addCell(2000)->addText('Checklist', ['bold' => true]);
        $table->addCell(1000)->addText('Status', ['bold' => true]);
        $table->addCell(12000)->addText('Comments/Findings', ['bold' => true]);

        $economyChecklistItems = [
            'Percentage of agriculture income and employment or contribution of agricultural sector in the economy' => ['status' => $iPlanRpabChecklist->agricultureIncomeStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->agricultureIncomeComments ?? 'N/A'],
            'Income disaggregation by sector' => ['status' => $iPlanRpabChecklist->incomeDisaggregationStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->incomeDisaggregationComments ?? 'N/A'],
            'Poverty Incidence (2018 or 2021 PSA data)' => ['status' => $iPlanRpabChecklist->povertyIncidenceStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->povertyIncidenceComments ?? 'N/A'],
            'Available Facilities (post-harvest facilities, banks, agri-markets)' => ['status' => $iPlanRpabChecklist->availableFacilitiesStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->availableFacilitiesComments ?? 'N/A'],
            'Economic vision or thrusts' => ['status' => $iPlanRpabChecklist->economicVisionStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->economicVisionComments ?? 'N/A'],
            'Employment rate and disaggregation by sector' => ['status' => $iPlanRpabChecklist->employmentRateStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->employmentRateComments ?? 'N/A'],
        ];

        foreach ($economyChecklistItems as $economyItem => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($economyItem);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        // Agriculture & Rural Development Sectors Title
        $titleText = 'Agriculture and Rural Development Sectors';
        $titleStyle = ['name' => 'Times New Roman', 'size' => 14, 'bold' => true];
        $titleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 10];

        // Agriculture & Rural Development Sectors Checklist Table
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);

        // Add Title Row
        $titleRow = $table->addRow();
        $titleRowCell = $titleRow->addCell(15000, $titleCellStyle);
        $titleRowCell->addText($titleText, $titleStyle, ['alignment' => 'center']);

        // Add Header Row
        $table->addRow();
        $table->addCell(2000)->addText('Checklist', ['bold' => true]);
        $table->addCell(1000)->addText('Status', ['bold' => true]);
        $table->addCell(12000)->addText('Comments/Findings', ['bold' => true]);

        $agricultureChecklistItems = [
            'Priority commodities (highlight commodity industry where SP will be linked)' => ['status' => $iPlanRpabChecklist->priorityCommoditiesStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->priorityCommoditiesComments ?? 'N/A'],
            'Existing markets (nearby provinces, local, and other major markets even outside the region if applicable)' => ['status' => $iPlanRpabChecklist->existingMarketsStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->existingMarketsComments ?? 'N/A'],
            'Soil description (suitability and characteristics) e.g. sandy, loam, clay, terrain' => ['status' => $iPlanRpabChecklist->soilDescriptionStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->soilDescriptionComments ?? 'N/A'],
            'Agricultural vision or thrusts (e.g. mechanization, cooperation and association, high-value commodities)' => ['status' => $iPlanRpabChecklist->agriculturalVisionStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->agriculturalVisionComments ?? 'N/A'],
            'Water resources (e.g. rivers, electric pumps, wells)' => ['status' => $iPlanRpabChecklist->waterResourcesStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->waterResourcesComments ?? 'N/A'],
            'Climate and Rainfall' => ['status' => $iPlanRpabChecklist->climateRainfallStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->climateRainfallComments ?? 'N/A'],
            'Enterprises available (e.g. small-scale processing)' => ['status' => $iPlanRpabChecklist->enterprisesAvailableStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->enterprisesAvailableComments ?? 'N/A'],
        ];

        foreach ($agricultureChecklistItems as $agricultureItem => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($agricultureItem);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        // Project Identification & Prioritization Profile Title
        $projectTitleText = 'Project Identification and Prioritization Profile';
        $projectTitleStyle = ['name' => 'Times New Roman', 'size' => 14, 'bold' => true];
        $projectTitleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 10];

        // Project Identification & Prioritization Profile Checklist Table
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);

        // Add Main Title Row
        $titleRow = $table->addRow();
        $titleRowCell = $titleRow->addCell(15000, $projectTitleCellStyle);
        $titleRowCell->addText($projectTitleText, $projectTitleStyle, ['alignment' => 'center']);

        // Add Header Row
        $table->addRow();
        $table->addCell(2000)->addText('Checklist', ['bold' => true]);
        $table->addCell(1000)->addText('Status', ['bold' => true]);
        $table->addCell(12000)->addText('Comments/Findings', ['bold' => true]);

        // Add Sub-Title Row (after header row)
        $subTitleText = '&#x2022; EVSA Maps and Statistics';
        $subTitleStyle = ['name' => 'Times New Roman', 'size' => 10, 'bold' => true];
        $subTitleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 5];

        $subTitleRow = $table->addRow();
        $subTitleRowCell = $subTitleRow->addCell(15000, $subTitleCellStyle);
        $subTitleRowCell->addText($subTitleText, $subTitleStyle, ['alignment' => 'left']);

        // Add Checklist Items
        $prioritizationChecklistItems = [
            'If low rank in e-VSA, we may discuss strong points on: (1) poverty incidence; (2) land suitability; (3) production; (4) market; (5) number of raisers (6) hogs inventory -5-year production area' => ['status' => $iPlanRpabChecklist->evsaStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->evsaComments ?? 'N/A'],
            '5 year production area	' => ['status' => $iPlanRpabChecklist->productionAreaStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->productionAreaComments ?? 'N/A'],
        ];

        foreach ($prioritizationChecklistItems as $prioritizationItem => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($prioritizationItem);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        // Add Sub-Title Row
        $subTitleText = '&#x2022; Value Chain Summary';
        $subTitleStyle = ['name' => 'Times New Roman', 'size' => 10, 'bold' => true];
        $subTitleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 5];

        $subTitleRow = $table->addRow();
        $subTitleRowCell = $subTitleRow->addCell(15000, $subTitleCellStyle);
        $subTitleRowCell->addText($subTitleText, $subTitleStyle, ['alignment' => 'left']);

        // Add Checklist Items
        $prioritizationChecklistItems = [
            'Discuss constraint and intervention to which SP is linked (To be based on the draft VCA)' => ['status' => $iPlanRpabChecklist->discussConstraintStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->discussConstraintComments ?? 'N/A'],
        ];

        foreach ($prioritizationChecklistItems as $prioritizationItem => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($prioritizationItem);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        // Add Sub-Title Row
        $subTitleText = '&#x2022; Commodity Profile';
        $subTitleStyle = ['name' => 'Times New Roman', 'size' => 10, 'bold' => true];
        $subTitleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 5];

        $subTitleRow = $table->addRow();
        $subTitleRowCell = $subTitleRow->addCell(15000, $subTitleCellStyle);
        $subTitleRowCell->addText($subTitleText, $subTitleStyle, ['alignment' => 'left']);

        // Add Checklist Items
        $prioritizationChecklistItems = [
            'Available product forms' => ['status' => $iPlanRpabChecklist->availableProductFormStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->availableProductFormComments ?? 'N/A'],
            'Discuss constraint and intervention to which SP is linked (see PCIP)' => ['status' => $iPlanRpabChecklist->discussInterventionStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->discussConstraintComments ?? 'N/A'],
        ];

        foreach ($prioritizationChecklistItems as $prioritizationItem => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($prioritizationItem);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        // Add Sub-Title Row
        $subTitleText = '&#x2022; Proposed/Existing Enterprises to be Supported by the Subprojet';
        $subTitleStyle = ['name' => 'Times New Roman', 'size' => 10, 'bold' => true];
        $subTitleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 5];

        $subTitleRow = $table->addRow();
        $subTitleRowCell = $subTitleRow->addCell(15000, $subTitleCellStyle);
        $subTitleRowCell->addText($subTitleText, $subTitleStyle, ['alignment' => 'left']);

        // Add Checklist Items
        $prioritizationChecklistItems = [
            'How does the SP improve the value-adding mechanism?' => ['status' => $iPlanRpabChecklist->valueAddingMechanismStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->valueAddingMechanismComments ?? 'N/A'],
            'How does this increase value to the commodity?' => ['status' => $iPlanRpabChecklist->increaseValueStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->increaseValueComments ?? 'N/A'],
        ];

        foreach ($prioritizationChecklistItems as $prioritizationItem => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($prioritizationItem);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        // The Subproject Title
        $projectTitleText = 'The Subproject';
        $projectTitleStyle = ['name' => 'Times New Roman', 'size' => 14, 'bold' => true];
        $projectTitleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 10];

        // The Subproject Checklist Table
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);

        // Add Main Title Row
        $titleRow = $table->addRow();
        $titleRowCell = $titleRow->addCell(15000, $projectTitleCellStyle);
        $titleRowCell->addText($projectTitleText, $projectTitleStyle, ['alignment' => 'center']);

        // Add Header Row
        $table->addRow();
        $table->addCell(2000)->addText('Checklist', ['bold' => true]);
        $table->addCell(1000)->addText('Status', ['bold' => true]);
        $table->addCell(12000)->addText('Comments/Findings', ['bold' => true]);

        // Add Sub-Title Row (after header row)
        $subTitleText = '&#x2022; The Road Influence Area';
        $subTitleStyle = ['name' => 'Times New Roman', 'size' => 10, 'bold' => true];
        $subTitleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 5];

        $subTitleRow = $table->addRow();
        $subTitleRowCell = $subTitleRow->addCell(15000, $subTitleCellStyle);
        $subTitleRowCell->addText($subTitleText, $subTitleStyle, ['alignment' => 'left']);

        // Add Checklist Items
        $subprojectChecklistItems = [
            'Beneficiaries demographics' => ['status' => $iPlanRpabChecklist->beneficiariesDemographicsStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->beneficiariesDemographicsComments ?? 'N/A'],
            'No. of households' => ['status' => $iPlanRpabChecklist->numberHouseholdsStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->numberHouseholdsComments ?? 'N/A'],
            'Highlight how it will affect IPs (if any), women, children, and those in the marginal sector' => ['status' => $iPlanRpabChecklist->highlightStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->highlightComments ?? 'N/A'],
        ];

        foreach ($subprojectChecklistItems as $subprojectItem => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($subprojectItem);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        // Add Sub-Title Row (after header row)
        $subTitleText = '&#x2022; Major Economy and Land Use';
        $subTitleStyle = ['name' => 'Times New Roman', 'size' => 10, 'bold' => true];
        $subTitleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 5];

        $subTitleRow = $table->addRow();
        $subTitleRowCell = $subTitleRow->addCell(15000, $subTitleCellStyle);
        $subTitleRowCell->addText($subTitleText, $subTitleStyle, ['alignment' => 'left']);

        // Add Checklist Items
        $subprojectChecklistItems = [
            'Commodity Area' => ['status' => $iPlanRpabChecklist->commodityAreaStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->commodityAreaComments ?? 'N/A'],
            'Priority commodities in the location of SP' => ['status' => $iPlanRpabChecklist->priorityCommoditiesLocationStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->priorityCommoditiesLocationComments ?? 'N/A'],
        ];

        foreach ($subprojectChecklistItems as $subprojectItem => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($subprojectItem);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        // Add Sub-Title Row (after header row)
        $subTitleText = '&#x2022; Poverty Incidence';
        $subTitleStyle = ['name' => 'Times New Roman', 'size' => 10, 'bold' => true];
        $subTitleCellStyle = ['gridSpan' => 3, 'alignment' => 'center', 'vAlign' => 'center', 'spaceAfter' => 5];

        $subTitleRow = $table->addRow();
        $subTitleRowCell = $subTitleRow->addCell(15000, $subTitleCellStyle);
        $subTitleRowCell->addText($subTitleText, $subTitleStyle, ['alignment' => 'left']);

        // Add Checklist Items
        $subprojectChecklistItems = [
            'What percentage of the residents are living in the area (if available)' => ['status' => $iPlanRpabChecklist->percentageResidentsStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->percentageResidentsComments ?? 'N/A'],
            'Living conditions of people in poverty' => ['status' => $iPlanRpabChecklist->livingConditionsStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->livingConditionsComments ?? 'N/A'],
        ];

        foreach ($subprojectChecklistItems as $subprojectItem => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($subprojectItem);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        $section->addTextBreak(1);

        $table = $section->addTable();

        $table->addRow();

        // Add the "Prepared By" column
        $cellPreparedBy = $table->addCell(4500);
        $cellPreparedBy->addText(
            'Prepared By: ',
            ['name' => 'Cambria (Headings)', 'size' => 12]
        );
        $cellPreparedBy->addTextBreak(3);
        $cellPreparedBy->addText(
            $userName,
            ['name' => 'Cambria (Headings)', 'size' => 12, 'bold' => true]
        );
        $cellPreparedBy->addText(
            'Planning Officer',
            ['name' => 'Cambria (Headings)', 'size' => 12, 'italic' => true]
        );

        // Add the "Noted By" column
        $cellNotedBy = $table->addCell(4500);
        $cellNotedBy->addText(
            'Noted By: ',
            ['name' => 'Cambria (Headings)', 'size' => 12],
            ['alignment' => 'right']
        );
        $cellNotedBy->addTextBreak(3);
        $cellNotedBy->addText(
            'Doris Joy C. Garcia',
            ['name' => 'Cambria (Headings)', 'size' => 12, 'bold' => true],
            ['alignment' => 'right']
        );
        $cellNotedBy->addText(
            'I-PLAN Component Head',
            ['name' => 'Cambria (Headings)', 'size' => 12, 'italic' => true],
            ['alignment' => 'right']
        );

        // Generate and download the file
        $fileName = 'validation_report.docx';
        $filePath = storage_path('app/public/' . $fileName);
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
