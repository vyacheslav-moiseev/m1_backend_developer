<?php


namespace App\Modules\DynamicPricing\Models;

use Illuminate\Database\Eloquent\Model;

class Geo extends Model
{
    protected $table = 'geo';
    protected $fillable = ['code', 'name', 'currency_id'];
    public $timestamps = false;
}
