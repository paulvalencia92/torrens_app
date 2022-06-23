<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Self_;

class User extends Authenticatable
{
    const USER = 'user';
    const ADMIN = 'admin';

    protected $casts = [
        'status' => 'boolean',
        'email_verified_at' => 'datetime',
    ];


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'status',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public static function rolesType()
    {
        return [
            User::USER,
            User::ADMIN,
        ];
    }
}
