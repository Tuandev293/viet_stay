<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'password',
        'created_at',
        'verified',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'partner_id', 'partner_id');
    }
}
