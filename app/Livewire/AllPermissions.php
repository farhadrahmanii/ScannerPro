<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class AllPermissions extends Component
{
    public function render()
    {
        $permissions = Permission::all();

        return view('livewire.all-permissions', compact('permissions'));
    }
}
