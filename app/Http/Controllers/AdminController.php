<?php

namespace App\Http\Controllers;

use App\Models\Subproject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $subprojects = Subproject::all();
        $subprojectsCount = $subprojects->count();

        //Clearances Data
        $records = Subproject::select('iPlan', 'iBuild', 'econ', 'ses', 'ggu', 'compliance', 'finance', 'procurement')->get();

        $okCount = [];

        foreach ($records as $record) {
            $countOK = 0;

            if ($record->iPlan === 'OK') $countOK++;
            if ($record->iBuild === 'OK') $countOK++;
            if ($record->econ === 'OK') $countOK++;
            if ($record->ses === 'OK') $countOK++;
            if ($record->ggu === 'OK') $countOK++;
            if ($record->compliance === 'OK') $countOK++;
            if ($record->finance === 'OK') $countOK++;
            if ($record->procurement === 'OK') $countOK++;

            $okCount[] = $countOK;
        }

        $groupedData = array_count_values($okCount);

        $clearancesData = [];
        for ($i = 0; $i <= 9; $i++) {
            $clearancesData[] = $groupedData[$i] ?? 0;
        }

        //Project Type Data
        $projectTypeCounts = Subproject::select('projectType', DB::raw('count(*) as total'))
            ->whereIn('projectType', ['FMR', 'FMB', 'Bridge', 'CIS', 'PWS', 'VCI'])
            ->groupBy('projectType')
            ->pluck('total', 'projectType');

        $projectTypeLabels = ['FMR', 'FMB', 'Bridge', 'CIS', 'PWS', 'VCI'];
        $projectTypeData = [];
        foreach ($projectTypeLabels as $projectTypeLabel) {
            $projectTypeData[] = $projectTypeCounts->get($projectTypeLabel, 0);
        }

        //Project Category Data
        $projectCategoryCounts = Subproject::select('projectCategory', DB::raw('count(*) as total'))
            ->whereIn('projectCategory', ['Construction', 'Rehabilitation', 'Upgrading', 'Additional Work'])
            ->groupBy('projectCategory')
            ->pluck('total', 'projectCategory');

        $projectCategoryLabels = ['Construction', 'Rehabilitation', 'Upgrading', 'Additional Work'];
        $projectCategoryData = [];
        foreach ($projectCategoryLabels as $projectCategoryLabel) {
            $projectCategoryData[] = $projectCategoryCounts->get($projectCategoryLabel, 0);
        }

        return view('admin.dashboard', [
            'subprojects' => $subprojects,
            'subprojectsCount' => $subprojectsCount,
            'clearancesData' => $clearancesData,
            'projectTypeData' => $projectTypeData,
            'projectCategoryData' => $projectCategoryData
        ]);
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
        //
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
