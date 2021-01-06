<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class statuses extends Model
{
    use SoftDeletes;
    
    public $guarded = [];
}
