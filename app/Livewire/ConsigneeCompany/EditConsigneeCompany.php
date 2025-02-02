<?php

namespace App\Livewire\ConsigneeCompany;

use App\Models\ConsigneeCompany;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class EditConsigneeCompany extends Component
{
    public $consigneeCompany;
    public $consignee_company_name;
    public $consignee_company_tin;

    protected function rules()
    {
        return [
            'consignee_company_name' => 'required|string|max:255',
            'consignee_company_tin' => 'required|string|max:255|unique:consignee_companies,consignee_company_tin,' . $this->consigneeCompany->id,
        ];
    }

    public function mount(ConsigneeCompany $consigneeCompany)
    {
        $this->consigneeCompany = $consigneeCompany;
        $this->consignee_company_name = $consigneeCompany->consignee_company_name;
        $this->consignee_company_tin = $consigneeCompany->consignee_company_tin;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $validatedData = $this->validate();

        $this->consigneeCompany->update($validatedData);

        $this->redirect('/consignee/companies');

        flash()->success('Consignee Company updated successfully.');
    }

    public function placeholder()
    {
        return view('livewire.form-loading');
    }

    public function render()
    {
        return view('livewire.consignee-company.edit-consignee-company');
    }
}
