<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'payment_method_id',
        'total_cost',
        'discount',
        'voucher_code',
        'receipt_attachment'
    ];

    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class);
    }
}
