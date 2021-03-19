<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $table = 'lecturers';

    protected $fillable = [
        'nidn',
        'name',
        'department'
    ];

    public function profile()
    {
        return $this->morphOne('App\Models\Profile', 'profilable');
    }
}
