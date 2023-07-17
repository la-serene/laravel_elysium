<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'email',
        'email_verified_at',
        'password',
        'avatar',
        'remember_token',
    ];

    // Additional model methods or relationships can be added here
}
