<?php

namespace App\Livewire;

use App\Models\Site;
use Livewire\Component;
use App\Models\Provinces;
class AddProvince extends Component
{
    public $Province_name;

    public function save()
    {
        $this->validate([
            'Province_name' => 'required',
        ]);
        $province = new Provinces();
        $province->Province_name = $this->Province_name;
        $province->save();
        flash()->success('The Province is registered Successfully');
        $this->reset();  // Reset input after success
        return redirect()->route('province.site');

    }

    public function placeholder()
    {
        return view("livewire.form-loading");
    }
    public function render()
    {
        $sites = Site::all();
        return view('livewire.add-province', compact('sites'));
    }
}
