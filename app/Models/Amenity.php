<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Amenity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'svg_icon'
    ];
    public function busAmenity(): HasMany
    {
        return $this->hasMany(BusAmenity::class, 'amenity_id', 'id');
    }
}
