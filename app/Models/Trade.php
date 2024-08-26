<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $fillable = [
        'user_id',
        'trade_picture',
        'trade_title',
        'trade_category',
        'trade_description',
        'trade_status',
        'trade_type',
        'trade_value',
        'trade_conditions',
        'trade_duration'
    ];

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
