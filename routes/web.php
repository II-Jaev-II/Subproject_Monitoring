<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DynamicAddressController;
use App\Http\Controllers\EconController;
use App\Http\Controllers\GGUController;
use App\Http\Controllers\IBuildController;
use App\Http\Controllers\IPlanController;
use App\Http\Controllers\IReapController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SESController;
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
});

Route::middleware(['auth', 'userType:IBUILD'])->group(function () {
    Route::get('/ibuild/dashboard', [IBuildController::class, 'index'])->name('ibuild.dashboard');
    Route::get('/ibuild/subprojects', [IBuildController::class, 'show'])->name('ibuild.subprojects');
    Route::get('/ibuild/clearances', [IBuildController::class, 'showClearances'])->name('ibuild.clearances');
    Route::get('/ibuild/view-subproject/{id}', [IBuildController::class, 'view'])->name('ibuild.view-subproject');
    Route::get('/ibuild/create-subproject', [IBuildController::class, 'create'])->name('ibuild.create-subproject');
    Route::post('/ibuild/store-subproject', [IBuildController::class, 'store'])->name('ibuild.store-subproject');
});

Route::middleware(['auth', 'userType:IPLAN'])->group(function () {
    Route::get('/iplan/dashboard', [IPlanController::class, 'index'])->name('iplan.dashboard');
    Route::get('/iplan/subprojects', [IPlanController::class, 'show'])->name('iplan.subprojects');
    Route::get('/iplan/clearances', [IPlanController::class, 'showClearances'])->name('iplan.clearances');
    Route::get('/iplan/view-subproject/{id}', [IPlanController::class, 'view'])->name('iplan.view-subproject');
    Route::get('/iplan/edit-subproject/{id}', [IPlanController::class, 'edit'])->name('iplan.edit-subproject');
    Route::post('/iplan/update-subproject/{id}', [IPlanController::class, 'update'])->name('iplan.update-subproject');
    Route::get('/iplan/validate-subprojects/{id}', [IPlanController::class, 'validateSubproject'])->name('iplan.validate-subprojects');
    Route::post('/iplan/store-subproject', [IPlanController::class, 'store'])->name('iplan.store-subproject');
});

Route::middleware(['auth', 'userType:ECON'])->group(function () {
    Route::get('/econ/dashboard', [EconController::class, 'index'])->name('econ.dashboard');
    Route::get('/econ/subprojects', [EconController::class, 'show'])->name('econ.subprojects');
    Route::get('/econ/clearances', [EconController::class, 'showClearances'])->name('econ.clearances');
    Route::get('/econ/view-subproject/{id}', [EconController::class, 'view'])->name('econ.view-subproject');
});

Route::middleware(['auth', 'userType:SES'])->group(function () {
    Route::get('/ses/dashboard', [SESController::class, 'index'])->name('ses.dashboard');
    Route::get('/ses/subprojects', [SESController::class, 'show'])->name('ses.subprojects');
    Route::get('/ses/clearances', [SESController::class, 'showClearances'])->name('ses.clearances');
    Route::get('/ses/view-subproject/{id}', [SESController::class, 'view'])->name('ses.view-subproject');
});

Route::middleware(['auth', 'userType:GGU'])->group(function () {
    Route::get('/ggu/dashboard', [GGUController::class, 'index'])->name('ggu.dashboard');
    Route::get('/ggu/subprojects', [GGUController::class, 'show'])->name('ggu.subprojects');
    Route::get('/ggu/clearances', [GGUController::class, 'showClearances'])->name('ggu.clearances');
    Route::get('/ggu/view-subproject/{id}', [GGUController::class, 'view'])->name('ggu.view-subproject');
});

Route::middleware(['auth', 'userType:IREAP'])->group(function () {
    Route::get('/ireap/dashboard', [IReapController::class, 'index'])->name('ireap.dashboard');
});

Route::get('/municipalities/{province}', [DynamicAddressController::class, 'getMunicipalities']);
Route::get('/barangays/{municipality}', [DynamicAddressController::class, 'getBarangays']);
Route::get('/get-subproject-data', [AdminController::class, 'getSubprojectData']);


require __DIR__ . '/auth.php';
