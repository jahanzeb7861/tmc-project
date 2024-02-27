<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsMedia extends Model
{
    use HasFactory;
    protected $table = "posts_media";
    protected $fillable = [
        'file_name',
        'path',
        'post_id',
        'type'
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_media', 'media_id', 'post_id')->withTimestamps();
    }
}
