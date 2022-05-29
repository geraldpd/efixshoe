<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'pickup_date',
        'delivery_date'
    ];

    public function bookingServices(){
        return $this->hasMany(BookingService::class);
    }

    public function paymentDetail(){
        return $this->hasOne(PaymentDetail::class);
    }
}
