<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    public function images()
    {
        return $this->belongsToMany(Image::class, 'service_images')->wherePivot('is_icon', false);
    }

    public function icon()
    {
        return $this->belongsToMany(Image::class, 'service_images')->wherePivot('is_icon', true)->first();
    }

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_services');
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_services');
    }
}
