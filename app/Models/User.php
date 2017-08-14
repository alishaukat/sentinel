<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use \Cartalyst\Sentinel\Users\EloquentUser;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class User extends EloquentUser
{
    use Notifiable;
}
