<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesMedia extends Model
{
    use HasFactory;
    protected $table = "header_pages_media";
    protected $fillable = [
        'file_name',
        'path',
        'post_id',
        'type'
    ];
    public function header_pages()
    {
        return $this->belongsToMany(HeaderPage::class, 'header_page_media', 'media_id', 'header_page_id')->withTimestamps();
    }
}
