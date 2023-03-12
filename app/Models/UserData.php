<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $table = 'userdata';

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];
}
