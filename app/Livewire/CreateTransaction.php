<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
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
    public $consignee_company;
    public $consignee_company_tin;
    public $item_list;
    public $delivery_location;
    public $scan_status;
    public $scan_time;
    public $id;


    public function save()
    {


        $user = Auth::user()->id;

        // Generate a unique transaction_id
        do {
            $this->transaction_id = 'TXN-' . Str::upper(Str::random(10)); // Example: TXN-ABC123DEF4
        } while (Transaction::where('transaction_id', $this->transaction_id)->exists());

        // Generate bill_of_landing
        $year = now()->format('Y');
        $month = now()->format('m');
        $exportingCountry = Str::upper(substr($this->exporting_country, 0, 3)); // First 3 uppercase characters
        $productionOrigin = Str::upper(substr($this->production_origin, 0, 3)); // First 3 uppercase characters

        // Get the last record and increment the number
        $lastBill = Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'desc')
            ->first();

        $incrementNumber = $lastBill ? intval(substr($lastBill->bill_of_landing, -4)) + 1 : 1;
        $incrementNumber = str_pad($incrementNumber, 4, '0', STR_PAD_LEFT); // Ensure 4 digits (e.g., 0001)

        $bill_of_landing = "BL-{$year}-{$month}-{$exportingCountry}-{$productionOrigin}-{$incrementNumber}";


        $this->validate([
            "vehicle_id" => "required",
            'exporting_country' => 'required|string',
            'production_origin' => 'string',
            'item_name' => 'required|string',
            'category_id' => 'required|numeric',
            'total_tonnage' => 'required|string',
            'number_of_items' => 'required|string',
            'consignee_company' => 'required|string',
            'consignee_company_tin' => 'required|string',
            'item_list' => 'required|string',
            'delivery_location' => 'required|string',
            'scan_time' => 'required|string',
        ]);

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
            'consignee_company' => $this->consignee_company,
            'consignee_company_tin' => $this->consignee_company_tin,
            'item_list' => $this->item_list,
            'delivery_location' => $this->delivery_location,
            'scan_status' => $this->scan_status,
            'scan_time' => $this->scan_time,
        ]);

        $transaction->save();
        flash()->success($this->transaction_id . ' Transaction Id Record Saved Successfully~');
        return $this->redirect('/all/transactions', navigate: true);


    }
    public function mount()
    {
        $this->id = $this->getId();
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
}
