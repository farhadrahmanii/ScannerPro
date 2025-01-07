<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\TransportCompany;
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
    public $transport_company_id = null;
    public $transport_company_tin = "";
    public $transport_company = "";
    public $searchResults = [];
    public $showAddCompanyForm = false;

    public function updatedTransportCompanyTin()
    {
        if (strlen($this->transport_company_tin) > 2) {
            $this->searchResults = TransportCompany::where('transport_company_tin', 'like', $this->transport_company_tin)
                ->get()
                ->toArray();

            $this->showAddCompanyForm = count($this->searchResults) === 0;
        } else {
            $this->searchResults = [];
            $this->showAddCompanyForm = false;
        }
    }

    public function selectTransportCompany($companyId)
    {
        $company = TransportCompany::find($companyId);
        if ($company) {
            $this->transport_company_id = $company->id;
            $this->transport_company = $company->transport_company_name;
            $this->transport_company_tin = $company->transport_company_tin;
            $this->searchResults = [];
            $this->showAddCompanyForm = false;
        }
    }

    public function addTransportCompany()
    {
        $this->validate([
            'transport_company' => ['required', 'string'],
            'transport_company_tin' => ['required', 'string', 'unique:transport_companies,transport_company_tin'],
        ]);

        $company = TransportCompany::create([
            'transport_company_name' => $this->transport_company,
            'transport_company_tin' => $this->transport_company_tin,
        ]);

        $this->transport_company_id = $company->id;
        $this->searchResults = [];
        $this->showAddCompanyForm = false;
    }

    public function save()
    {
        $this->validate([
            'name' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'national_id' => ['required', 'string'],
            'passport_no' => ['string'],
            'contact_information' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'transport_company_id' => ['required', 'integer'],
        ]);

        $user = Auth::id();

        Driver::create([
            'user_id' => $user,
            'name' => $this->name,
            'father_name' => $this->father_name,
            'national_id' => $this->national_id,
            'passport_no' => $this->passport_no,
            'contact_information' => $this->contact_information,
            'nationality' => $this->nationality,
            'transport_company_id' => $this->transport_company_id,
        ]);

        flash()->success('The Driver is registered Successfully');
        return redirect()->route('all.drivers');
    }

    public function render()
    {
        return view('livewire.drivers.create-driver');
    }
}
