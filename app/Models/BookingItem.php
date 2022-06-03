<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'voucher_id',
        'group_number',
        'pairs_of_shoes'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
