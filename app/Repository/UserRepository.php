<?php
/**
 * Created by PhpStorm.
 * User: me
 * Date: 17.06.17
 * Time: 23:57
 */

namespace TaskManager\Repository;


use TaskManager\ApiKeys;
use TaskManager\User;

class UserRepository
{
    protected $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }



}