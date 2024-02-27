<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeaderCategory extends Model
{
    use HasFactory;
    protected $table = "header_category";
    protected $fillable = [
        'title',
        'slug',
        'description',
        'keywords',
        'image',
        'is_publish',
        'parent',
        'user_id',
    ];

    public function user_details()
    { 
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function parent_cate()
    { 
        return $this->belongsTo(HeaderCategory::class, 'parent', 'id');
    }
}
