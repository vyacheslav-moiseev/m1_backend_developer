<?php

namespace App\Modules\DynamicPricing\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';
    public $timestamps = false;
    protected $fillable = ['product_id','geo_id','created_at'];
}
