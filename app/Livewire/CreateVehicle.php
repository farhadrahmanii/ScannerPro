<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Vehicle;
use Livewire\Component;

class CreateVehicle extends Component
{
    public $vehicle_make = "";
    public $driverId;
    public $vehicle_model = "";
    public $driverName;
    public $year = "";
    public $capacity = "";
    public $type = "";
    public $plate_number = "";
    public $vin = "";
    public $colour = "";
    public $extended_body_type = "";

    public function save()
    {
        // dd($request->all());
        $this->validate([
            'vehicle_make' => 'required|string|max:255',
            'driverId' => 'numeric|required|max:255',
            'vehicle_model' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255',
            'vin' => 'required|string|max:255',
            'colour' => 'required|string|max:255',
            'extended_body_type' => 'required|string|max:255',
        ]);
        Vehicle::create([
            'vehicle_make' => $this->vehicle_make,
            'driver_id' => $this->driverId,
            'vehicle_model' => $this->vehicle_model,
            'year' => $this->year,
            'capacity' => $this->capacity,
            'type' => $this->type,
            'plate_number' => $this->plate_number,
            'vin' => $this->vin,
            'colour' => $this->colour,
            'extended_body_type' => $this->extended_body_type,
        ]);
        flash()->success('Vehicle Registerd Successfully!');
        return redirect()->route('all.drivers');
    }

    public function placeholder()
    {
        return view('livewire.form-loading');
    }
    public function render()
    {
        $drivers = Driver::all();
        return view('livewire.create-vehicle', compact('drivers'));
    }
}
