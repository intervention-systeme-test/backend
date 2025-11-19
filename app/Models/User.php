<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'account_type', // 'private' or 'pro'
        'address',
        'company_name', // for pro accounts
        'cfe_number', // for pro accounts
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function isPro()
    {
        return $this->account_type === 'pro';
    }
}

