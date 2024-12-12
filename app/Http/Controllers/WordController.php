<?php

namespace App\Http\Controllers;

use App\Models\IplanChecklist;
use App\Models\Subproject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            ->join('econ_checklists', 'subprojects.id', '=', 'econ_checklists.subprojectId')
            ->join('ggu_checklists', 'subprojects.id', '=', 'ggu_checklists.subprojectId')
            ->select('subprojects.*', 'subprojects.subprojectNumber', 'subprojects.letterOfRequest', 'subprojects.letterOfEndorsement', 'provinces.province_name', 'municipalities.municipality_name', 'barangays.barangay_name', 'iplan_checklists.linkedVca', 'iplan_checklists.opportunity', 'iplan_checklists.specificIntervention', 'iplan_checklists.pageVca', 'iplan_checklists.pcip', 'iplan_checklists.page', 'iplan_checklists.recommendation', 'iplan_checklists.generalRecommendation', 'econ_checklists.summary', 'ggu_checklists.remarks', 'ses_checklists.reason', 'ses_checklists.requirementCompliance', 'ses_checklists.cleared', 'ses_checklists.socialAssesment', 'ses_checklists.environmentalAssesment')
            ->where('subprojects.id', $id)
            ->first();

        $commodities = IplanChecklist::join('iplan_commodities', 'iplan_checklists.id', '=', 'iplan_commodities.checklistId')
            ->select('iplan_commodities.commodityName')
            ->where('iplan_checklists.subprojectId', $id)
            ->get();

        $rankAndCompositeData = [];
        foreach ($commodities as $commodity) {
            $commodityName = $commodity->commodityName;

            if (strtolower($commodityName) === 'others') {
                $rankAndCompositeData[] = [
                    'commodity' => $commodityName,
                    'rank' => 'N/A',
                    'index' => 'N/A'
                ];
                continue;
            }

            $rankColumn = 'evsaRank' . ucfirst($commodityName);
            $indexColumn = 'compositeIndex' . ucfirst($commodityName);

            $rankAndComposite = DB::table('iplan_rank_and_composites')
                ->select($rankColumn, $indexColumn)
                ->first();

            $rankAndCompositeData[] = [
                'commodity' => $commodityName,
                'rank' => $rankAndComposite->$rankColumn ?? 'N/A',
                'index' => $rankAndComposite->$indexColumn ?? 'N/A'
            ];
        }

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
        $textRunSubprojectNo->addText($subprojectData->subprojectNumber, [
            'name' => 'Times New Roman',
            'size' => 11
        ]);

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

        // Add another row
        $generalInfoTable->addRow();

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

        // Add "IPLAN" positioned to the left
        $cell->addText(
            'IPLAN Validation',
            [
                'name' => 'Times New Roman',
                'size' => 12,
                'bold' => true,
            ],
            [
                'alignment' => 'left',
            ]
        );

        // Create a table below IPLAN
        $table = $cell->addTable([
            'borderSize' => 6,
            'borderColor' => '000000',
            'alignment' => 'center',
            'cellMargin' => 50,
        ]);

        // Add table headers
        $table->addRow();
        $table->addCell(4000)->addText(
            'Commodity',
            ['name' => 'Times New Roman', 'size' => 12, 'bold' => true],
            ['alignment' => 'center']
        );
        $table->addCell(3000)->addText(
            'E-VSA Rank',
            ['name' => 'Times New Roman', 'size' => 12, 'bold' => true],
            ['alignment' => 'center']
        );
        $table->addCell(3000)->addText(
            'Composite Index',
            ['name' => 'Times New Roman', 'size' => 12, 'bold' => true],
            ['alignment' => 'center']
        );

        foreach ($rankAndCompositeData as $data) {
            $table->addRow();
            $table->addCell(4000)->addText($data['commodity'], ['name' => 'Times New Roman', 'size' => 11]);
            $table->addCell(3000)->addText($data['rank'], ['name' => 'Times New Roman', 'size' => 11]);
            $table->addCell(3000)->addText($data['index'], ['name' => 'Times New Roman', 'size' => 11]);
        }

        // Add "Linked to VCA" positioned to the left
        $cell->addText(
            'Linked to VCA?',
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
            '- ' . $subprojectData->linkedVca,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
            ]
        );

        // Add "Opportunity or Constraint Being Addressed" positioned to the left
        $cell->addText(
            'Opportunity or Constraint Being Addressed',
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
            '- ' . $subprojectData->opportunity,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
            ]
        );

        // Add "Specific Intervention" positioned to the left
        $cell->addText(
            'Specific Intervention',
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
            '- ' . $subprojectData->specificIntervention,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
            ]
        );

        // Add "Page of VCA" positioned to the left
        $cell->addText(
            'Page of VCA',
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
            '- ' . $subprojectData->pageVca,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
            ]
        );

        // Add "Linked to PCIP" positioned to the left
        $cell->addText(
            'Linked to PCIP?',
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
            '- ' . $subprojectData->pcip,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
            ]
        );

        // Add "Page of Matrix" positioned to the left
        $cell->addText(
            'Page of Matrix',
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
            '- ' . $subprojectData->page,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
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

        // Add "General Recommendations" positioned to the left
        $cell->addText(
            'General Recommendations',
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

        // Add "ECON" positioned to the left
        $cell->addText(
            'ECON',
            [
                'name' => 'Times New Roman',
                'size' => 12,
                'bold' => true,
            ],
            [
                'alignment' => 'left',
            ]
        );

        $cell->addText(
            'Summary',
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
            $subprojectData->summary,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
                'spaceBefore' => 300,
            ]
        );

        // Add "GGU" positioned to the left
        $cell->addText(
            'GGU',
            [
                'name' => 'Times New Roman',
                'size' => 12,
                'bold' => true,
            ],
            [
                'alignment' => 'left',
            ]
        );

        $cell->addText(
            'Remarks',
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
            $subprojectData->remarks,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
                'spaceBefore' => 300,
            ]
        );

        // Add "SES" positioned to the left
        $cell->addText(
            'SES',
            [
                'name' => 'Times New Roman',
                'size' => 12,
                'bold' => true,
            ],
            [
                'alignment' => 'left',
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
            $subprojectData->cleared,
            [
                'name' => 'Times New Roman',
                'size' => 11
            ],
            [
                'alignment' => 'left',
                'spaceBefore' => 300,
            ]
        );

        // Add "Social Assessment" positioned to the left
        $cell->addText(
            'Social Assessment',
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

        // Add "Environmental Assessment" positioned to the left
        $cell->addText(
            'Environmental Assessment',
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

        $fileName = 'validation_report.docx';
        $filePath = storage_path('app/public/' . $fileName);

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
