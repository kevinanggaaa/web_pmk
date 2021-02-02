<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationalRecord extends Model
{
    use HasFactory;

    protected $table = 'organizational_records';

    protected $fillable = [
        'position',
        'category',
        'year_start',
        'year_end'
    ];
}
