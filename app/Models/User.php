<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'profile_picture',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'dob',
        'gender',
        'role',
        'department',
        'about',
        'university_id',
        'username',
        'contact_number',
        'email',
        'home_address',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function services()
    {
        return $this->hasMany(Services::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }

    // Define a relationship to the messages the user has sent
    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    // Define a relationship to the messages the user has received
    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }

    // Combined relationship to get all messages associated with the user
    public function messages()
    {
        return $this->sentMessages()->union($this->receivedMessages());
    }
}
