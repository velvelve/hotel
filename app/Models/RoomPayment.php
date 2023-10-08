<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomPayment extends Model
{
    use HasFactory;

    protected $table = 'room_payments';

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
