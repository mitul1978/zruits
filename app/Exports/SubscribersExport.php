<?php

namespace App\Exports;

use App\Models\SubscribeNewsletter;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubscribersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SubscribeNewsletter::all();
    }
}
