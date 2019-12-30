<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'origin_cost','sale_cost','description', 'content','category_id','slug','user_id','quantity'
    ];
}
