<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsigneeCompany extends Model
{
    /** @use HasFactory<\Database\Factories\ConsigneeCompanyFactory> */
    use HasFactory;
    public function AllConsigneeCompany()
    {
        return view('admin.backend.consignee_company.allConsignee_company');
    } // END of Mehtod

    public function AddConsigneeCompany()
    {
        return view('admin.backend.consignee_company.addConsigneeCompany');
    } // END of Mehtod

    public function EditConsigneeCompany($id)
    {
        return view('admin.backend.consignee_company.addConsigneeCompany');
    } // END of Mehtod
}
