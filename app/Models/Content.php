<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'background',
        'title',
        'subtitle',
        'about_title',
        'about_subtitle',
        'footer'
    ];
}
