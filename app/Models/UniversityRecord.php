<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'first_name',
        'last_name',
        'role',
    ];
}
