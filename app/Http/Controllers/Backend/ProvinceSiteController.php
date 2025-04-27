<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Provinces;
use App\Models\Site;
use Illuminate\Http\Request;

class ProvinceSiteController extends Controller
{
    public function AllProvinceSites()
    {
        return view("admin.backend.provinces_site.allProvince_site");
    }

    public function AddProvince()
    {
        return view("admin.backend.provinces_site.addProvince");
    }

    public function allSites()
    {
        return view("admin.backend.sites.allSite");
    } //All Site

    public function AddSite()
    {
        return view("admin.backend.sites.addSite");
    } //All Site
    public function EditSite($id)
    {
        $siteId = Site::findOrFail($id);

        return view("admin.backend.sites.editSite", compact('siteId'));
    } //All Site
}
