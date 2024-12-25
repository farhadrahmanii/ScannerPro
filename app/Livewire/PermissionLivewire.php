<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionLivewire extends Component
{
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        $permissions = Permission::all();

        return view('livewire.RoleAndPermissions.permission-livewire', compact("permissions"));
    }
}
