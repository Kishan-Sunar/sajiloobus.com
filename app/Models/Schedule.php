<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'origin',
        'departure',
        'destination',
        'arrival',
        'bus_no',
        'fare',
        'notes',
        'policy'
    ];
}
