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
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
