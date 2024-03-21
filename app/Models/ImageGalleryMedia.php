<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGalleryMedia extends Model
{
    use HasFactory;
    protected $table = "image_galleries_media";
    protected $fillable = [
        'file_name',
        'path',
        'image_gallery_id',
        'type'
    ];
    public function imageGalleries()
    {
        return $this->belongsToMany(ImageGallery::class, 'image_gallery_media', 'media_id', 'image_gallery_id')->withTimestamps();
    }
}
