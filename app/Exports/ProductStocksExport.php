<?php

namespace App\Exports;

use App\Models\ProductStock;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class ProductStocksExport implements FromQuery,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Product Name',
            'Size',
            'Color',
            'Stock Qty',
            'created_at',
            'Updated_at',
            'deleted_at'
        ];
    } 

    public function map($productstock): array
    {
        return [
            $productstock->id,
            $productstock->singleProduct->name,
            $productstock->productSize->name,
            $productstock->productColor->name,
            $productstock->stock_qty,
            $productstock->created_at,
            $productstock->updated_at,
            $productstock->deleted_at,
        ];
    }

    public function query()
    { 
        return ProductStock::with('singleProduct','productSize','productColor');
    }

    // public function collection()
    // {
    //     return ProductStock::all();
    // }
}
