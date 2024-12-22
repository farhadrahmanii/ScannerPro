<?php

namespace App\Livewire;

use App\Models\Driver;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class CreateDriver extends Component
{
    public $user;
    public $name = "";
    public $father_name = "";
    public $national_id = "";
    public $passport_no = "";
    public $contact_information = "";
    public $nationality = "";
    public $transport_company = "";
    public $transport_company_tin = "";

    public function save()
    {
        $this->validate([
            'user_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'national_id' => ['required', 'string'],
            'passport_no' => ['string'],
            'contact_information' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'transport_company' => ['required', 'string'],
            'transport_company_tin' => ['required', 'string'],
        ]);
        // Check if the user exists
        $this->user = Auth::user()->id;
        Driver::create([
            'user_id' => $this->user_id,
            'name' => $this->name,
            'father_name' => $this->father_name,
            'national_id' => $this->national_id,
            'passport_no' => $this->passport_no,
            'contact_information' => $this->contact_information,
            'nationality' => $this->nationality,
            'transport_company' => $this->transport_company,
            'transport_company_tin' => $this->transport_company_tin,
        ]);
        // Notification here
        flash()->success('The Driver is registered Successfully');
        return redirect()->route('all.drivers');
        // return $this->redirect('/all/drivers', navigate: true);

    }
    public function placeholder()
    {
        return view('livewire.form-loading');
    }
    public function render()
    {
        return view('livewire.create-driver');
    }
}
