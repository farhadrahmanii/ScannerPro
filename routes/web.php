<?php

use App\Http\Controllers\Backend\driverController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;

Route::get('/', function () {
    return view('login');
});


Route::middleware(admin::class)->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.adminDashboard');
    })->name('dashboard');

    Route::controller(driverController::class)->group(function(){
        Route::get('/all/drivers', 'AllDrivers')->name('all.drivers');
    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
