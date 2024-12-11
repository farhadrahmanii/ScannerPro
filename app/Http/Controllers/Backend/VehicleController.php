<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function AllVehicles()
    {
        $vehicles = Vehicle::all();
        return view('admin.backend.vehicles.allVehicles', compact('vehicles'));
    } // End of Method

    public function AddVehicles()
    {
        return view('admin.backend.vehicles.AddVehicle');
    } // End of Method
    public function StoreVehicle(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'vehicle_make' => ['required', 'String'],
            'vehicle_model' => ['required', 'String'],
            'year' => ['required', 'String'],
            'capacity' => ['required', 'String'],
            'type' => ['required', 'String'],
            'plate_number' => ['required', 'String'],
            'vin' => ['required', 'String'],
            'colour' => ['required', 'String'],
            'extended_body_type' => ['required', 'String'],
        ]);
        Vehicle::create([
            'vehicle_make' => $request->vehicle_make,
            'vehicle_model' => $request->vehicle_model,
            'year' => $request->year,
            'capacity' => $request->capacity,
            'type' => $request->type,
            'plate_number' => $request->plate_number,
            'vin' => $request->vin,
            'colour' => $request->colour,
            'extended_body_type' => $request->extended_body_type,
        ]);
        $notification = array(
            'alert-type' => 'success',
            'message' => 'Vehicle Registerd Successfully! ',
        );
        return redirect()->route('all.vehicles')->with($notification);
    } // End of Method
}
