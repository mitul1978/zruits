<?php

namespace App\Imports;

use App\Models\ProductStock;
// use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductStocksImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new ProductStock([
    //         //
    //     ]);
    // }
    public function collection(Collection $rows)
    {
    }
}
