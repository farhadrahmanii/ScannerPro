<?php

namespace App\Exports;

use App\Models\Driver;
use Maatwebsite\Excel\Concerns\FromCollection;

class DriverExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $transactionIds;
    protected $userSiteId;
    public function __construct($driverId, $userSiteId)
    {
        $this->driverId = $driverId;
        $this->userSiteId = $userSiteId;
    }
    public function collection()
    {
        return Driver::where('site_id', $this->userSiteId)
            ->get();
    }
}
