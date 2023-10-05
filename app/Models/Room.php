<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
//    public $incrementing = true;
    protected $table = 'rooms';

    protected $fillable = [
        'room_number',
        'room_type',
        'price',
        'max_guest_count',
        'availability',
    ];
}
