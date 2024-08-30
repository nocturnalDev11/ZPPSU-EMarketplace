<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'services_id',
        'user_id',
        'comment_content',
        'parent_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'services_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(ServiceComment::class, 'parent_id');
    }
}
