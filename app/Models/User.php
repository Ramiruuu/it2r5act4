<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users'; // 🔥 Make sure this matches your actual table name!

    protected $fillable = [
        'username', 
        'password'
    ];
}

