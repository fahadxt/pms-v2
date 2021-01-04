<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project_user extends Model
{
    protected $table = 'project_user';
    protected $fillable = ['project_id','user_id'];
    public $incrementing = false;
    public $timestamps = false;

    public function projects_users()
    {
        return $this->belongsToMany(projects::class, 'project_user', 'project_id', 'user_id');
    }

}
