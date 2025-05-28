<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    protected $fillable = [
        'firstname',
        'lastname',
        'reg_no',
        'username',
        'email',
        'password',
        'dept',
        'gender',
    ];
}
