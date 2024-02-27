<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSettings extends Model
{
    use HasFactory;
    protected $table = "website_settings";
    protected $fillable = [
        'name',
        'email',
        'phone',
        'logo',
        'favicon',
        'author',
        'title',
        'description',
        'website_address',
        'keywords',
        'linkedin_link',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'youtube_link',
    ];
}
