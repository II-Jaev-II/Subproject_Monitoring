<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubprojectRequest;
use App\Models\Province;
use App\Models\Subproject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IBuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ibuild.dashboard');
    }

    public function view($id)
    {
        $subprojects = Subproject::join('provinces', 'subprojects.province', '=', 'provinces.id')
            ->join('municipalities', 'subprojects.municipality', '=', 'municipalities.id')
            ->join('barangays', 'subprojects.barangay', '=', 'barangays.id')
            ->where('subprojects.id', $id)
            ->firstOrFail();

        return view('ibuild.view-subprojects.view-subproject', [
            'subprojects' => $subprojects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();

        return view('ibuild.create-subproject', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubprojectRequest $request)
    {
        $user = Auth::user();

        $request->validated();

        $fileFields = [
            'letterOfInterest' => 'uploadedFiles/letterOfInterest',
            'commodityReport' => 'uploadedFiles/report',
        ];

        foreach ($fileFields as $field => $basePath) {
            if ($request->has($field)) {
                $file = $request->file($field);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move($basePath, $filename);

                $paths[$field] = $basePath . '/' . $filename;
            }
        }

        Subproject::create([
            'proponent' => $request->get('proponent', ''),
            'cluster' => $request->get('cluster', ''),
            'region' => $request->get('region', ''),
            'province' => $request->get('province', ''),
            'municipality' => $request->get('municipality', ''),
            'barangay' => $request->get('barangay', ''),
            'projectName' => $request->get('projectName', ''),
            'projectType' => $request->get('projectType', ''),
            'projectCategory' => $request->get('projectCategory', ''),
            'fundSource' => $request->get('fundSource', ''),
            'indicativeCost' => $request->get('indicativeCost', ''),
            'letterOfInterest' => $paths['letterOfInterest'] ?? null,
            'commodity' => $request->get('commodity', ''),
            'report' => $paths['commodityReport'] ?? null,
            'userId' => $user->id,
        ]);

        return redirect()->route('ibuild.subprojects')->with('success', 'Subproject has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $subprojects = Subproject::all();

        return view('ibuild.subprojects', [
            'subprojects' => $subprojects,
        ]);
    }

    public function showClearances()
    {
        $subprojects = Subproject::all();

        return view('ibuild.clearances.clearances', [
            'subprojects' => $subprojects,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subprojects = Subproject::all();

        return view('ibuild.clearances.clearances', [
            'subprojects' => $subprojects,
        ]);
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
