<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewType extends Model
{
    use HasFactory;

    protected $fillable = ['constant'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
