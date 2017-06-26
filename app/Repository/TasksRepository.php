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

    /**
     * TasksRepository constructor.
     * @param Tasks $task
     */
    function __construct(Tasks $task)
    {
        $this->task = $task;
    }

    /**
     * @param int $pages
     * @return mixed
     */
    public function allTask($pages = 5){
       return $this->task->where('user_id', auth()->id())->orderBy('id', 'desc')->Paginate($pages);
    }

    /**
     * @param Tasks $c_task
     */
    public function mark(Tasks $c_task){
        $c_task =  $this->task->where('id', $c_task->id)->first();
        $c_task->complete=true;
        $c_task->save();

    }

}