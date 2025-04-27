<?php
namespace App\Livewire;

use App\Models\Driver;
use App\Models\TransportCompany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

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

    protected $validationAttributes = [
        'name' => 'name',
        'father_name' => 'father name',
        'national_id' => 'national ID',
        'passport_no' => 'passport number',
        'contact_information' => 'contact information',
        'nationality' => 'nationality',
        'transport_company_id' => 'transport company',
    ];
    public function messages()
    {

        return [
            'name.required' => __('createDriverMessages.name_required'),
            'father_name.required' => __('createDriverMessages.father_name_required'),
            'national_id.required' => __('createDriverMessages.national_id_required'),
            'national_id.digits' => __('createDriverMessages.national_id_max'),
            'passport_no.string' => __('createDriverMessages.passport_no_string'),
            'contact_information.required' => __('createDriverMessages.contact_information_required'),
            'nationality.required' => __('createDriverMessages.nationality_required'),
            'transport_company_id.required' => __('createDriverMessages_transport_company_id.required'),
        ];
    }

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'father_name' => ['required', 'string', 'max:255'],
        'national_id' => ['required', 'digits:13', 'unique:drivers,national_id'], // Fixed the invalid max rule
        'passport_no' => ['nullable', 'string', 'max:20', 'min:8'],
        'contact_information' => ['required', 'string', 'max:255'],
        'nationality' => ['required', 'string', 'max:100'],
        'transport_company_id' => ['required', 'integer', 'exists:transport_companies,id'],
    ];

    public function updatedTransportCompanyTin()
    {
        if (strlen($this->transport_company_tin) > 2) {
            $this->searchResults = TransportCompany::where('transport_company_tin', 'like', "%{$this->transport_company_tin}%")
                ->limit(5)
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
        $company = TransportCompany::findOrFail($companyId);
        $this->transport_company_id = $company->id;
        $this->transport_company = $company->transport_company_name;
        $this->transport_company_tin = $company->transport_company_tin;
        $this->searchResults = [];
        $this->showAddCompanyForm = false;
    }

    public function addTransportCompany()
    {
        $validated = $this->validate([
            'transport_company' => ['required', 'string', 'max:255'],
            'transport_company_tin' => ['required', 'string', 'max:50', 'unique:transport_companies,transport_company_tin'],
        ]);

        $company = TransportCompany::create([
            'transport_company_name' => $validated['transport_company'],
            'transport_company_tin' => $validated['transport_company_tin'],
        ]);

        $this->transport_company_id = $company->id;
        $this->searchResults = [];
        $this->showAddCompanyForm = false;
    }

    public function save()
    {
        $validated = $this->validate();

        $user = Auth::id();

        Driver::create([
            'site_id' => auth()->user()->site_id,
            'user_id' => $user,
            'name' => $validated['name'],
            'father_name' => $validated['father_name'],
            'national_id' => $validated['national_id'],
            'passport_no' => $validated['passport_no'],
            'contact_information' => $validated['contact_information'],
            'nationality' => $validated['nationality'],
            'transport_company_id' => $validated['transport_company_id'],
        ]);

        session()->flash('success', __('createDriverMessages.success_message'));
        return redirect()->route('all.drivers');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // public function placeholder()
    // {
    //     return view('livewire.form-loading');
    // }

    public function render()
    {
        return view('livewire.drivers.create-driver');
    }
}