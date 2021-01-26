<?php

namespace App\Models;

use App\Models\User;
use App\Models\units;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class teams extends Model
{
    use HasFactory;
    public $guarded = [];

    public function units(){
        return $this->belongsTo(units::class, 'unit_id', 'id');
    }
    
        
    public function users(){
        return $this->hasMany(User::class, 'team_id', 'id');
    }

}
