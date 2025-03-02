<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    // Columns sa table
    protected $fillable = [
        'username', 
        'password'
    ];
}
