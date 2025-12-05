<?php


namespace App\Modules\DynamicPricing\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGeoPrice extends Model
{
    protected $table = 'product_geo_price';
    protected $fillable = ['product_id', 'geo_id', 'base_price', 'shipping_price'];
    public $timestamps = true;
}
