<?php

namespace App\Livewire\Transactions;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class EditTransactionlivewire extends Component
{

    public $transactionId;
    public $vehicle_id, $goods_id, $bill_of_landing, $exporting_country, $production_origin,
    $item_name, $category_id, $total_tonnage, $number_of_items, $consignee_company,
    $consignee_company_tin, $item_list, $delivery_location, $scan_time, $scan_status;

    public function mount($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $this->transactionId = $transaction->id;
        $this->vehicle_id = $transaction->vehicle_id;
        $this->goods_id = $transaction->goods_id;
        $this->bill_of_landing = $transaction->bill_of_landing;
        $this->exporting_country = $transaction->exporting_country;
        $this->production_origin = $transaction->production_origin;
        $this->item_name = $transaction->item_name;
        $this->category_id = $transaction->category_id;
        $this->total_tonnage = $transaction->total_tonnage;
        $this->number_of_items = $transaction->number_of_items;
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
            'goods_id' => 'required|string',
            'exporting_country' => 'required|string',
            'production_origin' => 'required|string',
            'item_name' => 'required|string',
            'category_id' => 'required|numeric',
            'total_tonnage' => 'required|string',
            'number_of_items' => 'required|string',
            'consignee_company' => 'required|string',
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
        $productionOrigin = Str::upper(substr($this->production_origin, 0, 3));

        $lastBill = Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'desc')
            ->first();

        $incrementNumber = $lastBill ? intval(substr($lastBill->bill_of_landing, -4)) + 1 : 1;
        $incrementNumber = str_pad($incrementNumber, 4, '0', STR_PAD_LEFT);

        $this->bill_of_landing = "BL-{$year}-{$month}-{$exportingCountry}-{$productionOrigin}-{$incrementNumber}";

        Transaction::where('id', $this->transactionId)->update([
            // 'user_id' => $user,
            'vehicle_id' => $this->vehicle_id,
            // 'goods_id' => $this->goods_id,
            // 'transaction_id' => 'TXN-' . Str::upper(Str::random(10)),
            'bill_of_landing' => $this->bill_of_landing,
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
            'scan_time' => $this->scan_time,
            'scan_status' => $this->scan_status,
        ]);

        flash()->success('Transaction updated successfully!');
        return $this->redirect('/all/transactions', navigate: true);
    }



    public function placeholder()
    {
        return view('livewire.form-loading');
    }

    public function render()
    {

        $categories = Category::all();
        $transaction = Transaction::findOrFail($this->transactionId);
        return view('livewire.transactions.edit-transactionlivewire', compact('categories', 'transaction'));
    }
}
