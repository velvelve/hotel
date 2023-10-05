<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'room_id',
        'user_id',
        'check_in_date',
        'check_out_date',
        'guests_count',
        'status',
    ];
}
