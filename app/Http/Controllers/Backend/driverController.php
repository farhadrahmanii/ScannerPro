<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Driver;
class driverController extends Controller
{
    public function AllDrivers()
    {
        $drivers = Driver::all();
        return view('admin.backend.drivers.allDrivers', compact('drivers'));
    } // End of Method



    public function AddDriver()
    {
        return view('admin.backend.drivers.createDriver');
    } // End of Method

    public function AddDriverStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'national_id' => ['required', 'string'],
            'passport_no' => ['string'],
            'contact_information' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'transport_company' => ['required', 'string'],
            'transport_company_tin' => ['required', 'string'],
        ]);
        Driver::create([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'national_id' => $request->national_id,
            'passport_no' => $request->passport_no,
            'contact_information' => $request->contact_information,
            'nationality' => $request->nationality,
            'transport_company' => $request->transport_company,
            'transport_company_tin' => $request->transport_company_tin,
        ]);
        $notification = array(
            'alert-type' => 'success',
            'message' => 'The Driver is registered Successfully'
        );
        return redirect()->route('all.drivers')->with($notification);
    } // End of Method
    public function DriverDetails($id)
    {
        $driver = Driver::findOrFail($id);
        $vehicles = Vehicle::where('driver_id', $id)->get();
        return view('admin.backend.drivers.driverDetails', compact('driver', 'vehicles'));
    } // Delete Driver
    public function DeleteDriver($id)
    {
        $driver = Driver::findOrFail($id);

        $driver->delete();
        flash()->success('The Driver is Deleted Successfully');
        return redirect()->back();
    } //Delete Driver
    public function EditDriver($id)
    {
        $driver = Driver::findOrFail($id);
        return view('admin.backend.drivers.editDriver', compact('driver'));
    } //Delete Driver
}
