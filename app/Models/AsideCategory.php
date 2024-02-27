<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsideCategory extends Model
{
    use HasFactory;
    protected $table = "aside_categories";
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
        return $this->belongsTo(AsideCategory::class, 'parent', 'id');
    }
}
