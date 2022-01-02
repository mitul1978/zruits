<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable=['name',	'content','icon','sort_order',	'status'];
}
