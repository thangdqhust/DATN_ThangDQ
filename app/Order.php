<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'member','product_id','user_id','receive','leave','status','note'
    ];

    public function products()
	    {
	        return $this->belongsTo('App\Product');
	    }
	public function users()
	    {
	        return $this->belongsTo('App\User');
	    }
}
