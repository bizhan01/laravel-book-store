<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell_items extends Model
{
    protected $fillable = ['user_id','sell_id', 'product_id', 'product_qty'];
}
