<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
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

    public function AllRole()
    {
        $roles = Role::all();

        return view("admin.backend.pages.role.all_role", compact("roles"));
    } // Role and Permissions

    public function AddRole()
    {
        $roles = Role::all();
        return view("admin.backend.pages.role.add_role", compact("roles"));
    } // Role and Permissions
    public function EditRole($id)
    {
        $role = Role::findOrFail($id);
        return view("admin.backend.pages.role.edit_role", compact("role"));
    } // Role and Permissions

    // Add Role in Permissions Start Here Below 
    public function AddRolesPermission()
    {
        $role = Role::all();
        $permissions = Permission::all();
        $permission_group = User::getpermissionGroups();
        return view('admin.backend.pages.rolesetup.add_roles_permission', compact('permissions', 'role', 'permission_group'));
    } // End of method
    public function RolePermissionStore(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }


        $notification = array(
            'message' => ' Role Permission Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);


    } // End of method
    public function AllRolePermission(Request $request)
    {
        $roles = Role::all();
        return view('admin.backend.pages.rolesetup.all_roles_permission', compact('roles'));
    } // End of method
    public function AdminEditRolePermission($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_group = User::getpermissionGroups();
        return view('admin.backend.pages.rolesetup.edit_roles_permission', compact('permissions', 'role', 'permission_group'));
    } // End of method
    public function AdminUpdateRolePermission(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        // Fetch permissions by their IDs and extract names
        $permissions = $request->permission;
        if (!empty($permissions)) {
            $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
            $role->syncPermissions($permissionNames); // Sync with permission names
        }

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }    // End of method
}
