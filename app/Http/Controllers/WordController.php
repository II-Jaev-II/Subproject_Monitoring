<?php

namespace App\Http\Controllers;

use App\Models\Subproject;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class WordController extends Controller
{
    public function generateReport($id)
    {

        $subprojectData = Subproject::join('provinces', 'subprojects.province', '=', 'provinces.id')
            ->join('municipalities', 'subprojects.municipality', '=', 'municipalities.id')
            ->join('barangays', 'subprojects.barangay', '=', 'barangays.id')
            ->join('iplan_checklists', 'subprojects.id', '=', 'iplan_checklists.subprojectId')
            ->join('ses_checklists', 'subprojects.id', '=', 'ses_checklists.subprojectId')
            ->select('subprojects.*', 'subprojects.letterOfRequest', 'subprojects.letterOfEndorsement', 'provinces.province_name', 'municipalities.municipality_name', 'barangays.barangay_name', 'iplan_checklists.recommendation', 'iplan_checklists.generalRecommendation', 'ses_checklists.socialAssesment', 'ses_checklists.environmentalAssesment')
            ->where('subprojects.id', $id)
            ->first();

        $phpWord = new PhpWord();

        $section = $phpWord->addSection();

        $table = $section->addTable(['alignment' => 'left']);

        $table->addRow();

        $imageCell = $table->addCell(500);
        $imagePath = public_path('images/prdp_logo.png');
        $imageCell->addImage(
            $imagePath,
            [
                'width' => 80,
                'height' => 80,
                'alignment' => 'left'
            ]
        );

        $textCell = $table->addCell(6500);
        $textCell->addText('Republic of the Philippines', [
            'name' => 'Times New Roman',
            'size' => 11
        ], [
            'alignment' => 'center',
            'spaceAfter' => 10
        ]);
        $textCell->addText('DEPARTMENT OF AGRICULTURE', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ], [
            'alignment' => 'center',
            'spaceAfter' => 10
        ]);
        $textCell->addText('PHILIPPINE RURAL DEVELOPMENT PROJECT SCALE UP', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ], [
            'alignment' => 'center',
            'spaceAfter' => 10
        ]);
        $textCell->addText('Regional Project Coordination Office 1', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ], [
            'alignment' => 'center',
            'spaceAfter' => 10
        ]);
        $textCell->addText('City of San Fernando, La Union', [
            'name' => 'Times New Roman',
            'size' => 11,
        ], [
            'alignment' => 'center',
            'spaceAfter' => 10
        ]);


        $textCell->addText('RPCO 1 JOINT VALIDATION REPORT', [
            'name' => 'Times New Roman',
            'size' => 12,
            'bold' => true,
            'underline' => 'single'
        ], [
            'alignment' => 'center',
            'spaceBefore' => 300,
            'spaceAfter' => 10
        ]);
        $textCell->addText('(' . $subprojectData->projectType . ')', [
            'name' => 'Times New Roman',
            'size' => 11,
        ], [
            'alignment' => 'center',
        ]);

        // General Information Table
        $tableStyle = [
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 50
        ];
        $phpWord->addTableStyle('GeneralInfoTable', $tableStyle);

        $tableStyle = [
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 50
        ];
        $phpWord->addTableStyle('GeneralInfoTable', $tableStyle);

        $generalInfoTable = $section->addTable('GeneralInfoTable');

        $generalInfoTable->addRow();
        $headerCell = $generalInfoTable->addCell(10000, ['gridSpan' => 2]);
        $headerCell->addText('General Information:', [
            'name' => 'Times New Roman',
            'size' => 12,
            'bold' => true
        ], [
            'alignment' => 'left'
        ]);

        $generalInfoTable->addRow();

        // Subproject Title
        $textRunTitle = $generalInfoTable->addCell(5000)->addTextRun();
        $textRunTitle->addText('Subproject Title: ', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $textRunTitle->addTextBreak();
        $textRunTitle->addText($subprojectData->projectName, [
            'name' => 'Times New Roman',
            'size' => 11
        ]);

        // Implementing Proponent Group
        $textRunProponent = $generalInfoTable->addCell(5000)->addTextRun();
        $textRunProponent->addText('Implementing Proponent Group: ', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $textRunProponent->addTextBreak();
        $textRunProponent->addText($subprojectData->proponent . ' ' . $subprojectData->province_name, [
            'name' => 'Times New Roman',
            'size' => 11
        ]);

        // Add another row
        $generalInfoTable->addRow();

        // Subproject No.
        $textRunSubprojectNo = $generalInfoTable->addCell(5000)->addTextRun();
        $textRunSubprojectNo->addText('Subproject No.: ', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $textRunSubprojectNo->addTextBreak();
        $textRunSubprojectNo->addText('Sample Data', [
            'name' => 'Times New Roman',
            'size' => 11
        ]);

        // Physical Target (sqm)
        $textRunPhysicalTarget = $generalInfoTable->addCell(5000)->addTextRun();
        $textRunPhysicalTarget->addText('Physical Target (sqm): ', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $textRunPhysicalTarget->addTextBreak();
        $textRunPhysicalTarget->addText('Sample Data', [
            'name' => 'Times New Roman',
            'size' => 11
        ]);

        // Add another row
        $generalInfoTable->addRow();

        // Category
        $textRunCategory = $generalInfoTable->addCell(5000)->addTextRun();
        $textRunCategory->addText('Category: ', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $textRunCategory->addTextBreak();
        $textRunCategory->addText($subprojectData->projectCategory, [
            'name' => 'Times New Roman',
            'size' => 11
        ]);

        // Estimated Project Cost
        $textRunEstimatedCost = $generalInfoTable->addCell(5000)->addTextRun();
        $textRunEstimatedCost->addText('Estimated Project Cost: ', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $textRunEstimatedCost->addTextBreak();
        $value = $subprojectData->indicativeCost; // Example: 1000000.45678
        $parts = explode('.', (string)$value); // Split into integer and decimal parts
        $integerPart = number_format($parts[0]); // Format the integer part with commas
        $decimalPart = isset($parts[1]) ? '.' . $parts[1] : ''; // Preserve exact decimals

        $textRunEstimatedCost->addText('Php ' . $integerPart . $decimalPart, [
            'name' => 'Times New Roman',
            'size' => 11
        ]);

        // Add another row
        $generalInfoTable->addRow();
        // Location
        $textRunLocation = $generalInfoTable->addCell(5000)->addTextRun();
        $textRunLocation->addText('Location: ', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $textRunLocation->addTextBreak();
        $textRunLocation->addText($subprojectData->barangay_name . ', ' . $subprojectData->municipality_name . ', ' . $subprojectData->province_name, [
            'name' => 'Times New Roman',
            'size' => 11
        ]);

        // No. of Farming Household & IP Farming Household
        $textRunNumberHousehold = $generalInfoTable->addCell(5000)->addTextRun();
        // No. of Farming Household
        $textRunNumberHousehold->addText('No. of Farming Household: ', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $textRunNumberHousehold->addTextBreak();
        $textRunNumberHousehold->addText('Sample Data', [
            'name' => 'Times New Roman',
            'size' => 11
        ]);
        // Add a line break between the two sections
        $textRunNumberHousehold->addTextBreak();
        // No. of IP Farming Household
        $textRunNumberHousehold->addText('No. of IP Farming Household: ', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $textRunNumberHousehold->addTextBreak();
        $textRunNumberHousehold->addText('Sampe Data', [
            'name' => 'Times New Roman',
            'size' => 11
        ]);

        // Add new row for Service Areas
        $row = $generalInfoTable->addRow();
        $cell = $row->addCell(10000);
        $cell->getStyle()->setGridSpan(2);
        $textRunServiceAreas = $cell->addTextRun();
        $textRunServiceAreas->addText('Service Areas: ', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $textRunServiceAreas->addTextBreak();
        $textRunServiceAreas->addText('Sample Data', [
            'name' => 'Times New Roman',
            'size' => 11
        ]);

        // Add new row for Existence of Registered FCAs in line to the commodity
        $row = $generalInfoTable->addRow();
        $cell = $row->addCell(10000);
        $cell->getStyle()->setGridSpan(2);
        $textRunFCAs = $cell->addTextRun();
        $textRunFCAs->addText('Existence of Registered FCAs in line to the commodity: ', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $textRunFCAs->addTextBreak();
        $textRunFCAs->addText('Sample Data', [
            'name' => 'Times New Roman',
            'size' => 11
        ]);

        // Add new row for General Observation and Project Description
        $row = $generalInfoTable->addRow();
        $cell = $row->addCell(10000);
        $cell->getStyle()->setGridSpan(2);

        // Add "General Observation" centered
        $cell->addText(
            'General Observation ',
            [
                'name' => 'Times New Roman',
                'size' => 12,
                'bold' => true,
            ],
            [
                'alignment' => 'center',
            ]
        );

        // Add "Project Description" positioned to the left
        $cell->addText(
            'Project Description',
            [
                'name' => 'Times New Roman',
                'size' => 12,
                'bold' => true,
            ],
            [
                'alignment' => 'left',
                'spaceBefore' => 100,
            ]
        );

        // Add "Existence of FCA" positioned to the left
        $cell->addText(
            'Existence of FCA',
            [
                'name' => 'Times New Roman',
                'size' => 12,
                'bold' => true,
            ],
            [
                'alignment' => 'left',
                'spaceBefore' => 300,
            ]
        );

        // Add "Comments/Finding" positioned to the left
        $cell->addText(
            'Comments/Findings',
            [
                'name' => 'Times New Roman',
                'size' => 12,
                'bold' => true,
            ],
            [
                'alignment' => 'left',
                'spaceBefore' => 300,
            ]
        );
        $cell->addText(
            $subprojectData->socialAssesment,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
                'spaceBefore' => 300,
            ]
        );
        $cell->addText(
            $subprojectData->environmentalAssesment,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
                'spaceBefore' => 300,
            ]
        );

        // Add "Recommendations" positioned to the left
        $cell->addText(
            'Recommendations',
            [
                'name' => 'Times New Roman',
                'size' => 12,
                'bold' => true,
            ],
            [
                'alignment' => 'left',
                'spaceBefore' => 300,
            ]
        );
        $cell->addText(
            $subprojectData->recommendation,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
                'spaceBefore' => 300,
            ]
        );
        $cell->addText(
            $subprojectData->generalRecommendation,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
                'spaceBefore' => 300,
            ]
        );

        $fileName = 'validation_report.docx';
        $filePath = storage_path('app/public/' . $fileName);

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
