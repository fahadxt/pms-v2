<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tasks extends Model
{
    use SoftDeletes;
    
    public $guarded = [];

    public function taskable()
    {
        return $this->morphTo();
    }

    public function status(){
        return $this->belongsTo('App\Models\statuses', 'status_id', 'id');
    }

    public function assignedTo(){
        return $this->belongsTo('App\Models\User', 'assigned_to', 'id');
    }


}
