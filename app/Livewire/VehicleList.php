<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class VehicleList extends Component
{
    public function placeholder()
    {
        return view('livewire.loading');
    }
    public function render()
    {
        $vehicles = Vehicle::all();
        return view('livewire.vehicle-list', compact('vehicles'));
    }
}
