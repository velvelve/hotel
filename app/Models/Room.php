<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $with = ['images'];

    protected $fillable = [
        'hotel_id',
        'room_number',
        'description',
        'area',
        'apartment_count',
        'adults_max_guests',
        'children_max_guests',
        'price',
        'availability',
        'room_type_id',
        'view_type_id',
        'bed_type_id',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function includedServices()
    {
        return $this->belongsToMany(Service::class)->wherePivot('additional', false);
    }

    public function additionalServices()
    {
        return $this->belongsToMany(Service::class)->wherePivot('additional', true);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function bedType()
    {
        return $this->belongsTo(BedType::class, 'bed_type_id');
    }

    public function viewType()
    {
        return $this->belongsTo(ViewType::class, 'view_type_id');
    }
}
