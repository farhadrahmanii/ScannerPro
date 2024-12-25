<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AddRolelivewire extends Component
{

    public $roleId;
    public $name;
    public function mount()
    {

    }

    public function save()
    {
        $this->validate([
            "name" => "string|max:255|required",
        ]);
        $role = new Role();
        $role->name = $this->name;
        $role->guard_name = "web";
        $role->save();
        flash()->success("The Role Is created successfully");
        $this->reset();
        return redirect()->route("all.roles");
    }

    public function placeholder()
    {
        return view('livewire.form-loading');
    }
    public function render()
    {
        return view('livewire.RoleAndPermissions.add-rolelivewire');
    }
}
