<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'trade_id',
        'user_id',
        'comment_content',
        'parent_id',
    ];

    public function trade()
    {
        return $this->belongsTo(Trade::class, 'trade_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(TradeComment::class, 'parent_id');
    }
}
