<?php

namespace App\Http\Controllers;

use App\Models\IplanRpabChecklist;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class GenerateIplanRpabReportController extends Controller
{
    public function generateReport($id)
    {
        $iPlanRpabChecklist = IplanRpabChecklist::where('id', $id)->first();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Date of Review
        $reviewDate = $iPlanRpabChecklist->reviewDate ?? 'N/A';
        $formattedDate = ($reviewDate !== 'N/A') ? date('F j, Y', strtotime($reviewDate)) : 'N/A';
        $section->addText('Date of Review: ' . $formattedDate, ['name' => 'Times New Roman', 'size' => 11], ['alignment' => 'left', 'spaceAfter' => 10]);

        // Municipal or Provincial Background
        $section->addText('Municipal or Provincial Background', ['name' => 'Times New Roman', 'size' => 12, 'bold' => true], ['alignment' => 'left', 'spaceAfter' => 10]);

        // Checklist Table
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);
        $table->addRow();
        $table->addCell(4000)->addText('Checklist', ['bold' => true]);
        $table->addCell(3000)->addText('Status', ['bold' => true]);
        $table->addCell(5000)->addText('Comments/Findings', ['bold' => true]);

        $checklistItems = [
            'Geography' => ['status' => $iPlanRpabChecklist->geographyStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->geographyComments ?? 'N/A'],
            'Land Area Description' => ['status' => $iPlanRpabChecklist->landAreaDescriptionStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->landAreaDescriptionComments ?? 'N/A'],
            'DILG Income Classification' => ['status' => $iPlanRpabChecklist->incomeClassificationStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->incomeClassificationComments ?? 'N/A'],
            'What is the place known for? (interesting facts)' => ['status' => $iPlanRpabChecklist->interestingFactsStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->interestingFactsComments ?? 'N/A'],
            'Brief rural and economic situationer (relative to other municipalities or provinces)' => ['status' => $iPlanRpabChecklist->briefRuralStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->briefRuralComments ?? 'N/A'],
            'SGLG, notable awards, or other distinguishing traits' => ['status' => $iPlanRpabChecklist->awardsStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->awardsComments ?? 'N/A'],
            'Vision in agriculture' => ['status' => $iPlanRpabChecklist->visionAgricultureStatus ?? 'N/A', 'comments' => $iPlanRpabChecklist->visionAgricultureComments ?? 'N/A'],
        ];

        foreach ($checklistItems as $item => $data) {
            $status = ($data['status'] === 'complied') ? 'Complied' : (($data['status'] === 'notComplied') ? 'Not Complied' : $data['status']);

            $table->addRow();
            $table->addCell(4000)->addText($item);
            $table->addCell(3000)->addText($status);
            $table->addCell(5000)->addText($data['comments']);
        }

        // Generate and download the file
        $fileName = 'validation_report.docx';
        $filePath = storage_path('app/public/' . $fileName);
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
