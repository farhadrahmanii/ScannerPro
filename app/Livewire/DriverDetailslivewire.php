<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Vehicle;
use Livewire\Component;

class DriverDetailslivewire extends Component
{
    public $driverId;
    public $driver;
    public $vehicles;

    public function placeholder()
    {
        return view('livewire.placeholder-driver-details');
    }
    // Pass the driverId here
    public function mount($driverId)
    {
        // sleep(10);
        $this->driverId = $driverId;
        $this->driver = Driver::findOrFail($driverId);
        $this->vehicles = Vehicle::where('driver_id', $driverId)->get();
    }

    public function render()
    {
        return view('livewire.drivers.driver-detailslivewire');
    }
}
