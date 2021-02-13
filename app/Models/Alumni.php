<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumnis';

    protected $fillable = [
        'email',
        'name',
        'department',
        'job',
    ];

    public function profile()
    {
        return $this->morphOne('App\Models\Profile', 'profilable');
    }
}
