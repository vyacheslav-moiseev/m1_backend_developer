<?php

namespace App\Modules\DynamicPricing\Models;

use Illuminate\Database\Eloquent\Model;

class PriceCoefficient extends Model
{
    protected $table = 'price_coefficients';
    protected $fillable = ['product_id','geo_id','coefficient','calculated_at'];
    public $timestamps = false;
}
