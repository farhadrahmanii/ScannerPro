<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\driverController;
use App\Http\Controllers\Backend\ProvinceSiteController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\VehicleController;
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





    // All Driver Routes here
    Route::controller(driverController::class)->group(function () {
        Route::get('/all/drivers', 'AllDrivers')->name('all.drivers');
        Route::get('/add/driver', 'AddDriver')->name('add.driver');
        Route::post('/add/driver/store', 'AddDriverStore')->name('add.store.driver');
    });







    // All Vehicle Routes here
    Route::controller(VehicleController::class)->group(function () {
        Route::get('/all/vehicles', 'AllVehicles')->name('all.vehicles');
        Route::get('/add/vehicle', 'AddVehicles')->name('add.vehicle');
        Route::post('/store/vehicle', 'StoreVehicle')->name('add.vehicle.store');
    });





    // All Transaction Routes here
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/all/transactions', 'AllTransactions')->name('all.transactions');
        Route::get('/add/transactions', 'AddTransactions')->name('add.transactions');
    });

    // All Admin Users Routes Routes here
    Route::controller(AdminController::class)->group(function () {
        Route::get('/all/users', 'AllUsers')->name('users.list');
        Route::get('/add/admin/user', 'AddAdminUsers')->name('add.admin.user');
    });

    // All Admin Users Routes Routes here
    Route::controller(ProvinceSiteController::class)->group(function () {
        Route::get('/all/province/site', 'AllProvinceSites')->name('province.site');
    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
