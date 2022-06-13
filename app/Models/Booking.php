<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    const PENDING = 'PENDING'; //initial
    const DECLINED = 'DECLINED';
    const FOR_PICKUP = 'FOR_PICKUP';
    const PROCESSING = 'PROCESSING'; //cleaning
    const AWAITING_PAYMENT = 'AWAITING_PAYMENT';
    const FOR_DELIVERY = 'FOR_DELIVERY';
    const FOR_CASH_ON_DELIVERY = 'FOR_CASH_ON_DELIVERY';
    const COMPLETED = 'COMPLETED';

    protected $fillable = [
        'user_id',
        'status',
        'pickup_date',
        'delivery_date'
    ];

    protected $casts = [
        'pickup_date' => 'datetime',
        'delivery_date' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookingItems(){
        return $this->hasMany(BookingItem::class);
    }

    public function paymentDetail(){
        return $this->hasOne(PaymentDetail::class);
    }

    public function getTotalPairsOfShoesAttribute()
    {
        return $this->bookingItems->sum('pairs_of_shoes');
    }
}
