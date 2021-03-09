<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageVisiMisi extends Model
{
    use HasFactory;

    protected $table = 'landing_page_visi_misis';

    protected $fillable = [
        'title1',
        'title2',
        'title3',
        'description1',
        'description2',
        'description3',
        'judul',
        'subjudul',
    ];
}
