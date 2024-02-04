<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    use HasFactory;

    // add all the fields to the fillable
    // creating enum for the vehicle type
    // 1 = bus
    // 2 = van

    protected $fillable = [
        'name',
        'description',
        'status',


    ];
}
