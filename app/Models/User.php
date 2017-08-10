<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email', 'password', 'permissions', 'last_login', 'first_name', 'last_name', 'created_at', 'updated_at'
    ];
    protected $table = 'users';
}
