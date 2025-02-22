<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DynamicAddressController;
use App\Http\Controllers\EconController;
use App\Http\Controllers\GenerateIplanRpabReportController;
use App\Http\Controllers\GGUController;
use App\Http\Controllers\GGURpabController;
use App\Http\Controllers\IBuildController;
use App\Http\Controllers\IPlanController;
use App\Http\Controllers\IplanRpabController;
use App\Http\Controllers\IReapController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SESController;
use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'userType:ADMIN'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/subprojects', [AdminController::class, 'show'])->name('admin.subprojects');
    Route::get('/admin/view-subproject/{id}', [AdminController::class, 'view'])->name('admin.view-subproject');
});

Route::middleware(['auth', 'userType:IBUILD'])->group(function () {
    Route::get('/ibuild/dashboard', [IBuildController::class, 'index'])->name('ibuild.dashboard');
    Route::get('/ibuild/subprojects', [IBuildController::class, 'show'])->name('ibuild.subprojects');
    Route::get('/ibuild/rpab', [IBuildController::class, 'showRpab'])->name('ibuild.rpab');
    Route::get('/ibuild/clearances', [IBuildController::class, 'showClearances'])->name('ibuild.clearances');
    Route::get('/ibuild/view-subproject/{id}', [IBuildController::class, 'view'])->name('ibuild.view-subproject');
    Route::get('/ibuild/edit-subproject/{id}', [IBuildController::class, 'edit'])->name('ibuild.edit-subproject');
    Route::post('/ibuild/update-subproject/{id}', [IBuildController::class, 'update'])->name('ibuild.update-subproject');
    Route::post('/ibuild/update-subproject-profile/{id}', [IBuildController::class, 'updateSubprojectProfile'])->name('ibuild.update-subproject-profile');
    Route::get('/ibuild/validate-subprojects/{id}', [IBuildController::class, 'validateSubproject'])->name('ibuild.validate-subprojects');
    Route::post('/ibuild/store-validated-subproject', [IBuildController::class, 'storeValidatedSubproject'])->name('ibuild.store-validated-subproject');
    Route::get('/ibuild/create-subproject', [IBuildController::class, 'create'])->name('ibuild.create-subproject');
    Route::post('/ibuild/store-subproject', [IBuildController::class, 'store'])->name('ibuild.store-subproject');

    Route::get('/generate-word/{id}', [WordController::class, 'generateReport'])->name('generate.word');
});

Route::middleware(['auth', 'userType:IPLAN'])->group(function () {
    Route::get('/iplan/dashboard', [IPlanController::class, 'index'])->name('iplan.dashboard');
    Route::get('/iplan/subprojects', [IPlanController::class, 'show'])->name('iplan.subprojects');
    Route::get('/iplan/rpab', [IPlanController::class, 'showRpab'])->name('iplan.rpab');
    Route::get('/iplan/clearances', [IPlanController::class, 'showClearances'])->name('iplan.clearances');
    Route::get('/iplan/view-subproject/{id}', [IPlanController::class, 'view'])->name('iplan.view-subproject');
    Route::get('/iplan/edit-subproject/{id}', [IPlanController::class, 'edit'])->name('iplan.edit-subproject');
    Route::post('/iplan/update-subproject/{id}', [IPlanController::class, 'update'])->name('iplan.update-subproject');
    Route::get('/iplan/validate-subprojects/{id}', [IPlanController::class, 'validateSubproject'])->name('iplan.validate-subprojects');
    Route::post('/iplan/store-subproject', [IPlanController::class, 'store'])->name('iplan.store-subproject');

    Route::get('/iplan/view-rpab-subproject/{id}', [IplanRpabController::class, 'view'])->name('iplan.view-rpab-subproject');
    Route::get('/iplan/rpab-validate-subproject/{id}', [IplanRpabController::class, 'validateSubproject'])->name('iplan.rpab-validate-subproject');
    Route::post('/iplan/rpab-store-validation/{id}', [IplanRpabController::class, 'store'])->name('iplan.rpab-store-validation');

    Route::get('/iplan-generate-report/{id}', [GenerateIplanRpabReportController::class, 'generateReport'])->name('iplan.generate-report');
});

