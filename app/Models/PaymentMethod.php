<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'account_name',
        'account_number',
        'image',
        'is_active',
    ];

    public function paymentDetail(){
        return $this->hasMany(PaymentDetail::class);
    }
}
