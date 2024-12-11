<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIbuildChecklistRequest;
use App\Http\Requests\StoreSubprojectRequest;
use App\Models\EconChecklist;
use App\Models\GGUChecklist;
use App\Models\IbuildFmrBridgeChecklist;
use App\Models\IbuildPwsCisChecklist;
use App\Models\IbuildVcriChecklist;
use App\Models\IplanChecklist;
use App\Models\IplanCommodity;
use App\Models\IplanRankAndComposite;
use App\Models\IreapChecklist;
use App\Models\Province;
use App\Models\SesChecklist;
use App\Models\SesRequirements;
use App\Models\Subproject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $address = Subproject::join('provinces', 'subprojects.province', '=', 'provinces.id')
            ->join('municipalities', 'subprojects.municipality', '=', 'municipalities.id')
            ->join('barangays', 'subprojects.barangay', '=', 'barangays.id')
            ->where('subprojects.id', $id)
            ->firstOrFail();

        $subprojects = Subproject::where('subprojects.id', $id)
            ->select('subprojects.*', 'subprojects.letterOfRequest', 'subprojects.letterOfEndorsement')
            ->first();

        $iPlanChecklists = IplanChecklist::where('iplan_checklists.subprojectId', $id)->first();
        $commodities = [];
        if ($iPlanChecklists) {
            $commodities = IplanCommodity::where('checklistId', $iPlanChecklists->id)->get();
        }
        $rankAndComposite = null;
        if ($iPlanChecklists) {
            $rankAndComposite = IplanRankAndComposite::where('checklistId', $iPlanChecklists->id)->first();
        }

        $sesChecklists = SesChecklist::where('ses_checklists.subprojectId', $id)->first();
        $sesRequirements = [];
        if ($sesChecklists) {
            $sesRequirements = SesRequirements::where('checklistId', $sesChecklists->id)->get();
        }

        $gguChecklists = GGUChecklist::where('ggu_checklists.subprojectId', $id)->first();

        $gguReport = $gguChecklists ? $gguChecklists->report : null;

        $econChecklists = EconChecklist::where('econ_checklists.subprojectId', $id)->first();

        $iReapChecklists = IreapChecklist::where('ireap_checklists.subprojectId', $id)->first();

        // Query each checklist independently
        $vcriChecklists = DB::table('ibuild_vcri_checklists')
            ->where('subprojectId', $id)
            ->first();

        $fmrBridgeChecklists = DB::table('ibuild_fmr_bridge_checklists')
            ->where('subprojectId', $id)
            ->first();

        $pwsCisChecklists = DB::table('ibuild_pws_cis_checklists')
            ->where('subprojectId', $id)
            ->first();

        // Determine if any checklist exists
        $hasRecords = $vcriChecklists || $fmrBridgeChecklists || $pwsCisChecklists;

        // Determine the subproject type
        $subprojectType = null;
        if ($vcriChecklists) {
            $subprojectType = 'VCRI';
        } elseif ($fmrBridgeChecklists) {
            $subprojectType = 'Bridge';
        } elseif ($pwsCisChecklists) {
            $subprojectType = 'PWS';
        }

        $formattedReviewDateIPlan = null;
        if ($iPlanChecklists && $iPlanChecklists->reviewDate) {
            $formattedReviewDateIPlan = Carbon::parse($iPlanChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateSes = null;
        if ($sesChecklists && $sesChecklists->reviewDate) {
            $formattedReviewDateSes = Carbon::parse($sesChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateGgu = null;
        if ($gguChecklists && $gguChecklists->reviewDate) {
            $formattedReviewDateGgu = Carbon::parse($gguChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateIBuildVcri = null;
        if ($vcriChecklists && $vcriChecklists->reviewDate) {
            $formattedReviewDateIBuildVcri = Carbon::parse($vcriChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateIBuildFmrBridge = null;
        if ($fmrBridgeChecklists && $fmrBridgeChecklists->reviewDate) {
            $formattedReviewDateIBuildFmrBridge = Carbon::parse($fmrBridgeChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateIBuildPwsCis = null;
        if ($pwsCisChecklists && $pwsCisChecklists->reviewDate) {
            $formattedReviewDateIBuildPwsCis = Carbon::parse($pwsCisChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateEcon = null;
        if ($econChecklists && $econChecklists->reviewDate) {
            $formattedReviewDateEcon = Carbon::parse($econChecklists->reviewDate)->format('F j, Y');
        }

        $formattedReviewDateIReap = null;
        if ($iReapChecklists && $iReapChecklists->reviewDate) {
            $formattedReviewDateIReap = Carbon::parse($iReapChecklists->reviewDate)->format('F j, Y');
        }

        return view('ibuild.view-subprojects.view-subproject', [
            'subprojects' => $subprojects,
            'address' => $address,
            'iPlanChecklists' => $iPlanChecklists,
            'commodities' => $commodities,
            'rankAndComposite' => $rankAndComposite,
            'sesChecklists' => $sesChecklists,
            'sesRequirements' => $sesRequirements,
            'gguChecklists' => $gguChecklists,
            'gguReport' => $gguReport,
            'vcriChecklists' => $vcriChecklists,
            'fmrBridgeChecklists' => $fmrBridgeChecklists,
            'pwsCisChecklists' => $pwsCisChecklists,
            'subprojectType' => $subprojectType,
            'hasRecords' => $hasRecords,
            'econChecklists' => $econChecklists,
            'iReapChecklists' => $iReapChecklists,

            'formattedReviewDateIPlan' => $formattedReviewDateIPlan,
            'formattedReviewDateSes' => $formattedReviewDateSes,
            'formattedReviewDateGgu' => $formattedReviewDateGgu,
            'formattedReviewDateIBuildVcri' => $formattedReviewDateIBuildVcri,
            'formattedReviewDateIBuildFmrBridge' => $formattedReviewDateIBuildFmrBridge,
            'formattedReviewDateIBuildPwsCis' => $formattedReviewDateIBuildPwsCis,
            'formattedReviewDateEcon' => $formattedReviewDateEcon,
            'formattedReviewDateIReap' => $formattedReviewDateIReap,
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
            'letterOfRequest' => 'uploadedFiles/letterOfRequest',
            'letterOfEndorsement' => 'uploadedFiles/letterOfEndorsement',
        ];

        $paths = [];

        foreach ($fileFields as $field => $basePath) {
            if (!file_exists($basePath)) {
                mkdir($basePath, 0755, true);
            }

            if ($request->hasFile($field)) {
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
            'letterOfRequest' => $paths['letterOfRequest'] ?? null,
            'letterOfEndorsement' => $paths['letterOfEndorsement'] ?? null,
            'userId' => $user->id,
        ]);

        return redirect()->route('ibuild.subprojects')->with('success', 'Subproject has been created successfully!');
    }

    public function storeValidatedSubproject(StoreIbuildChecklistRequest $request)
    {
        $user = Auth::user();
        $request->validated();

        $fileFields = [
            'vcriAccreditedDistance' => 'uploadedFiles/vcriAccreditedDistance',
            'fmrBridgeAccreditedDistance' => 'uploadedFiles/fmrBridgeAccreditedDistance',
            'trafficCount' => 'uploadedFiles/trafficCount',
            'pwsCisAccreditedDistance' => 'uploadedFiles/pwsCisAccreditedDistance',
        ];

        $paths = [];

        foreach ($fileFields as $field => $basePath) {
            if (!file_exists($basePath)) {
                mkdir($basePath, 0755, true);
            }

            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move($basePath, $filename);
                $paths[$field] = $basePath . '/' . $filename;
            }
        }

        $projectType = $request->get('projectType', null);

        if ($projectType === 'VCRI') {

            $accessibility = $request->get('accessibility', null);
            $lotDescription = $request->get('lotDescription', null);
            $maximumFloodLevel = $request->get('maximumFloodLevel', null);
            $vcriAccreditedDistance = $paths['vcriAccreditedDistance'] ?? null;
            $subprojectId = $request->get('subprojectId', null);

            $status = $request->get('status');

            if ($status === 'OK') {
                if (
                    $accessibility !== null &&
                    $lotDescription !== null &&
                    $maximumFloodLevel !== null &&
                    $vcriAccreditedDistance !== null
                ) {
                    Subproject::where('id', $subprojectId)->update(['iBUILD' => 'OK']);
                    Subproject::where('id', $subprojectId)->increment('total');
                } else {
                    Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Pending']);
                }
            } elseif ($status === 'Pending') {
                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Pending']);
            } elseif ($status === 'Failed') {
                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Failed']);
            }

            IbuildVcriChecklist::create([
                'userId' => $user->id,
                'subprojectId' => $subprojectId,
                'reviewDate' => $request->get('vcriReviewDate'),
                'accessibility' => $accessibility,
                'lotDescription' => $lotDescription,
                'maximumFloodLevel' => $maximumFloodLevel,
                'vcriAccreditedDistance' => $vcriAccreditedDistance,
            ]);
        } elseif (in_array($projectType, ['FMR', 'Bridge', 'FMB'])) {
            $connectedAllWeather = $request->get('connectedAllWeather', null);
            $accessibility = $request->get('accessibility', null);
            $maximumFloodLevel = $request->get('maximumFloodLevel', null);
            $existingRow = $request->get('existingRow', null);
            $fmrBridgeAccreditedDistance = $paths['fmrBridgeAccreditedDistance'] ?? null;
            $trafficCount = $paths['trafficCount'] ?? null;
            $roadCategory = $request->get('roadCategory', null);

            $subprojectId = $request->get('subprojectId', null);

            if ($connectedAllWeather === 'No') {
                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Failed']);
            } elseif (
                $accessibility !== null &&
                $maximumFloodLevel !== null &&
                $existingRow !== null &&
                $fmrBridgeAccreditedDistance !== null &&
                $trafficCount !== null &&
                $roadCategory !== null
            ) {
                Subproject::where('id', $subprojectId)
                    ->update(['iBUILD' => 'OK']);
                Subproject::where('id', $subprojectId)->increment('total');
            } else {
                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Pending']);
            }

            IbuildFmrBridgeChecklist::create([
                'userId' => $user->id,
                'subprojectId' => $subprojectId,
                'reviewDate' => $request->get('bridgeFmrReviewDate', null),
                'connectedAllWeather' => $connectedAllWeather,
                'accessibility' => $accessibility,
                'maximumFloodLevel' => $maximumFloodLevel,
                'existingRow' => $existingRow,
                'fmrBridgeAccreditedDistance' => $fmrBridgeAccreditedDistance,
                'trafficCount' => $trafficCount,
                'roadCategory' => $roadCategory,
            ]);
        } elseif (in_array($projectType, ['CIS', 'PWS'])) {

            $waterSource = $request->get('waterSource', null);
            $waterSourceElevation = $request->get('waterSourceElevation', null);
            $serviceArea = $request->get('serviceArea', null);
            $pwsCisAccreditedDistance = $paths['pwsCisAccreditedDistance'] ?? null;

            $subprojectId = $request->get('subprojectId', null);

            $status = $request->get('status');

            if ($status === 'OK') {
                if (
                    $waterSource !== null &&
                    $waterSourceElevation !== null &&
                    $serviceArea !== null &&
                    $pwsCisAccreditedDistance !== null
                ) {
                    Subproject::where('id', $subprojectId)->update(['iBUILD' => 'OK']);
                    Subproject::where('id', $subprojectId)->increment('total');
                } else {
                    Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Pending']);
                }
            } elseif ($status === 'Pending') {
                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Pending']);
            } elseif ($status === 'Failed') {
                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Failed']);
            }

            IbuildPwsCisChecklist::create([
                'userId' => $user->id,
                'subprojectId' => $subprojectId,
                'reviewDate' => $request->get('pwsCisReviewDate'),
                'waterSource' => $waterSource,
                'waterSourceElevation' => $waterSourceElevation,
                'serviceArea' => $serviceArea,
                'pwsCisAccreditedDistance' => $pwsCisAccreditedDistance,
            ]);
        }

        return redirect()
            ->route('ibuild.view-subproject', ['id' => $request->get('subprojectId')])
            ->with('success', 'Subproject has been validated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('ibuild.subprojects');
    }

    public function showClearances()
    {
        $subprojects = Subproject::all();

        return view('ibuild.clearances.clearances', [
            'subprojects' => $subprojects,
        ]);
    }

    public function showRpab()
    {
        return view('ibuild.rpab');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subproject = Subproject::leftJoin('ibuild_vcri_checklists', 'subprojects.id', '=', 'ibuild_vcri_checklists.subprojectId')
            ->leftJoin('ibuild_fmr_bridge_checklists', 'subprojects.id', '=', 'ibuild_fmr_bridge_checklists.subprojectId')
            ->leftJoin('ibuild_pws_cis_checklists', 'subprojects.id', '=', 'ibuild_pws_cis_checklists.subprojectId')
            ->where('subprojects.id', $id)
            ->select(
                'subprojects.*',
                'ibuild_vcri_checklists.accessibility as vcriAccessibility',
                'ibuild_vcri_checklists.lotDescription',
                'ibuild_vcri_checklists.maximumFloodLevel',
                'ibuild_vcri_checklists.vcriAccreditedDistance',
                'ibuild_fmr_bridge_checklists.connectedAllWeather',
                'ibuild_fmr_bridge_checklists.accessibility as fmrAccessibility',
                'ibuild_fmr_bridge_checklists.maximumFloodLevel as fmrMaximumFloodLevel',
                'ibuild_fmr_bridge_checklists.existingRow',
                'ibuild_fmr_bridge_checklists.fmrBridgeAccreditedDistance',
                'ibuild_fmr_bridge_checklists.trafficCount',
                'ibuild_fmr_bridge_checklists.roadCategory',
                'ibuild_pws_cis_checklists.waterSource',
                'ibuild_pws_cis_checklists.waterSourceElevation',
                'ibuild_pws_cis_checklists.serviceArea',
                'ibuild_pws_cis_checklists.pwsCisAccreditedDistance',
            )
            ->firstOrFail();

        $subprojectType = $subproject->projectType;

        return view('ibuild.edit-subproject', [
            'subproject' => $subproject,
            'subprojectType' => $subprojectType
        ]);
    }

    public function validateSubproject($id)
    {
        $subproject = Subproject::findOrFail($id);

        $subprojectType = $subproject->projectType;

        return view('ibuild.ibuild-checklist', compact('subproject', 'subprojectType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreIbuildChecklistRequest $request)
    {
        $user = Auth::user();

        $fileFields = [
            'vcriAccreditedDistance' => 'uploadedFiles/vcriAccreditedDistance',
            'fmrBridgeAccreditedDistance' => 'uploadedFiles/fmrBridgeAccreditedDistance',
            'trafficCount' => 'uploadedFiles/trafficCount',
            'pwsCisAccreditedDistance' => 'uploadedFiles/pwsCisAccreditedDistance',
        ];

        $paths = [];

        foreach ($fileFields as $field => $basePath) {
            if (!file_exists($basePath)) {
                mkdir($basePath, 0755, true);
            }

            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move($basePath, $filename);
                $paths[$field] = $basePath . '/' . $filename;
            }
        }

        $subprojectId = $request->get('subprojectId');
        $projectType = $request->get('projectType', null);

        if ($projectType === 'VCRI') {
            $checklist = IbuildVcriChecklist::where('subprojectId', $subprojectId)->first();

            if ($checklist) {
                $checklist->update([
                    'userId' => $user->id,
                    'subprojectId' => $subprojectId,
                    'reviewDate' => $request->get('vcriReviewDate'),
                    'accessibility' => $request->get('accessibility'),
                    'lotDescription' => $request->get('lotDescription'),
                    'maximumFloodLevel' => $request->get('maximumFloodLevel'),
                    'vcriAccreditedDistance' => $paths['vcriAccreditedDistance'] ?? $checklist->vcriAccreditedDistance,
                ]);
            }

            $accessibility = $request->get('accessibility', null);
            $lotDescription = $request->get('lotDescription', null);
            $maximumFloodLevel = $request->get('maximumFloodLevel', null);
            $vcriAccreditedDistance = $paths['vcriAccreditedDistance'] ?? ($checklist ? $checklist->vcriAccreditedDistance : null);

            $subproject = Subproject::where('id', $subprojectId)->first();
            $status = $request->get('status');

            if (
                $accessibility === null ||
                $lotDescription === null ||
                $maximumFloodLevel === null ||
                $vcriAccreditedDistance === null
            ) {
                if ($subproject && $subproject->iBUILD === 'OK') {
                    // Decrement total if transitioning from OK to Pending
                    Subproject::where('id', $subprojectId)->decrement('total');
                }

                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Pending']);
            } elseif ($status === 'OK') {
                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'OK']);
                Subproject::where('id', $subprojectId)->increment('total');
            } elseif ($status === 'Failed') {
                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Failed']);
            } else {
                if ($subproject && $subproject->iBUILD === 'Pending') {
                    // Increment total if transitioning from Pending to OK
                    Subproject::where('id', $subprojectId)->increment('total');
                }

                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'OK']);
            }
        } elseif (in_array($projectType, ['FMR', 'Bridge', 'FMB'])) {
            $checklist = IbuildFmrBridgeChecklist::where('subprojectId', $subprojectId)->first();

            $connectedAllWeather = $request->get('connectedAllWeather', null);
            $accessibility = $request->get('accessibility', null);
            $maximumFloodLevel = $request->get('maximumFloodLevel', null);
            $existingRow = $request->get('existingRow', null);
            $fmrBridgeAccreditedDistance = $paths['fmrBridgeAccreditedDistance'] ?? ($checklist ? $checklist->fmrBridgeAccreditedDistance : null);
            $trafficCount = $paths['trafficCount'] ?? ($checklist ? $checklist->trafficCount : null);
            $roadCategory = $request->get('roadCategory', null);

            $subproject = Subproject::where('id', $subprojectId)->first();

            // Check for transition to Failed, OK, or Pending
            if ($connectedAllWeather === 'No') {
                // Transition to Failed
                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Failed']);
            } elseif (
                $accessibility !== null &&
                $maximumFloodLevel !== null &&
                $existingRow !== null &&
                $fmrBridgeAccreditedDistance !== null && // Ensure existing value is used
                $trafficCount !== null && // Ensure existing value is used
                $roadCategory !== null
            ) {
                // Transition to OK
                if ($subproject && $subproject->iBUILD === 'Pending') {
                    Subproject::where('id', $subprojectId)->increment('total'); // Increment if moving from Pending to OK
                }
                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'OK']);
            } else {
                // Transition to Pending
                if ($subproject && $subproject->iBUILD === 'OK') {
                    Subproject::where('id', $subprojectId)->decrement('total'); // Decrement if moving from OK to Pending
                }
                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Pending']);
            }

            // Update the checklist with the current or existing file values
            if ($checklist) {
                $checklist->update([
                    'userId' => $user->id,
                    'subprojectId' => $subprojectId,
                    'reviewDate' => $request->get('bridgeFmrReviewDate', null),
                    'connectedAllWeather' => $connectedAllWeather,
                    'accessibility' => $accessibility,
                    'maximumFloodLevel' => $maximumFloodLevel,
                    'existingRow' => $existingRow,
                    'fmrBridgeAccreditedDistance' => $fmrBridgeAccreditedDistance,
                    'trafficCount' => $trafficCount,
                    'roadCategory' => $roadCategory,
                ]);
            }
        } elseif (in_array($projectType, ['CIS', 'PWS'])) {
            $checklist = IbuildPwsCisChecklist::where('subprojectId', $subprojectId)->first();

            $waterSource = $request->get('waterSource', null);
            $waterSourceElevation = $request->get('waterSourceElevation', null);
            $serviceArea = $request->get('serviceArea', null);
            $pwsCisAccreditedDistance = $paths['pwsCisAccreditedDistance'] ?? ($checklist ? $checklist->pwsCisAccreditedDistance : null);

            // Get the current status of the subproject
            $currentStatus = Subproject::where('id', $subprojectId)->value('iBUILD');

            if (
                $waterSource === null ||
                $waterSourceElevation === null ||
                $serviceArea === null ||
                $pwsCisAccreditedDistance === null
            ) {
                // If any field is null, set status to Pending
                if ($currentStatus === 'OK') {
                    // If transitioning from OK to Pending, decrement the total count
                    Subproject::where('id', $subprojectId)->decrement('total');
                }

                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'Pending']);
            } else {
                // If all fields are filled, set status to OK
                if ($currentStatus === 'Pending') {
                    // If transitioning from Pending to OK, increment the total count
                    Subproject::where('id', $subprojectId)->increment('total');
                }

                Subproject::where('id', $subprojectId)->update(['iBUILD' => 'OK']);
            }

            // Update or create the checklist
            if ($checklist) {
                $checklist->update([
                    'userId' => $user->id,
                    'subprojectId' => $subprojectId,
                    'reviewDate' => $request->get('pwsCisReviewDate'),
                    'waterSource' => $waterSource,
                    'waterSourceElevation' => $waterSourceElevation,
                    'serviceArea' => $serviceArea,
                    'pwsCisAccreditedDistance' => $pwsCisAccreditedDistance,
                ]);
            }
        }

        return redirect()
            ->route('ibuild.view-subproject', ['id' => $subprojectId])
            ->with('success', 'Subproject has been validated successfully!');
    }

    public function updateSubprojectProfile(Request $request, $id)
    {
        // Validate the inputs
        $validated = $request->validate([
            'indicativeCost' => 'nullable',
            'letterOfInterest' => 'nullable|file|mimes:pdf,docx',
            'letterOfRequest' => 'nullable|file|mimes:pdf,docx',
            'letterOfEndorsement' => 'nullable|file|mimes:pdf,docx',
        ]);

        $fileFields = [
            'letterOfInterest' => 'uploadedFiles/letterOfInterest',
            'letterOfRequest' => 'uploadedFiles/letterOfRequest',
            'letterOfEndorsement' => 'uploadedFiles/letterOfEndorsement',
        ];

        $paths = [];

        foreach ($fileFields as $field => $basePath) {
            if (!file_exists($basePath)) {
                mkdir($basePath, 0755, true);
            }

            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move($basePath, $filename);
                $paths[$field] = $basePath . '/' . $filename;
            }
        }

        // Retrieve subproject or fail
        $subproject = Subproject::findOrFail($id);

        // Parse and sanitize the indicativeCost
        $indicativeCost = $request->input('indicativeCost', null);
        if ($indicativeCost !== null) {
            $indicativeCost = str_replace(',', '', $indicativeCost); // Remove commas
        }

        // Ensure existing values are retained if no new file is uploaded
        $updateData = [
            'indicativeCost' => $indicativeCost,
            'letterOfInterest' => $paths['letterOfInterest'] ?? $subproject->letterOfInterest,
            'letterOfRequest' => $paths['letterOfRequest'] ?? $subproject->letterOfRequest,
            'letterOfEndorsement' => $paths['letterOfEndorsement'] ?? $subproject->letterOfEndorsement,
        ];

        // Filter out null values
        $updateData = array_filter($updateData, function ($value) {
            return $value !== null;
        });

        // Update the subproject
        $subproject->update($updateData);

        // Redirect back with a success message
        return redirect()->back()->with('updated', 'Subproject profile has been updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
