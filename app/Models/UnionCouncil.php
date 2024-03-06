<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnionCouncil extends Model
{
    use HasFactory;
    protected $table = "union_councils";
    protected $fillable = [
        'uc',
        'uc_name',
        'chairman_vc',
        'contact_no',
    ];
}
