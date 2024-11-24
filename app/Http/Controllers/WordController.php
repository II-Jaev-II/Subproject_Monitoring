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

        $subprojectData = Subproject::where('id', $id)->first();

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

        // General Requirements Table
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
        $generalInfoTable->addCell(5000)->addText('Subproject Title:', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);
        $generalInfoTable->addCell(5000)->addText('Implementing Proponent Group:', [
            'name' => 'Times New Roman',
            'size' => 11,
            'bold' => true
        ]);

        $fileName = 'validation_report.docx';
        $filePath = storage_path('app/public/' . $fileName);

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
