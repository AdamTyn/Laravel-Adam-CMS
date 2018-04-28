<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = [
        'name', 'password', 'role', 'status', 'last_ip', 'last_login', 'last_logout', 'email',
    ];
    protected $guarded = ['id'];
}
