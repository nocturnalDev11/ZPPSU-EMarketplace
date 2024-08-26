<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_id',
        'recipient_id',
        'content',
        'image',
        'video',
        'content_link',
        'created_at'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public static function latestForUser(int $userId)
    {
        return static::where('sender_id', $userId)
            ->orWhere('recipient_id', $userId)
            ->latest('created_at')
            ->first();
    }
}