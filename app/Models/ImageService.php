<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageService extends Model
{
    use HasFactory;

    protected $table = 'image_service';

    protected $fillable = [
        'image_id',
        'service_id',
        'is_icon',
    ];


    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
