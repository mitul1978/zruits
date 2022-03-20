<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class ProductsExport implements FromQuery,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'ID',
            'CATEGORY',
            'NAME',
            'DESIGN',
            'HSN',
            'FABRIC',
            'ORIENTATION',
            'PRICE',
            'DISCOUNT',
            'MIN_ORDER_QTY',
            'TAG',
            'DESCRIPTION',
            'INFORMATION',
            'META TITLE',
            'META KEYWORD',
            'META DESCRIPTION',
            'RELATED PRODUCTS',
            'IS FEATURED',
            'IS NEW',
            'IS BESTSELLER',
            'IS OFFER',
            'OFFER',
            'STATUS'
        ];
    } 

    public function map($product): array
    {
        return [
            $product->id,
            $product->category->title,
            $product->name,
            $product->design,
            $product->hsn,
            @$product->pfabric->name,
            $product->getOrientations(),
            $product->price,
            $product->discount,
            $product->min_order_qty,
            $product->tag,
            $product->description,
            $product->additional_information,
            $product->meta_title,
            $product->meta_keyword,
            $product->meta_description,
            $product->getRelatedProducts(),
            $product->is_featured,
            $product->is_new,
            $product->is_bestsellers,
            $product->is_offer,
            $product->offer == 3 ? 'All' : @$product->poffer->name,
            $product->status == 1 ? 'Active' : 'Inactive',
        ];
    }

    public function query()
    { 
        return Product::with('category','pfabric','poffer')->where('is_giftcard',0);
    }

    // public function collection()
    // {
    //     return Product::all();
    // }
}
