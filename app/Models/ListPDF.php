<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPDF extends Model
{
    use HasFactory;
    protected $table = "pdflist";
    protected $fillable = [
        'title',
        'file',
        'user_id',
    ];
}
