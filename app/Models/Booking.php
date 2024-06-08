<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'driver_id',
        'vehicle_id',
        'location',
        'vehicle_category_id',
        'amount',
        'pickup_location',
        'pickup_time',
        'status',
    ];

    /**
     * Get the user that owns the booking.
     * @return BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * get the driver that owns the booking
     * @return BelongsTo
     */
    public function driver(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    /**
     * Get the vehicle category that owns the booking
     * @return BelongsTo
     */
    public function vehicleCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VehicleCategory::class, 'vehicle_category_id');
    }

    /**
     * Get the vehicle that owns the booking
     * @return BelongsTo
     */
    public function vehicle(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function passenger()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
