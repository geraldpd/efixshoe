<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'service_id',
        'voucher_id',
        'group_number'
    ];

    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}
