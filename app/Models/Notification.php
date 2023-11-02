<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'discounts',
        'special_offers',
        'bonus_earnings',
        'feedback_responses',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
