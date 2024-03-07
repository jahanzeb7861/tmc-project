<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerMedia extends Model
{
    use HasFactory;
    protected $table = "banners_media";
    protected $fillable = [
        'file_name',
        'path',
        'banner_id',
        'type'
    ];

    public function banners()
    {
        return $this->belongsToMany(Banner::class, 'banners_media', 'media_id', 'banner_id')->withTimestamps();
    }
}
