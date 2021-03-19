<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageHome extends Model
{
    use HasFactory;

    protected $table = 'landing_page_homes';

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
    ];
}
