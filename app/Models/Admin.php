<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Fillable attributes
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Hidden attributes
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Casts
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

