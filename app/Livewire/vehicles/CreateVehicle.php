<?php

namespace App\Livewire\vehicles;

use App\Models\Driver;
use App\Models\Vehicle;
use Livewire\Component;

class CreateVehicle extends Component
{
    public $user;
    public $vehicle_make = "";
    public $vehicle_model = "";
    public $driverId;
    public $driverName;
    public $year = "";
    public $capacity = "";
    public $type = "";
    public $plate_number = "";
    public $vin = "";
    public $colour = "";
    public $extended_body_type = "";
    public $vehicleMakes = [];
    public $vehicleModels = [];

    protected $rules = [
        'vehicle_make' => 'required|string|max:255',
        'driverId' => 'numeric|required',
        'vehicle_model' => 'required|string|max:255',
        'year' => 'required|string|max:255',
        'capacity' => 'required|numeric',
        'type' => 'required|in:Truck,Bus,Trailer,Tanker,Pickup,Van,Container',
        'plate_number' => 'required|string|max:255',
        'vin' => 'required|string|max:255',
        'colour' => 'required|in:White,Black,Silver,Blue,Red,Green,Yellow,Gray,Orange,Brown,Purple',
        'extended_body_type' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->vehicleMakes = Vehicle::distinct()->pluck('vehicle_make')->toArray();
    }

    public function updatedVehicleMake($value)
    {
        $this->vehicleModels = Vehicle::where('vehicle_make', $value)->pluck('vehicle_model')->toArray();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->user = auth()->user()->id; // current logged-in user ID 
        $validatedData = $this->validate();

        Vehicle::create([
            'site_id' => auth()->user()->site_id,
            'user_id' => $this->user,
            'vehicle_make' => $validatedData['vehicle_make'],
            'driver_id' => $validatedData['driverId'],
            'vehicle_model' => $validatedData['vehicle_model'],
            'year' => $validatedData['year'],
            'capacity' => $validatedData['capacity'],
            'type' => $validatedData['type'],
            'plate_number' => $validatedData['plate_number'],
            'vin' => $validatedData['vin'],
            'colour' => $validatedData['colour'],
            'extended_body_type' => $validatedData['extended_body_type'],
        ]);
        flash()->success('Vehicle Registered Successfully!');
        return $this->redirect('/all/drivers');
    }

    public function render()
    {
        $drivers = Driver::all();
        return view('livewire.vehicles.create-vehicle', compact('drivers'));
    }
}
