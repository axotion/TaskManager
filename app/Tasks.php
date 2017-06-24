<?php

namespace TaskManager;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [ 'task', 'complete','user_id'];

    public function user()
    {
       return $this->belongsTo('\TaskManager\User', 'user_id');
    }
    public function setCompleteAttribute($value){
        $this->attributes['complete'] = $value ?? false;
    }
    public function setUserIdAttribute($value){
        $this->attributes['user_id'] = auth()->id();
    }
}
