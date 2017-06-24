<?php
/**
 * Created by PhpStorm.
 * User: me
 * Date: 18.06.17
 * Time: 00:03
 */

namespace TaskManager\Repository;


use TaskManager\Tasks;

class TasksRepository
{
    protected $task;

    function __construct(Tasks $task)
    {
        $this->task = $task;
    }
    public function allTask($pages = 5){
       return Tasks::where('user_id', auth()->id())->orderBy('id', 'desc')->Paginate($pages);
    }
    public function mark($task){
        $task =  Tasks::where('id', $task->id)->first();
        $task->complete=true;
        $task->save();
        return true;
    }

}