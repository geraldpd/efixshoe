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

    public function scopeStatuses()
    {
        return [
            self::PENDING,
            self::DECLINED,
            self::FOR_PICKUP,
            self::PROCESSING,
            self::AWAITING_PAYMENT,
            self::FOR_DELIVERY,
            self::FOR_CASH_ON_DELIVERY,
            self::COMPLETED
        ];
    }

    public function getStatusColorAttribute(){
        $color = '#000000'; // Default color is Black
        switch ($this->status) {
            case $this::PENDING:
            case $this::PROCESSING:
            case $this::AWAITING_PAYMENT:
                $color = '#f26636'; // Orange-ish
            break;

            case Booking::DECLINED:
                $color = '#cf000f'; // Red-ish
            break;

            case $this::FOR_PICKUP:
            case $this::FOR_DELIVERY:
            case $this::FOR_CASH_ON_DELIVERY:
                $color = '#2aa3cc'; // Blue-ish
            break;

            case Booking::COMPLETED:
                $color = '#009944'; // Green-ish
            break;
        }

        return $color;
    }
}
