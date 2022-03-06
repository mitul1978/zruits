<?php

namespace App\Imports;

use App\Models\ProductImage;
// use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImagesImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new ProductImage([
    //         //
    //     ]);
    // }

    public function collection(Collection $rows)
    {
    }
}
