<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarCountryHistoryCategory extends Model
{
    protected $table = 'car_country_history_category';
    protected $fillable = [
        'car_id',
        'country_id',
        'history_category_id',
    ];
}
