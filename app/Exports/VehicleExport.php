<?php

namespace App\Exports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\FromCollection;

class VehicleExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $vehicleId;
    protected $userSiteId;
    public function __construct($vehicleId, $userSiteId)
    {
        $this->vehicleId = $vehicleId;
        $this->userSiteId = $userSiteId;
    }

    public function collection()
    {
        return Vehicle::where('site_id', $this->userSiteId)
            ->get();
    }
}
