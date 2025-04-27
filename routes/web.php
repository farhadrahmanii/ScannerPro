<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CashController;
use App\Http\Controllers\Backend\CasherController;
use App\Http\Controllers\Backend\driverController;
use App\Http\Controllers\Backend\ProvinceSiteController;
use App\Http\Controllers\Backend\RoleAndPermissions;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\VehicleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransportCompanyController;
use App\Http\Middleware\Admin;
use App\Models\ConsigneeCompany;

use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::middleware([LanguageMiddleware::class])->group(function () {

    Route::get('/login', function () {
        return view('login');
    });

    Route::middleware(Admin::class)->group(function () {
        Route::get('/', function () {
            return view('admin.adminDashboard');
        })->name('dashboard');

        // All Transport Company Routes here
        Route::controller(TransportCompanyController::class)->group(function () {
            Route::get('/transport/companies', 'AllTransportCompany')->name('all.transportCompany');
            Route::get('/add/transport/company', 'AddTransportCompany')->name('add.transportCompany');
            Route::get('/edit/transport/company/{id}', 'EditTransportCompany')->name('edit.transportCompany');
        });

        // All Consignee Company Routes here
        Route::controller(ConsigneeCompany::class)->group(function () {
            Route::get('/consignee/companies', 'AllConsigneeCompany')->name('all.consigneeCompany');
            Route::get('/add/consignee/company', 'AddConsigneeCompany')->name('add.consigneeCompany');
            Route::get('/edit/consignee/company/{id}', 'EditConsigneeCompany')->name('edit.consigneeCompany');
            Route::get('/delete/consignee/company/{id}', 'DeleteConsigneeCompany')->name('delete.consigneeCompany');
        });

        // All Driver Routes here
        Route::controller(driverController::class)->group(function () {
            Route::get('/all/drivers', 'AllDrivers')->name('all.drivers');
            Route::get('/add/driver', 'AddDriver')->name('add.driver');
            Route::post('/add/driver/store', 'AddDriverStore')->name('add.store.driver');
            Route::get('driver/details/{id}', 'DriverDetails')->name('driver.details');
            Route::get('edit/driver/{id}', 'EditDriver')->name('edit.driver');
            Route::get('delete/driver/{id}', 'DeleteDriver')->name('delete.driver');
        });

        // All Vehicle Routes here
        Route::controller(VehicleController::class)->group(function () {
            Route::get('/all/vehicles', 'AllVehicles')->name('all.vehicles');
            Route::get('/add/vehicle/to/driver/{id}', 'AddVehiclesToDriver')->name('add.vehicle');
            Route::post('/store/vehicle', 'StoreVehicle')->name('add.vehicle.store');
            Route::get('/add/transaction/to/vehicle/{id}', 'AddTrasactionToVehicle')->name('add.transaction.to.vehicle');
            Route::get('/vehicle/details/{id}', 'VehicleDetails')->name('vehicle.details');
            Route::get('/delete/vehicle/{id}', 'DeleteVehicle')->name('delete.vehicle');
            Route::get('/vehicle/card/{id}', 'printIdCard')->name('backend.driver.print-id-card');
        });

        // All Transaction Routes here
        Route::controller(TransactionController::class)->group(function () {
            Route::get('/all/transactions', 'AllTransactions')->name('all.transactions');
            Route::get('/add/transactions', 'AddTransactions')->name('add.transactions');
            Route::get('/transaction/detail/{id}', 'TransactionsDetails')->name('transaction.details');
            Route::get('/edit/transaction/{id}', 'EditTransaction')->name('edit.transaction');
            Route::get('/delete/transaction/{id}', 'DeleteTransaction')->name('delete.transactions');
            Route::get('/backend/cash/print-slip/{id}', 'printSlip')->name('backend.cash.print-slip');
        });

        // All Admin Users Routes here
        Route::controller(AdminController::class)->group(function () {
            Route::get('/all/users', 'AllUsers')->name('users.list');
            Route::get('/add/admin/user', 'AddAdminUsers')->name('add.admin.user');
            Route::get('/edit/admin/user/{id}', 'EditAdminUser')->name('edit.admin.user');
            Route::post('/update/admin/user', 'UpdateAdminUser')->name('update.admin.user');
            Route::get('/get-chart-data', 'getChartData');
            Route::get('/user-profile', 'userProfile')->name('user.profile');

        });

        // All Provinces Users Routes here
        Route::controller(ProvinceSiteController::class)->group(function () {
            Route::get('/all/province', 'AllProvinceSites')->name('province.site');
            Route::get('/add/province', 'AddProvince')->name('add.province');
            Route::get('/all/site', 'allSites')->name('site');
            Route::get('/add/site', 'AddSite')->name('add.site');
            Route::get('/edit/site/{id}', 'EditSite')->name('edit.site');
        });

        // All Admin Role and Permissions for Users Routes here
        Route::controller(RoleAndPermissions::class)->group(function () {
            Route::get('/all/permission', 'AllPermissions')->name('all.permissions');
            Route::get('/add/permission', 'AddPermission')->name('add.permission');
            Route::get('/all/roles', 'AllRole')->name('all.roles');
            Route::get('/add/role', 'AddRole')->name('add.role');
            Route::get('/edit/role/{id}', 'EditRole')->name('edit.role');
        });

        // Add Roles 
        Route::controller(RoleAndPermissions::class)->group(function () {
            Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
            Route::post('/roles/permission/store', 'RolePermissionStore')->name('role.permission.store');
            Route::get('/all/roles/permissions', 'AllRolePermission')->name('all.roles.permission');
            Route::get('/edit/role/permission/{id}', 'AdminEditRolePermission')->name('edit.rolepermission');
            Route::post('/update/role/permission/{id}', 'AdminUpdateRolePermission')->name('update.rolepermission');
        });
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
    });

    Route::get('/language/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'fa', 'ps'])) {
            Session::put('locale', $locale);
        }
        return redirect()->back();
    })->name('language.switch');
});

require __DIR__ . '/auth.php';
