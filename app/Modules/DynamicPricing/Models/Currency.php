<?php


namespace App\Modules\DynamicPricing\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency';
    protected $fillable = ['code'];
    public $timestamps = false;
}
