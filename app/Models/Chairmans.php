<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chairmans extends Model
{
    use HasFactory;
    protected $table = "chairmans";
    protected $fillable = [
        'UC',
        'UC_name',
        'chairman_name',
        'contact', 
    ];
}
