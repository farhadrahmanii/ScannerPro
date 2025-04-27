<?php

namespace App\Livewire\drivers;

use App\Models\Driver;
use App\Models\TransportCompany;
use Livewire\Component;

class EditDriver extends Component
{
    public $driverId;
    public $name;
    public $father_name;
    public $national_id;
    public $passport_no;
    public $contact_information;
    public $nationality;
    public $transport_company_id; // Change to transport_company_id

    // Mount method to load the driver data for editing
    public function mount($driverId)
    {
        // Fetch the driver from the database using the driverId
        $driver = Driver::findOrFail($driverId);

        // Populate the fields with the existing data
        $this->driverId = $driver->id;
        $this->name = $driver->name;
        $this->father_name = $driver->father_name;
        $this->national_id = $driver->national_id;
        $this->passport_no = $driver->passport_no;
        $this->contact_information = $driver->contact_information;
        $this->nationality = $driver->nationality;
        $this->transport_company_id = $driver->transport_company_id; // Load transport company ID
    }

    // Update method to handle form submission and update the driver in the database
    public function update()
    {
        // Validate the form data
        $this->validate([
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'father_name' => ['required', 'string', 'max:255', 'min:5'],
            'national_id' => ['required', 'string', 'max:14', 'min:4'],
            'passport_no' => ['nullable', 'string'],
            'contact_information' => ['required', 'string', 'max:50', 'min:10'],
            'nationality' => ['required', 'string', 'max:50', 'min:3'],
            'transport_company_id' => ['required', 'exists:transport_companies,id'], // Ensure it exists in transport_companies table
        ]);

        // Find the driver and update the fields
        $driver = Driver::find($this->driverId);
        $driver->update([
            'name' => $this->name,
            'father_name' => $this->father_name,
            'national_id' => $this->national_id,
            'passport_no' => $this->passport_no,
            'contact_information' => $this->contact_information,
            'nationality' => $this->nationality,
            'transport_company_id' => $this->transport_company_id, // Update with transport_company_id
        ]);

        // Show success message
        flash()->success(__('driver.success'));

        // Redirect to the driver list page
        return $this->redirect('/all/drivers');
    }


    public function render()
    {
        // Fetch all transport companies to display in the dropdown
        $transportCompanies = TransportCompany::all();

        return view('livewire.drivers.edit-driver', compact('transportCompanies'));
    }
}
