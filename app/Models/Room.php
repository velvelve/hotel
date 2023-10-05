<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
