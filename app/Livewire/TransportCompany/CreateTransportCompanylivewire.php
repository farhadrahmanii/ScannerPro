<?php

namespace App\Livewire\TransportCompany;

use App\Models\TransportCompany;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class CreateTransportCompanyLivewire extends Component
{
    public $transport_company_name;
    public $transport_company_tin;
    public function placeholder()
    {
        return view('livewire.form-loading');
    }
    public function save()
    {

        // Validate the input fields
        $validatedData = $this->validate([
            'transport_company_name' => 'required|string|max:255',
            'transport_company_tin' => 'required|string|unique:transport_companies,transport_company_tin|max:50',
        ]);

        // Save data to the database
        TransportCompany::create($validatedData);

        // Clear the input fields
        $this->reset(['transport_company_name', 'transport_company_tin']);

        // Show success message
        flash()->success('Transport Company registered successfully!');
        return $this->redirect(route('all.transportCompany'));
    }

    public function render()
    {
        return view('livewire.transport-company.create-transport-companylivewire');
    }
}
