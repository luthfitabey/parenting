<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Ensure 'type' is stored as a string and retrieved correctly.
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $value, // Return as stored (string)
            set: fn ($value) => strtolower($value) // Ensure it's stored in lowercase
        );
    }

    /**
     * Check if user is an admin.
     */
    public function isAdmin()
    {
        return $this->type === 'admin';
    }

    /**
     * Check if user is a manager.
     */
    public function isManager()
    {
        return $this->type === 'manager';
    }

    /**
     * Check if user is a regular user.
     */
    public function isUser()
    {
        return $this->type === 'user';
    }
}
