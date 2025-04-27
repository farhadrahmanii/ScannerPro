<?php

namespace App\Livewire\TransportCompany;

use App\Models\TransportCompany;
use Livewire\Component;

class TransportCompanyListlivewire extends Component
{
    public $transportCompanies;
    public function mount()
    {
        $this->transportCompanies = TransportCompany::all();
    }
    public function deleteTransportCompany($id)
    {
        $transportCompany = TransportCompany::find($id);
        $transportCompany->delete();
        $this->transportCompanies = TransportCompany::all();
        flash()->success('Transport Company deleted successfully.');
        // return $this->redirect('/transport/companies');
    }
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        return view('livewire.transport-company.transport-company-listlivewire');
    }
}
