<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderPage extends Model
{
    use HasFactory;
    protected $table = "header_pages";
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'category',
        'keywords',
        'language',
        'user_id',
        'is_publish',
        'is_faq',
        'publish_date',
        'menu_type',
        'click_hits',
        'sort',
    ];
    public function pageMedia()
    {
        return $this->hasMany(PagesMedia::class, 'header_page_id', 'id');
    }
}
