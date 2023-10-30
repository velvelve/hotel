<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $with = ['icon'];

    public function images()
    {
        return $this->belongsToMany(Image::class)->wherePivot('is_icon', false);
    }

    public function icon()
    {
        return $this->belongsToMany(Image::class)->wherePivot('is_icon', true);
    }

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class);
    }
}
