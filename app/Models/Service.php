<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'cost',
        'turnaround_time',
        'image',
        'is_active',
    ];

    public function bookingItem()
    {
        return $this->belongsTo(BookingItem::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/services/'.$this->image);
    }
}
