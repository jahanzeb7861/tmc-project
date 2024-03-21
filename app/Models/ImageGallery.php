<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    use HasFactory;
    protected $table = "image_galleries";
    protected $fillable = [
        'title',
        'slug',
        'image',
        'start_date',
        'file',
        'end_date',
        'address',
        'is_publish',
    ];

    public function imageGalleryMedia()
    {
        return $this->hasMany(ImageGalleryMedia::class, 'image_gallery_id', 'id');
    }
}
