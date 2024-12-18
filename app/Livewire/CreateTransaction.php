<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateTransaction extends Component
{
    public $user;
    public $goods_id;
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

    public function save()
    {
        $this->validate([
            'goods_id' => 'required|string',
            'transaction_id' => 'required|string',
            'bill_of_landing' => 'required|string',
            'exporting_country' => 'required|string',
            'production_origin' => 'required|string',
            'item_name' => 'required|string',
            'category_id' => 'required|string',
            'total_tonnage' => 'required|string',
            'number_of_items' => 'required|string',
            'consignee_company' => 'required|string',
            'consignee_company_tin' => 'required|string',
            'item_list' => 'required|string',
            'delivery_location' => 'required|string',
            'scan_time' => 'required|string',
        ]);
        $user = Auth::user()->id;
        $transaction = Transaction::create([
            'user_id' => $user,
            'goods_id' => $this->goods_id, // Add this line
            'transaction_id' => $this->transaction_id,
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
        ]);

        $transaction->save();
        flash()->success($this->transaction_id . ' Transaction Id Record Saved Successfully~');
        return $this->redirect('/all/transactions', navigate: true);


    }
    public function mount()
    {

    }
    public function placeholder()
    {
        return view('livewire.form-loading');
    }

    public function render()
    {
        return view('livewire.create-transaction');
    }
}
