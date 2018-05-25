<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code','name', 'origin_cost','sale_cost','description', 'content','category_id','slug','vendor_id',
    ];
}
