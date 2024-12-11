<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class CreateVehicle extends Component
{
    public $vehicle_make = "";
    public $vehicle_model = "";
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
            'vehicle_model' => $this->vehicle_model,
            'year' => $this->year,
            'capacity' => $this->capacity,
            'type' => $this->type,
            'plate_number' => $this->plate_number,
            'vin' => $this->vin,
            'colour' => $this->colour,
            'extended_body_type' => $this->extended_body_type,
        ]);
        $notification = array(
            'alert-type' => 'success',
            'message' => 'Vehicle Registerd Successfully! ',
        );
        return redirect()->route('all.vehicles')->with($notification);
    }
    public function render()
    {
        return view('livewire.create-vehicle');
    }
}
