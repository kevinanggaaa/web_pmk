<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counseling extends Model
{
    use HasFactory;

    protected $table = 'counselings';

    protected $fillable = [
        'user_id',
        'counselor_id',
        'date_time',
        'topic'
    ];
}
