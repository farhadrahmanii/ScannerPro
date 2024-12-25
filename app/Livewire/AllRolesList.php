<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AllRolesList extends Component
{
    public $roleId;

    public function deleteRole($roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->delete();

        session()->flash('success', 'Role deleted successfully!');
        // return redirect()->route('all.roles');
        return $this->redirect('/all/roles', navigate: true);
    }
    public function placeholder()
    {
        return view('livewire.loading');
    }
    public function render()
    {
        $roles = Role::all();

        return view('livewire.RoleAndPermissions.all-roles-list', compact("roles"));
    }
}
