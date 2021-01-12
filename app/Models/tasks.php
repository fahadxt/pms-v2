<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tasks extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $guarded = [];
    protected $dates = ['due_on'];

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
