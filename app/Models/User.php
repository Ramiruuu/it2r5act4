<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tbluser';

    // Columns sa table
    protected $fillable = [
        'username', 
        'password'
    ];
}
