<?php

namespace App\Livewire\ConsigneeCompany;

use Livewire\Component;

class Listlivewire extends Component
{
    public $consigneeCompanies; 

    public function mount()
    {
        $this->consigneeCompanies = \App\Models\ConsigneeCompany::all();
    }
    public function placeholder()
    {
        return view('livewire.loading');
    }
    public function render()
    {
        return view('livewire.consignee-company.listlivewire');
    }
}
