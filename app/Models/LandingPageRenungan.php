<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageRenungan extends Model
{
    use HasFactory;

    protected $table = 'landing_page_renungans';

    protected $fillable = [
        'title',
        'lokasiFirman',
        'isiFirman',
        'bacaan',
    ];
}
