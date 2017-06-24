<?php

namespace TaskManager;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ApiKeys extends Model
{
    protected $user;
    public function user(){
        return $this->hasOne('\TaskManager\User', 'id');
    }
    public function tasks(){
        $this->hasMany('\TaskManager\Tasks', 'user_id');
    }


}
