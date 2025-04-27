<?php

namespace App\Livewire\TransportCompany;

use App\Models\TransportCompany;
use Livewire\Component;

class EditTransportCompanylivewire extends Component
{
    public $transportCompanyId;
    public $transport_company_name;
    public $transport_company_tin;

    public function mount($transportCompany)
    {
        $this->transportCompanyId = $transportCompany;
        // Load the transport company data
        $transportCompanyData = TransportCompany::findOrFail($this->transportCompanyId);

        $this->transport_company_name = $transportCompanyData->transport_company_name;
        $this->transport_company_tin = $transportCompanyData->transport_company_tin;
    }

    public function update()
    {
        $this->validate([
            'transport_company_name' => 'required|string|max:255',
            'transport_company_tin' => 'required|string|max:255|unique:transport_companies,transport_company_tin,' . $this->transportCompanyId,
        ]);

        $transportCompany = TransportCompany::findOrFail($this->transportCompanyId);

        $transportCompany->update([
            'transport_company_name' => $this->transport_company_name,
            'transport_company_tin' => $this->transport_company_tin,
        ]);

        session()->flash('success', 'Transport Company updated successfully.');

        return $this->redirect('/transport/companies');
    }

    public function placeholder()
    {
        return view('livewire.form-loading');
    }

    public function render()
    {
        return view('livewire.transport-company.edit-transport-companylivewire');
    }
}
