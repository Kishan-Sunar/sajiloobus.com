<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusAmenity extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_no',
        'amenity_id'
    ];
}
