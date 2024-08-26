<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'user_id',
        'services_picture',
        'services_title',
        'services_fee',
        'services_category',
        'services_description'
    ];

    public function services()
    {
        return $this->hasMany(Services::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
