<?php

use App\Http\Controllers\AdminController;
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

Route::middleware(['auth', 'userType:ADMIN'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'userType:IBUILD'])->group(function(){
    Route::get('/ibuild/dashboard', [IBuildController::class, 'index'])->name('ibuild.dashboard');
});

Route::middleware(['auth', 'userType:IREAP'])->group(function(){
    Route::get('/ireap/dashboard', [IReapController::class, 'index'])->name('ireap.dashboard');
});

require __DIR__.'/auth.php';
