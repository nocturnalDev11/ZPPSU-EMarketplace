<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'prod_id',
        'user_id',
        'comment_content',
        'parent_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(ProdComment::class, 'parent_id');
    }
}
