<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageTestimony extends Model
{
    use HasFactory;

    protected $table = 'landing_page_testimonies';

    protected $fillable = [
        'name',
        'position',
        'quote',
        'image',
    ];
}
