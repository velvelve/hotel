<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'room_id',
        'user_id',
        'check_in_date',
        'check_out_date',
        'client_first_name',
        'client_middle_name',
        'client_last_name',
        'client_phone',
        'client_email',
        'promo_code',
        'client_wishes',
        'guests_count',
        'status',
        'total_price',
    ];

    public function room()
    {
        return Room::where('id', $this->room_id)->first();
    }

    public function user()
    {
        return User::where('id', $this->user_id)->first();
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
