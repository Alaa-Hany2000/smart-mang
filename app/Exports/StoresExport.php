<?php

namespace App\Exports;

use App\Modules\Stores\models\Mstore;
use Maatwebsite\Excel\Concerns\FromCollection;

class StoresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mstore::all();
    }
}
