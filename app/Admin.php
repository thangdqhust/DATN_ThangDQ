<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     protected $fillable = [
        'avata','name', 'email','address','phone', 'password',
    ];
}
