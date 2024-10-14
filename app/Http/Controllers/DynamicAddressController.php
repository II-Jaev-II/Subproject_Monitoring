<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\Municipality;
use Illuminate\Http\Request;

class DynamicAddressController extends Controller
{
    public function getMunicipalities($provinceId)
    {
        $municipalities = Municipality::where('province_id', $provinceId)->get();
        return response()->json($municipalities);
    }

    public function getBarangays($municipalityId)
    {
        $barangays = Barangay::where('municipality_id', $municipalityId)->get();
        return response()->json($barangays);
    }
}
