<?php
/**
 * Created by PhpStorm.
 * User: me
 * Date: 17.06.17
 * Time: 21:34
 */
namespace TaskManager\Services;

use TaskManager\ApiKeys;

class ApiService
{

    protected $api;
    function __construct(\TaskManager\ApiKeys $api)
    {
    $this->api = $api;
    }

    public function generateKey($user_id=null)
    {
        $this->api->key = uniqid();
        $this->api->active = true;
        $this->api->user_id = auth()->id();
        $this->api->save();
        return $this->api->key;
    }

    public function getApi(){
        return ApiKeys::where('user_id', auth()->id())->first();
    }


    public function exists()
    {
      // dd($this->api->where('user_id', auth()->id())->first());
        if (count(ApiKeys::where('user_id', auth()->id())->first())) {
            return true;
        } else {
            return false;
        }

    }
}