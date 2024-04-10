<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $primaryKey = 'bus_no';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'bus_no',
        'name',
        'featured_photo_path',
        'operator_id',
        'bus_type',
    ];
}
