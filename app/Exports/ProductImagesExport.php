<?php

namespace App\Exports;

use App\Models\ProductImage;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;

class ProductImagesExport implements FromQuery,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Id',
            'Product Name',
            'Color',
            'Image',
            'created_at',
            'Updated_at',
            'deleted_at'
        ];
    } 

    public function map($productimage): array
    {
        return [
            $productimage->id,
            $productimage->singleProduct->name,
            $productimage->productColor->name,
            $productimage->image,
            $productimage->created_at,
            $productimage->updated_at,
            $productimage->deleted_at,
        ];
    }

    public function query()
    { 
        return ProductImage::with('singleProduct','productColor');
    }

    // public function collection()
    // {
    //     return ProductImage::all();
    // }
}
