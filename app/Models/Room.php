<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'name',
        'size',
        'bed_count',
        'price',
        'quantity',
        'cancellation_policy',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'property_id');
    }

    public function availabilities()
    {
        return $this->hasMany(RoomAvailability::class, 'room_id', 'room_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'room_id', 'room_id');
    }
}
