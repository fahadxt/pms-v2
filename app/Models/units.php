<?php

namespace App\Models;

use App\Models\teams;
use App\Models\departments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class units extends Model
{
    use HasFactory;
    public $guarded = [];

    
    public function department(){
        return $this->belongsTo(departments::class, 'department_id', 'id');
    }

    
    public function teams(){
        return $this->hasMany(teams::class, 'unit_id', 'id');
    }

}
