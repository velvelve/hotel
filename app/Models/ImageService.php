<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageService extends Model
{
    use HasFactory;

    protected $table = 'image_service';

    public function iconImage()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
