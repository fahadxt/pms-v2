<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class projects extends Model
{
    use HasFactory;
    use SoftDeletes;


    public $guarded = [];
    protected $table = 'projects';
    protected $dates = ['project_due_on'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'owner_id', 'id');
    }

    public function status(){
        return $this->belongsTo('App\Models\statuses', 'status_id', 'id');
    }



    public function tasks()
    {
        return $this->morphMany('App\Models\tasks' , 'taskable');
    }

    /**
     * Get all of the post's comments.
     */
    public function stages()
    {
        return $this->morphMany(Stage::class, 'stageable');
    }

    // function to remove related data (morphMany)
    public static function boot() {
        parent::boot();

        static::deleting(function($project) {
             $project->tasks()->delete();
        });
    }
}
