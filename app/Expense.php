<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
      protected $fillable = ['name', 'category', 'month', 'year', 'amount'];
}