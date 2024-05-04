<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judul extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'about_title',
        'about_subtitle'
    ];
}
