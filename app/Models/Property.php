<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'partner_id',
        'name',
        'address',
        'city',
        'type',
        'star_rating',
        'description',
        'check_in_time',
        'check_out_time',
        'smoking_policy',
        'pet_policy',
        'child_policy',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'partner_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'property_id', 'property_id');
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id', 'property_id');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenities', 'property_id', 'amenity_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'property_id', 'property_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'property_id', 'property_id');
    }
}
