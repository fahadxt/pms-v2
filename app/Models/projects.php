<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    public $guarded = [];
    protected $table = 'projects';


    public function user(){
        return $this->belongsTo('App\Models\User', 'owner_id', 'id');
    }

    public function status(){
        return $this->belongsTo('App\Models\statuses', 'status_id', 'id');
    }

    public function users(){
        return $this->belongsToMany( 'App\Models\User', 'project_user', 'project_id', 'user_id' );
    }

    public function tasks()
    {
        return $this->morphMany('App\Models\tasks' , 'taskable');
    }
}
