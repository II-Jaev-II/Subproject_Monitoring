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
        $clearedSubprojectsCount = $subprojects->where('total', 5)->count();
        $onGoingSubprojectsCount = $subprojects->where('total', '<', 5)->count();

        $failedSubprojectsCount = Subproject::where(function ($query) {
            $query->where('iPLAN', 'Failed')
                ->orWhere('iBUILD', 'Failed')
                ->orWhere('econ', 'Failed')
                ->orWhere('ses', 'Failed')
                ->orWhere('ggu', 'Failed');
        })->count();

        $ongoingSubprojects = Subproject::where('total', '<', 5)->get();
        $onGoingSubprojectsCount = $ongoingSubprojects->filter(function ($subproject) {
            return $subproject->iPLAN !== 'Failed' &&
                $subproject->iBUILD !== 'Failed' &&
                $subproject->econ !== 'Failed' &&
                $subproject->ses !== 'Failed' &&
                $subproject->ggu !== 'Failed';
        })->count();

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
            ->whereIn('projectCategory', ['Construction', 'Rehabilitation'])
            ->groupBy('projectCategory')
            ->pluck('total', 'projectCategory');

        $projectCategoryLabels = ['Construction', 'Rehabilitation'];
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
            'clearedSubprojectsCount' => $clearedSubprojectsCount,
            'onGoingSubprojectsCount' => $onGoingSubprojectsCount,
            'failedSubprojectsCount' => $failedSubprojectsCount
        ]);
    }

    public function getSubprojectData()
    {
        $data = [
            'iPLAN' => [
                'cleared' => DB::table('subprojects')->whereIn('iPLAN', ['OK', 'Passed'])->count(),
                'failed' => DB::table('subprojects')->where('iPLAN', 'Failed')->count(),
                'pending' => DB::table('subprojects')
                    ->where('iPLAN', 'Pending')
                    ->orWhereNull('iPLAN')
                    ->count(),
            ],
            'iBUILD' => [
                'cleared' => DB::table('subprojects')->whereIn('iBUILD', ['OK', 'Passed'])->count(),
                'failed' => DB::table('subprojects')->where('iBUILD', 'Failed')->count(),
                'pending' => DB::table('subprojects')
                    ->where('iBUILD', 'Pending')
                    ->orWhereNull('iBUILD')
                    ->count(),
            ],
            'econ' => [
                'cleared' => DB::table('subprojects')->whereIn('econ', ['OK', 'Passed'])->count(),
                'failed' => DB::table('subprojects')->where('econ', 'Failed')->count(),
                'pending' => DB::table('subprojects')
                    ->where('econ', 'Pending')
                    ->orWhereNull('econ')
                    ->count(),
            ],
            'ses' => [
                'cleared' => DB::table('subprojects')->whereIn('ses', ['OK', 'Passed'])->count(),
                'failed' => DB::table('subprojects')->where('ses', 'Failed')->count(),
                'pending' => DB::table('subprojects')
                    ->where('ses', 'Pending')
                    ->orWhereNull('ses')
                    ->count(),
            ],
            'ggu' => [
                'cleared' => DB::table('subprojects')->whereIn('ggu', ['OK', 'Passed'])->count(),
                'failed' => DB::table('subprojects')->where('ggu', 'Failed')->count(),
                'pending' => DB::table('subprojects')
                    ->where('ggu', 'Pending')
                    ->orWhereNull('ggu')
                    ->count(),
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
    public function show()
    {
        return view('admin.subprojects');
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
