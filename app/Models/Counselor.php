<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    use HasFactory;

    protected $table = 'counselors';

    protected $fillable = [
        'name',
        'phone',
    ];

    public function counselings()
    {
        return $this->hasMany(Counseling::class);
    }
}
