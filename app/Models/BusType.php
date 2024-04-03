<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'model',
        'company',
        'type',
        'operator_id',
    ];
}
