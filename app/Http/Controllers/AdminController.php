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
        $records = Subproject::select('iPLAN', 'iBUILD', 'econ', 'ses', 'ggu')->get();

        $okCount = [];

        foreach ($records as $record) {
            $countOK = 0;

            if ($record->iPLAN === 'OK') {
                $countOK++;
            }
            if ($record->iBUILD === 'OK') {
                $countOK++;
            }
            if ($record->econ === 'OK') {
                $countOK++;
            }
            if ($record->ses === 'OK') {
                $countOK++;
            }
            if ($record->ggu === 'OK') {
                $countOK++;
            }

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

        //Provinces Data
        $provinceCounts = Subproject::select('provinces.province_name as province', DB::raw('count(*) as total'))
            ->join('provinces', 'subprojects.province', '=', 'provinces.id')
            ->whereIn('provinces.province_name', ['Ilocos Sur', 'Ilocos Norte', 'La Union', 'Pangasinan'])
            ->groupBy('provinces.province_name')
            ->pluck('total', 'province');

        $provinceLabels = ['Ilocos Sur', 'Ilocos Norte', 'La Union', 'Pangasinan'];
        $provinceData = [];
        foreach ($provinceLabels as $provinceLabel) {
            $provinceData[] = $provinceCounts->get($provinceLabel, 0);
        }

        return view('admin.dashboard', [
            'subprojects' => $subprojects,
            'subprojectsCount' => $subprojectsCount,
            'clearancesData' => $clearancesData,
            'projectTypeData' => $projectTypeData,
            'projectCategoryData' => $projectCategoryData,
            'provinceData' => $provinceData,
            'provinceLabels' => $provinceLabels,
        ]);
    }

    public function getSubprojectData()
    {
        $data = [
            'iPLAN' => [
                'cleared' => DB::table('subprojects')->whereNotNull('iPLAN')->count(),
                'notCleared' => DB::table('subprojects')->whereNull('iPLAN')->count(),
            ],
            'iBUILD' => [
                'cleared' => DB::table('subprojects')->whereNotNull('iBUILD')->count(),
                'notCleared' => DB::table('subprojects')->whereNull('iBUILD')->count(),
            ],
            'econ' => [
                'cleared' => DB::table('subprojects')->whereNotNull('econ')->count(),
                'notCleared' => DB::table('subprojects')->whereNull('econ')->count(),
            ],
            'ses' => [
                'cleared' => DB::table('subprojects')->whereNotNull('ses')->count(),
                'notCleared' => DB::table('subprojects')->whereNull('ses')->count(),
            ],
            'ggu' => [
                'cleared' => DB::table('subprojects')->whereNotNull('ggu')->count(),
                'notCleared' => DB::table('subprojects')->whereNull('ggu')->count(),
            ],
        ];

        return response()->json($data);
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
