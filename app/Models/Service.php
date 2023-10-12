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
        return $this->hasMany(ServiceImage::class);
    }

    public function icon()
    {
        return $this->hasOne(ServiceImage::class)->where('is_icon', true);
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
