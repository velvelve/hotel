<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    use HasFactory;
    public function iconImage()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
