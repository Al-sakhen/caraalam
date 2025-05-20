<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'country_id',
        'key',
        'name_en',
        'name_ar',
        'status',
        'city_code',
    ];


    // =====================
    // Relationships
    // =====================
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
