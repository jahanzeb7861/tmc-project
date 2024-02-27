<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
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
    public function postMedia()
    {
        return $this->hasMany(PostsMedia::class, 'post_id', 'id');
    }
    public function faq_details()
    {
        return $this->hasMany(Faqs::class, 'post_id', 'id');
    }

    public function category_details(){
        return $this->belongsTo(HeaderCategory::class,'category','id');
    }
}
