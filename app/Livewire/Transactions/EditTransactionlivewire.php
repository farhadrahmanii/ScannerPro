<?php

namespace App\Livewire\Transactions;

use App\Models\Category;
use App\Models\ConsigneeCompany;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class EditTransactionlivewire extends Component
{
    public $transactionId;
    public $vehicle_id, $goods_id, $bill_of_landing, $exporting_country, $production_origin = [],
    $item_name, $category_id, $total_tonnage, $number_of_items = [], $consignee_company,
    $consignee_company_tin, $item_list, $delivery_location, $scan_time, $scan_status;
    public $consigneeSearchResults = [];
    public $showAddConsigneeCompanyForm = false;

    public function mount($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $this->transactionId = $transaction->id;
        $this->vehicle_id = $transaction->vehicle_id;
        $this->goods_id = $transaction->goods_id;
        $this->bill_of_landing = $transaction->bill_of_landing;
        $this->exporting_country = $transaction->exporting_country;
        $this->production_origin = explode(',', $transaction->production_origin);
        $this->item_name = $transaction->item_name;
        $this->category_id = $transaction->category_id;
        $this->total_tonnage = $transaction->total_tonnage;
        $this->number_of_items = explode(',', $transaction->number_of_items);
        $this->consignee_company = $transaction->consignee_company;
        $this->consignee_company_tin = $transaction->consignee_company_tin;
        $this->item_list = $transaction->item_list;
        $this->delivery_location = $transaction->delivery_location;
        $this->scan_time = $transaction->scan_time;
        $this->scan_status = $transaction->scan_status;
    }

    public function update()
    {
        $this->validate([
            "vehicle_id" => "required",
            'exporting_country' => 'required|string',
            'production_origin' => 'required|array',
            'item_name' => 'required|string',
            'category_id' => 'required|numeric',
            'total_tonnage' => 'required|string',
            'number_of_items' => 'required|array',
            'consignee_company_tin' => 'required|string',
            'item_list' => 'required|string',
            'delivery_location' => 'required|string',
            'scan_time' => 'required|date',
        ]);

        $user = Auth::id();

        // Generate Bill of Landing
        $year = now()->format('Y');
        $month = now()->format('m');
        $exportingCountry = Str::upper(substr($this->exporting_country, 0, 3));
        $productionOrigin = Str::upper(substr(implode(',', $this->production_origin), 0, 3));

        $lastBill = Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'desc')
            ->first();

        $incrementNumber = $lastBill ? intval(substr($lastBill->bill_of_landing, -4)) + 1 : 1;
        $incrementNumber = str_pad($incrementNumber, 4, '0', STR_PAD_LEFT);

        $this->bill_of_landing = "BL-{$year}-{$month}-{$exportingCountry}-{$productionOrigin}-{$incrementNumber}";
        $Transactiondata = Transaction::where('id', $this->transactionId)->update([
            'user_id' => $user,
            'site_id' => auth()->user()->site_id,
            'vehicle_id' => $this->vehicle_id,
            'bill_of_landing' => $this->bill_of_landing,
            'exporting_country' => $this->exporting_country,
            'production_origin' => implode(',', $this->production_origin),
            'item_name' => $this->item_name,
            'category_id' => $this->category_id,
            'total_tonnage' => $this->total_tonnage,
            'number_of_items' => implode(',', $this->number_of_items),
            'consignee_company_tin' => $this->consignee_company_tin,
            'item_list' => $this->item_list,
            'delivery_location' => $this->delivery_location,
            'scan_time' => $this->scan_time,
            'scan_status' => $this->scan_status,
        ]);
        flash()->success('Transaction updated successfully!');
        return $this->redirect('/all/transactions');
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

        $this->consignee_company = $company->consignee_company_name;
        $this->consignee_company_tin = $company->consignee_company_tin;
        $this->consigneeSearchResults = [];
        $this->showAddConsigneeCompanyForm = false;
    }

    public function render()
    {
        $categories = Category::all();
        $transaction = Transaction::findOrFail($this->transactionId);
        return view('livewire.transactions.edit-transactionlivewire', compact('categories', 'transaction'));
    }
}
