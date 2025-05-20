<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    // =================
    // Relationships
    // =================
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'car_country', 'car_id', 'country_id')
            ->withPivot('order')
            ->orderBy('order');
    }

    public function countryHistoryCategories()
    {
        return $this->hasMany(CarCountryHistoryCategory::class, 'car_id');
    }

    public function countriesWithCategories()
    {
        return $this->countries()->with(['historyCategories' => function($query) {
            $query->where('car_country_history_category.car_id', $this->id);
        }]);
    }
}
