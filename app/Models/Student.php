<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'nrp',
        'department',
        'year_entry',
        'year_graduate'
    ];

    public function profile()
    {
        return $this->morphOne('App\Models\Profile', 'profilable');
    }
}
