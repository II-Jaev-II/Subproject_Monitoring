<?php

namespace App\Http\Controllers;

use App\Models\Subproject;
use Illuminate\Http\Request;

class EconController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('econ.dashboard');
    }

    public function view($id)
    {
        $subprojects = Subproject::join('provinces', 'subprojects.province', '=', 'provinces.id')
            ->join('municipalities', 'subprojects.municipality', '=', 'municipalities.id')
            ->join('barangays', 'subprojects.barangay', '=', 'barangays.id')
            ->where('subprojects.id', $id)
            ->firstOrFail();

        return view('econ.view-subprojects.view-subproject', [
            'subprojects' => $subprojects
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $subprojects = Subproject::all();

        return view('econ.subprojects', [
            'subprojects' => $subprojects,
        ]);
    }

    public function showClearances()
    {
        $subprojects = Subproject::all();

        return view('econ.clearances.clearances', [
            'subprojects' => $subprojects,
        ]);
    }
}
