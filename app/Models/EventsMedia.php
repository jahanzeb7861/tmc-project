<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsMedia extends Model
{
    use HasFactory;
    protected $table = "events_media";
    protected $fillable = [
        'file_name',
        'path',
        'event_id',
        'type'
    ];
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_media', 'media_id', 'event_id')->withTimestamps();
    }
}
