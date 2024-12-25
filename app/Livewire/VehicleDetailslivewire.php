<?php

namespace App\Livewire;

use App\Models\Transaction;
use App\Models\Vehicle;
use Livewire\Component;

class VehicleDetailslivewire extends Component
{
    public $vehicle_id;
    public $vehicle;
    public $transactions;

    public function placeholder()
    {
        return view('livewire.placeholder-driver-details');
    }
    public function mount($vehicle_id)
    {
        // sleep(10);
        $this->vehicle_id = $vehicle_id;
        $this->vehicle = Vehicle::where('id', $vehicle_id)->first();
        $this->transactions = Transaction::where('vehicle_id', $vehicle_id)->get();
        // dd($this->vehicle);
    }
    public function render()
    {
        return view('livewire.vehicles.vehicle-detailslivewire');
    }
}
