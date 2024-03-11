<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

     /**
     * Get the related links for the website setting.
     */
    public function relatedLinks(): HasMany
    {
        return $this->hasMany(RelatedLink::class);
    }


     /**
     * Get the useful links for the website setting.
     */
    public function usefulLinks(): HasMany
    {
        return $this->hasMany(UsefulLink::class);
    }
}
