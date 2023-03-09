<?php

namespace App\Imports;

use App\Mstore;
use Maatwebsite\Excel\Concerns\ToModel;

class MstoreImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mstore([
            //
        ]);
    }
}
