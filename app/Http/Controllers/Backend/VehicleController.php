<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function AllVehicles()
    {
        $vehicles = Vehicle::all();
        return view('admin.backend.vehicles.allVehicles', compact('vehicles'));
    } // End of Method

    public function AddVehiclesToDriver($id)
    {
        $driver = Driver::findOrFail($id);
        return view('admin.backend.vehicles.AddVehicle', compact('driver'));
    } // End of Method
    public function StoreVehicle(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'vehicle_make' => ['required', 'String'],
        //     'vehicle_model' => ['required', 'String'],
        //     'year' => ['required', 'String'],
        //     'capacity' => ['required', 'String'],
        //     'type' => ['required', 'String'],
        //     'plate_number' => ['required', 'String'],
        //     'vin' => ['required', 'String'],
        //     'colour' => ['required', 'String'],
        //     'extended_body_type' => ['required', 'String'],
        // ]);
        // Vehicle::create([
        //     'vehicle_make' => $request->vehicle_make,
        //     'vehicle_model' => $request->vehicle_model,
        //     'year' => $request->year,
        //     'capacity' => $request->capacity,
        //     'type' => $request->type,
        //     'plate_number' => $request->plate_number,
        //     'vin' => $request->vin,
        //     'colour' => $request->colour,
        //     'extended_body_type' => $request->extended_body_type,
        // ]);
        // $notification = array(
        //     'alert-type' => 'success',
        //     'message' => 'Vehicle Registerd Successfully! ',
        // );
        // return redirect()->route('all.vehicles')->with($notification);
    } // End of Method
    public function AddTrasactionToVehicle($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.backend.transaction.addTransaction', compact('vehicle'));
    } // end of Methods

    public function VehicleDetails($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.backend.vehicles.VehicleDetails', compact('vehicle'));
    } // end of Methods

    public function DeleteVehicle($id)
    {
        $vehicle = Vehicle::where('id', $id)->first();
        $vehicle->delete();
        flash()->success('Vehicle is deleted successfully!');
        return redirect()->route('all.vehicles');
    } // end of Methods

    public function printIdCard($id)
    {
        $vehicle = Vehicle::with('driver')->findOrFail($id);

        if ($vehicle->driver) {
            return view('admin.backend.idCard.print-id-card', compact('vehicle'));
        }

        return redirect()->back()->with('error', 'Vehicle does not have any Driver.');
    } // End Of method
}
