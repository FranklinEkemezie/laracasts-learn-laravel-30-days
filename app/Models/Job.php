<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model {

    protected $table = 'job_listings';
    protected $fillable = ['title', 'salary'];
}
