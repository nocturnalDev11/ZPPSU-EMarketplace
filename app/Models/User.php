<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasRole($role)
    {
        $roles = explode(',', $this->roles);
        return in_array($role, $roles);
    }

    public function setRoles(array $roles)
    {
        $this->roles = implode(',', $roles);
        $this->save();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }

    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }

    public function messages()
    {
        return $this->sentMessages()->union($this->receivedMessages());
    }

    public function postComments()
    {
        return $this->hasMany(PostComment::class);
    }

    public function productComments()
    {
        return $this->hasMany(ProdComment::class);
    }

    public function serviceComments()
    {
        return $this->hasMany(ServiceComment::class);
    }

    public function tradeComments()
    {
        return $this->hasMany(TradeComment::class);
    }
}
