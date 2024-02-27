<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = "events";
    protected $fillable = [
        'title',
        'slug',
        'start_date',
        'end_date',
        'address',
        'is_publish',
    ];
}
