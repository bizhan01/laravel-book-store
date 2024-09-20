<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = [ 'user_id', 'total', 'discount', 'paid', 'status'];
}
