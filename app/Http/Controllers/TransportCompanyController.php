<?php

namespace App\Http\Controllers;

use App\Models\TransportCompany;
use Illuminate\Http\Request;

class TransportCompanyController extends Controller
{
    public function AddTransportCompany()
    {
        return view("admin.backend.transport_company.addTransportCompany");
    }// End Of method
    public function AllTransportCompany()
    {
        return view("admin.backend.transport_company.allTransport_company");
    }// End Of method

    public function EditTransportCompany($id)
    {
        $transportCompany = TransportCompany::findOrFail($id);
        return view("admin.backend.transport_company.editTransportCompany", compact("transportCompany"));
    }// End Of method
}
