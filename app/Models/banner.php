<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = "banners";
    protected $fillable = [
        'banner_title',
        'image',
    ];

    public function bannerMedia()
    {
        return $this->hasMany(BannerMedia::class, 'banner_id', 'id');
    }
}