Route::middleware(['auth', 'userType:ECON'])->group(function () {
    Route::get('/econ/dashboard', [EconController::class, 'index'])->name('econ.dashboard');
    Route::get('/econ/subprojects', [EconController::class, 'show'])->name('econ.subprojects');
    Route::get('/econ/clearances', [EconController::class, 'showClearances'])->name('econ.clearances');
    Route::get('/econ/view-subproject/{id}', [EconController::class, 'view'])->name('econ.view-subproject');
    Route::get('/econ/edit-subproject/{id}', [EconController::class, 'edit'])->name('econ.edit-subproject');
    Route::post('/econ/update-subproject/{id}', [EconController::class, 'update'])->name('econ.update-subproject');
    Route::get('/econ/validate-subprojects/{id}', [EconController::class, 'validateSubproject'])->name('econ.validate-subprojects');
    Route::post('/econ/store-subproject', [EconController::class, 'store'])->name('econ.store-subproject');
});

Route::middleware(['auth', 'userType:SES'])->group(function () {
    Route::get('/ses/dashboard', [SESController::class, 'index'])->name('ses.dashboard');
    Route::get('/ses/subprojects', [SESController::class, 'show'])->name('ses.subprojects');
    Route::get('/ses/clearances', [SESController::class, 'showClearances'])->name('ses.clearances');
    Route::get('/ses/view-subproject/{id}', [SESController::class, 'view'])->name('ses.view-subproject');
    Route::get('/ses/edit-subproject/{id}', [SESController::class, 'edit'])->name('ses.edit-subproject');
    Route::post('/ses/update-subproject/{id}', [SESController::class, 'update'])->name('ses.update-subproject');
    Route::get('/ses/validate-subprojects/{id}', [SESController::class, 'validateSubproject'])->name('ses.validate-subprojects');
    Route::post('/ses/store-subproject', [SESController::class, 'store'])->name('ses.store-subproject');
});

Route::middleware(['auth', 'userType:GGU'])->group(function () {
    Route::get('/ggu/dashboard', [GGUController::class, 'index'])->name('ggu.dashboard');
    Route::get('/ggu/subprojects', [GGUController::class, 'show'])->name('ggu.subprojects');
    Route::get('/ggu/rpab', [GGUController::class, 'showRpab'])->name('ggu.rpab');
    Route::get('/ggu/clearances', [GGUController::class, 'showClearances'])->name('ggu.clearances');
    Route::get('/ggu/view-subproject/{id}', [GGUController::class, 'view'])->name('ggu.view-subproject');
    Route::get('/ggu/edit-subproject/{id}', [GGUController::class, 'edit'])->name('ggu.edit-subproject');
    Route::post('/ggu/update-subproject/{id}', [GGUController::class, 'update'])->name('ggu.update-subproject');
    Route::get('/ggu/validate-subprojects/{id}', [GGUController::class, 'validateSubproject'])->name('ggu.validate-subprojects');
    Route::post('/ggu/store-subproject', [GGUController::class, 'store'])->name('ggu.store-subproject');

    Route::get('/ggu/view-rpab-subproject', [GGURpabController::class, 'view'])->name('ggu.view-rpab-subproject');
    Route::get('/ggu/rpab-validate-subproject/{id}', [GGURpabController::class, 'validateSubproject'])->name('ggu.rpab-validate-subproject');
});

Route::middleware(['auth', 'userType:IREAP'])->group(function () {
    Route::get('/ireap/dashboard', [IReapController::class, 'index'])->name('ireap.dashboard');
    Route::get('/ireap/subprojects', [IReapController::class, 'show'])->name('ireap.subprojects');
    Route::get('/ireap/clearances', [IReapController::class, 'showClearances'])->name('ireap.clearances');
    Route::get('/ireap/view-subproject/{id}', [IReapController::class, 'view'])->name('ireap.view-subproject');
    Route::get('/ireap/edit-subproject/{id}', [IReapController::class, 'edit'])->name('ireap.edit-subproject');
    Route::post('/ireap/update-subproject/{id}', [IReapController::class, 'update'])->name('ireap.update-subproject');
    Route::get('/ireap/validate-subprojects/{id}', [IReapController::class, 'validateSubproject'])->name('ireap.validate-subprojects');
    Route::post('/ireap/store-subproject', [IReapController::class, 'store'])->name('ireap.store-subproject');
});

Route::get('/municipalities/{province}', [DynamicAddressController::class, 'getMunicipalities']);
Route::get('/barangays/{municipality}', [DynamicAddressController::class, 'getBarangays']);
Route::get('/get-subproject-data', [AdminController::class, 'getSubprojectData']);

require __DIR__ . '/auth.php';
