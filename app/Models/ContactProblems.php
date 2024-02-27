<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactProblems extends Model
{
    use HasFactory;
    protected $table = "contact_problems";
    protected $fillable = [
        'problem',
        'user_id',
    ];
}
