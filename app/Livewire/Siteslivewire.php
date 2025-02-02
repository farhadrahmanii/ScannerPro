<?php

namespace App\Livewire;

use App\Models\Site;
use Livewire\Component;

class Siteslivewire extends Component
{
    public $sites;
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function mount()
    {
        $this->sites = Site::with('manager')->get();
    }
    public function deleteSite($siteId)
    {
        // Find the site and delete it
        $site = Site::findOrFail($siteId);
        $site->delete();

        // Show success flash message
        flash()->addSuccess('Site deleted successfully!');

        // Redirect back to the site list page after deletion
        return $this->redirect('/all/site');  // Adjust route as needed
    }
    public function render()
    {
        return view('livewire.provinces.siteslivewire');
    }
}
