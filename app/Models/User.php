<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\{Factories\HasFactory, Relations\hasMany};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = [];

    // public function create_user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'create_user_id', 'id');
    // }

    // public function update_user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'update_user_id', 'id');
    // }

    public function wishlist(): hasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    public function rating(): hasMany
    {
        return $this->hasMany(Rating::class);
    }


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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
