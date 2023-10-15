<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Symfony\Component\HttpKernel\Attribute\WithLogLevel;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $with = ['images'];

    protected $fillable = [
        'room_number',
        'room_type',
        'price',
        'max_guest_count',
        'availability',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'room_services');
    }

    public function includedServices()
    {
        return $this->belongsToMany(Service::class, 'room_services')->wherePivot('additional', false);
    }

    public function additionalServices()
    {
        return $this->belongsToMany(Service::class, 'room_services')->wherePivot('additional', true);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
