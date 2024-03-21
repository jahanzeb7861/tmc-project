<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGalleryMedia extends Model
{
    use HasFactory;
    protected $table = "video_galleries_media";
    protected $fillable = [
        'file_name',
        'path',
        'video_gallery_id',
        'type'
    ];
    public function videoGalleries()
    {
        return $this->belongsToMany(VideoGallery::class, 'video_gallery_media', 'media_id', 'video_gallery_id')->withTimestamps();
    }
}
