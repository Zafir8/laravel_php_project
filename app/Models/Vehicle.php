<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    // This is model to represent a bus or a van, (no cars and any other shit)

    protected $fillable = [
        'vehicle_category_id',
        'number',
        'engine_number',
        'chassis_number',
        'owner_name',
        'owner_nic',
        'owner_license',
        'owner_address',
        'owner_mobile',
        'status', // active, inactive, under_maintanance
    ];


    public function category(){
        return $this->belongsTo(VehicleCategory::class, 'vehicle_category_id');
    }

}
