<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\ConsigneeCompany;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateTransaction extends Component
{
    public $user;
    public $vehicle_id;
    public $transaction_id;
    public $bill_of_landing;
    public $exporting_country;
    public $production_origin;
    public $item_name;
    public $category_id;
    public $total_tonnage;
    public $number_of_items;
    public $item_list;
    public $delivery_location;
    public $scan_status;
    public $scan_time;
    public $id;
    public $consigneeCompanies = [];
    public $consignee_company_id = null;
    public $consignee_company_tin = "";
    public $consignee_company = "";
    public $consigneeSearchResults = [];
    public $showAddConsigneeCompanyForm = false;
    public function save()
    {
        $user = Auth::user()->id;
        Log::info('Transaction Data:', [
            'user' => $user,
            'vehicle_id' => $this->vehicle_id,
            'transaction_id' => $this->transaction_id,
            'bill_of_landing' => $this->bill_of_landing,
            'exporting_country' => $this->exporting_country,
            'production_origin' => $this->production_origin,
            'item_name' => $this->item_name,
            'category_id' => $this->category_id,
            'total_tonnage' => $this->total_tonnage,
            'number_of_items' => $this->number_of_items,
            'item_list' => $this->item_list,
            'delivery_location' => $this->delivery_location,
            'scan_status' => $this->scan_status,
            'scan_time' => $this->scan_time,
            'id' => $this->id,
            'consigneeCompanies' => $this->consigneeCompanies,
            'consignee_company_id' => $this->consignee_company_id,
            'consignee_company_tin' => $this->consignee_company_tin,
            'consignee_company' => $this->consignee_company,
            'consigneeSearchResults' => $this->consigneeSearchResults,
            'showAddConsigneeCompanyForm' => $this->showAddConsigneeCompanyForm,
        ]);


        // Generate a unique transaction_id
        do {
            $this->transaction_id = 'TXN-' . Str::upper(Str::random(10)); // Example: TXN-ABC123DEF4
        } while (Transaction::where('transaction_id', $this->transaction_id)->exists());

        // Generate bill_of_landing
        $year = now()->format('Y');
        $month = now()->format('m');
        $exportingCountry = $this->exporting_country ? Str::upper(substr($this->exporting_country, 0, 3)) : ''; // First 3 uppercase characters
        $productionOrigin = $this->production_origin ? Str::upper(substr($this->production_origin, 0, 3)) : ''; // First 3 uppercase characters

        // Get the last record and increment the number
        $lastBill = Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'desc')
            ->first();

        $incrementNumber = $lastBill ? intval(substr($lastBill->bill_of_landing, -4)) + 1 : 1;
        $incrementNumber = str_pad($incrementNumber, 4, '0', STR_PAD_LEFT); // Ensure 4 digits (e.g., 0001)

        $bill_of_landing = "BL-{$year}-{$month}-{$exportingCountry}-{$productionOrigin}-{$incrementNumber}";

        // Validate the input fields
        $validatedData = $this->validate([
            'vehicle_id' => 'required',
            'exporting_country' => 'required|string',
            'production_origin' => 'string',
            'item_name' => 'required|string',
            'category_id' => 'required|numeric',
            'total_tonnage' => 'required|string',
            'number_of_items' => 'required|string',
            'consignee_company_tin' => 'required|string',
            'item_list' => 'required|string',
            'delivery_location' => 'required|string',
            'scan_time' => 'required|string',
        ]);
        // Log the validated data for debugging
        \Log::info('Validated Data:', $validatedData);

        // Save the transaction
        $transaction = Transaction::create([
            'user_id' => $user,
            'vehicle_id' => $this->vehicle_id,
            'transaction_id' => $this->transaction_id,
            'bill_of_landing' => $bill_of_landing,
            'exporting_country' => $this->exporting_country,
            'production_origin' => $this->production_origin,
            'item_name' => $this->item_name,
            'category_id' => $this->category_id,
            'total_tonnage' => $this->total_tonnage,
            'number_of_items' => $this->number_of_items,
            'consignee_company_tin' => $this->consignee_company_tin,
            'item_list' => $this->item_list,
            'delivery_location' => $this->delivery_location,
            'scan_status' => $this->scan_status,
            'scan_time' => $this->scan_time,
        ]);

        // Check if the transaction was saved successfully
        if ($transaction) {
            flash()->success($this->transaction_id . ' Transaction Id Record Saved Successfully~');
            return $this->redirect('/all/transactions', navigate: true);
        } else {
            flash()->error('Failed to save the transaction.');
        }
    }
    public function mount()
    {
        $this->id = $this->getId();
        $this->consigneeCompanies = ConsigneeCompany::all();
    }

    public function placeholder()
    {
        return view('livewire.form-loading');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.transactions.create-transaction', compact('categories'));
    }

    public function updatedConsigneeCompanyTin()
    {
        if (strlen($this->consignee_company_tin) > 2) {
            $this->consigneeSearchResults = ConsigneeCompany::where('consignee_company_tin', 'like', "%{$this->consignee_company_tin}%")
                ->limit(5)
                ->get()
                ->toArray();

            $this->showAddConsigneeCompanyForm = count($this->consigneeSearchResults) === 0;
        } else {
            $this->consigneeSearchResults = [];
            $this->showAddConsigneeCompanyForm = false;
        }
    }

    public function selectConsigneeCompany($companyId)
    {
        $company = ConsigneeCompany::findOrFail($companyId);
        $this->consignee_company_id = $company->id;
        $this->consignee_company = $company->consignee_company_name;
        $this->consignee_company_tin = $company->consignee_company_tin;
        $this->consigneeSearchResults = [];
        $this->showAddConsigneeCompanyForm = false;
    }

    public function addConsigneeCompany()
    {
        $validated = $this->validate([
            'consignee_company' => ['required', 'string', 'max:255'],
            'consignee_company_tin' => ['required', 'string', 'max:50', 'unique:consignee_companies,consignee_company_tin'],
        ]);

        $company = ConsigneeCompany::create([
            'consignee_company_name' => $validated['consignee_company'],
            'consignee_company_tin' => $validated['consignee_company_tin'],
        ]);

        $this->consignee_company_id = $company->id;
        $this->consigneeSearchResults = [];
        $this->showAddConsigneeCompanyForm = false;
    }
}
