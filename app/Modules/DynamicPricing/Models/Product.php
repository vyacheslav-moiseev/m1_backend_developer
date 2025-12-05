<?php

namespace App\Modules\DynamicPricing\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'status'];
}
