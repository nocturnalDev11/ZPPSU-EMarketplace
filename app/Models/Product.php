<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'prod_picture',
        'prod_name',
        'prod_price',
        'prod_category',
        'prod_condition',
        'prod_description',
        'edited_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function comments()
    {
        return $this->hasMany(ProdComment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
