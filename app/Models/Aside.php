<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aside extends Model
{
    use HasFactory;
    protected $table = "aside";
    protected $fillable = [
        'title',
        'url',
        'user_id',
    ];
    public function user_details()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
