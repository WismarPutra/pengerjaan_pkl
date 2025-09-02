<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

     protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function username() {
        return 'username'; // field login Anda
    }


    // 🔐 Role-checking helpers
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isHcm(): bool
    {
        return $this->role === 'hcm';
    }

    public function isEmployee(): bool
    {
        return $this->role === 'employee';
    }

    public function isBod(): bool
    {
        return $this->role === 'bod';
    }
    
    public function hasRole($role) {
        return $this->role == $role;
    }
}