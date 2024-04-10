<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusPhoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'photo_path',
        'bus_no',
    ];
}
