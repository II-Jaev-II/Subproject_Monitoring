<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DynamicAddressController;
use App\Http\Controllers\IBuildController;
use App\Http\Controllers\IReapController;
use App\Http\Controllers\ProfileController;
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
    Route::get('/ibuild/view-subproject/{id}', [IBuildController::class, 'view'])->name('ibuild.view-subproject');
    Route::get('/ibuild/create-subproject', [IBuildController::class, 'create'])->name('ibuild.create-subproject');
    Route::post('/ibuild/store-subproject', [IBuildController::class, 'store'])->name('ibuild.store-subproject');
});

Route::middleware(['auth', 'userType:IREAP'])->group(function () {
    Route::get('/ireap/dashboard', [IReapController::class, 'index'])->name('ireap.dashboard');
});

Route::get('/municipalities/{province}', [DynamicAddressController::class, 'getMunicipalities']);
Route::get('/barangays/{municipality}', [DynamicAddressController::class, 'getBarangays']);


require __DIR__ . '/auth.php';
