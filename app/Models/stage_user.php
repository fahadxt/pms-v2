<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stage_user extends Model
{
    protected $table = 'stage_user';
    // protected $fillable = ['stage_id','user_id'];
    public $incrementing = false;
    public $timestamps = false;

    public function stages_users()
    {
        return $this->belongsToMany(stages::class, 'stage_user', 'stage_id', 'user_id');
    }

}
