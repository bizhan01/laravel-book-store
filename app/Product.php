<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['user_id', 'product_type', 'product_name','author','edition','publisher', 'publish_date', 'ISBN', 'category',  'quantity', 'price', 'image'];
}
