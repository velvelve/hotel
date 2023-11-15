<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'discounts',
        'special_offers',
        'bonus_earnings',
        'feedback_responses',
    ];
    protected $table = 'notifications';

    public function user()
    {
        return User::where('notification_preference_id', $this->id)->first();
    }
}
