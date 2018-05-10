<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{	protected $table="product-details";
    protected $fillable = [
        'product_id','color_id', 'size_id','quantity',
    ];
}
