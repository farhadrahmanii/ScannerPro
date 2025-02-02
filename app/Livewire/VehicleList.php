<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class VehicleList extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('livewire.loading');
    }

    public function render()
    { 
        $vehicles = Vehicle::with('driver')->paginate(10); // Use pagination and eager load driver
        return view('livewire.vehicles.vehicle-list', compact('vehicles'));
    }
}
