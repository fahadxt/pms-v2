<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    /**
     * Get the parent stageable model (stages).
     */
    public function stageable()
    {
        return $this->morphTo();
    }


    public function users(){
        return $this->belongsToMany( 'App\Models\User', 'stage_user', 'stage_id', 'user_id' );
    }
}
