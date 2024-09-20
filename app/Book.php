<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
      protected $fillable = ['user_id','book_name','author','edition','publisher', 'publish_date', 'ISBN', 'category', 'type', 'quantity', 'price', 'image'];
}
