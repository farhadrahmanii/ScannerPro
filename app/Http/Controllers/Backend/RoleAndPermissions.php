<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleAndPermissions extends Controller
{
    public function AllPermissions()
    {
        return view("admin.backend.pages.permission.all_permission");
    } // Role and Permissions

    public function AddPermission()
    {
        return view("admin.backend.pages.permission.add_permission");
    } // Role and Permissions
}
