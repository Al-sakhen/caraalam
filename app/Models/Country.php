<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'key',
        'name_en',
        'name_ar',
        'status',
        'country_code',
    ];

    // =====================
    // Relationships
    // =====================
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function carHistoryCategories()
    {
        return $this->hasMany(CarCountryHistoryCategory::class, 'country_id');
    }

    public function historyCategories()
    {
        return $this->belongsToMany(HistoryCategory::class, 'car_country_history_category', 'country_id', 'history_category_id')
            ->withPivot('car_id');
    }
}
