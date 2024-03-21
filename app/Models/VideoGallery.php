<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;
    protected $table = "video_galleries";
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

    public function videoGalleryMedia()
    {
        return $this->hasMany(VideoGalleryMedia::class, 'video_gallery_id', 'id');
    }
}
