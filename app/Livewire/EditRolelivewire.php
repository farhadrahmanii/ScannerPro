<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditRolelivewire extends Component
{
    public $roleId;
    public $name;

    public function mount($id)
    {
        $this->roleId = $id;
        $role = Role::findOrFail($id); // Fetch role data
        $this->name = $role->name;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = Role::findOrFail($this->roleId);
        $role->name = $this->name;
        $role->save();

        session()->flash('success', 'Role updated successfully!');
        // return redirect()->route('all.roles');
        return $this->redirect('/all/roles');
    }
    // Delete Role Method
    public function deleteRole($roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->delete();

        session()->flash('success', 'Role deleted successfully!');
        // return redirect()->route('all.roles');
        return $this->redirect('/all/roles');
    }
    public function placeholder()
    {
        return view('livewire.form-loading');
    }

    public function render()
    {
        return view('livewire.RoleAndPermissions.edit-rolelivewire');
    }
}
