<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosUser extends Model
{
    protected $table = 'pos_users';

    protected $fillable = [
        'user_code',
        'username',
        'name',
        'full_name',
        'email',
        'role',
        'status',
        'avatar',
    ];
}
