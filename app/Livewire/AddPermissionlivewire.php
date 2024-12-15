<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class AddPermissionlivewire extends Component
{
    public $name;
    public $group_name;
    public function save()
    {
        $this->validate([
            "name" => ["required", "string"],
            "group_name" => ["required", "string"]

        ]);
        $permission = new Permission();
        $permission->name = $this->name;
        $permission->group_name = $this->group_name;
        $permission->save();
        flash()->success("Permission created successuflly");
        $this->reset();
        return redirect()->route("all.permissions");
    }
    public function placeholder()
    {
        return view('livewire.form-loading');
    }
    public function render()
    {
        return view('livewire.add-permissionlivewire');
    }
}
