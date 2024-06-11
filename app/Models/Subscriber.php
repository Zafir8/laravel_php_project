<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'order_number',
        'price',
        'purchase_date',
        'subscription_date',
        'renewal_date',
    ];

    protected $casts = [
        'purchase_date' => 'datetime',
        'subscription_date' => 'datetime',
        'renewal_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function deductPrice($amount)
    {
        $this->price -= $amount;
        $this->save();
    }
}
