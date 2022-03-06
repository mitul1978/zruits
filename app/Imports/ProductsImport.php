<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

// use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new Product([
    //         //
    //     ]);
    // }

    public function collection(Collection $rows)
    {
    }
}
