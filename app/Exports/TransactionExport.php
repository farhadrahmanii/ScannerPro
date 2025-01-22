<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionExport implements FromCollection
{
    protected $transactionIds;
    protected $userSiteId;

    public function __construct($transactionIds, $userSiteId)
    {
        $this->transactionIds = $transactionIds;
        $this->userSiteId = $userSiteId;
    }

    public function collection()
    {
        return Transaction::where('site_id', $this->userSiteId)
            ->get();
    }
}
