<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thickness extends Model
{
    protected $fillable=['name','thickness','icon_tag',	'sort_order',	'status'];
}
