<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageAbout extends Model
{
    use HasFactory;

    protected $table = 'landing_page_abouts';

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
    ];
}
