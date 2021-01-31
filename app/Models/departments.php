<?php

namespace App\Models;

use App\Models\units;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class departments extends Model
{
    use HasFactory;
    public $guarded = [];

    public function units(){
        return $this->hasMany(units::class, 'department_id', 'id');
    }

    public function users(){
        return $this->hasMany(User::class, 'department_id', 'id');
    }


}
