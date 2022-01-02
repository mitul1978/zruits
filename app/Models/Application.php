<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable=['name',	'icon_tag',	'sort_order',	'status'];
}
