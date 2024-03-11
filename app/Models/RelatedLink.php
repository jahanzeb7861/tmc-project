<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RelatedLink extends Model
{
    use HasFactory;

    protected $table = "related_links";
    protected $fillable = [
        'title',
        'website_settings_id',
        'url',
        'is_active',
    ];

    /**
     * Get the website setting that owns the related link.
     */
    public function websiteSetting(): BelongsTo
    {
        return $this->belongsTo(WebsiteSettings::class);
    }
}
