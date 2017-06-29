<?php
/**
 * Created by PhpStorm.
 * User: me
 * Date: 18.06.17
 * Time: 00:03
 */

namespace TaskManager\Repository;


use Carbon\Carbon;
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
     * @return mixed
     */
    public function allTask(){
        return $this->task->where('user_id', auth()->id())->orderBy('created_at', 'desc')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('d.m.Y');
        });
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