<?php
namespace App\Livewire;

use App\Models\Driver;
use Livewire\Component;

class EditDriver extends Component
{
    public $driverId;
    public $name = "";
    public $father_name = "";
    public $national_id = "";
    public $passport_no = "";
    public $contact_information = "";
    public $nationality = "";
    public $transport_company = "";
    public $transport_company_tin = "";

    // Mount method to load the driver data for editing
    public function mount($driverId)
    {
        $driver = Driver::find($driverId);
        if ($driver) {
            $this->driverId = $driver->id;
            $this->name = $driver->name;
            $this->father_name = $driver->father_name;
            $this->national_id = $driver->national_id;
            $this->passport_no = $driver->passport_no;
            $this->contact_information = $driver->contact_information;
            $this->nationality = $driver->nationality;
            $this->transport_company = $driver->transport_company;
            $this->transport_company_tin = $driver->transport_company_tin;
        }
    }

    // Update method to save changes to the driver
    public function update()
    {
        $driver = Driver::find($this->driverId);

        $this->validate([
            'name' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'national_id' => ['required', 'string'],
            'passport_no' => ['nullable', 'string'], // Passport number is optional
            'contact_information' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'transport_company' => ['required', 'string'],
            'transport_company_tin' => ['required', 'string'],
        ]);

        // Update existing driver details
        $driver->update([
            'name' => $this->name,
            'father_name' => $this->father_name,
            'national_id' => $this->national_id,
            'passport_no' => $this->passport_no,
            'contact_information' => $this->contact_information,
            'nationality' => $this->nationality,
            'transport_company' => $this->transport_company,
            'transport_company_tin' => $this->transport_company_tin,
        ]);

        flash()->success('The Driver details were updated successfully.');
        return $this->redirect('/all/drivers', navigate: true);
    }
    public function placeholder()
    {
        return view('livewire.form-loading');
    }
    public function render()
    {
        return view('livewire.edit-driver');
    }
}
