<?php

namespace App\Livewire\ConsigneeCompany;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\ConsigneeCompany;

class CreateConsigneeCompany extends Component
{
    public $consignee_company_name;
    public $consignee_company_tin;

    protected $rules = [
        'consignee_company_name' => 'required|string|max:255',
        'consignee_company_tin' => 'required|string|max:255|unique:consignee_companies,consignee_company_tin',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();

        ConsigneeCompany::create($validatedData);

        $this->reset(['consignee_company_name', 'consignee_company_tin']);
        
        $this->redirect('/consignee/companies');

        flash()->success('Consignee Company created successfully.');
    }

    public function placeholder()
    {
        return view('livewire.form-loading');
    }

    public function render()
    {
        return view('livewire.consignee-company.create-consignee-company');
    }
}
