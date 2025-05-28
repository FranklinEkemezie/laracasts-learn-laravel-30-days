<?php

namespace App\Models;

use Database\Factories\EmployerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /** @use HasFactory<EmployerFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
