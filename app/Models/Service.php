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
        return $this->belongsToMany(Image::class, 'service_images');
    }

    public function icon()
    {
        $serviceImage = ServiceImage::query()->where('is_icon', true)
            ->where('service_id', $this->id)->get();
        return $this->images()->find($serviceImage[0]->image_id);
    }


    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_services');
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_services');
    }

    public function roomService()
    {
        return $this->hasOne(RoomService::class, 'service_id');
    }
}
