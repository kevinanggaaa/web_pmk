<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageCount extends Model
{
    use HasFactory;
    protected $table = 'landing_page_counts';

    protected $fillable = [
        'students',
        'lecturers',
        'alumnis',
        'events',
    ];
}
