<?php

namespace TaskManager\Http\Controllers;

use TaskManager\Repository\TasksRepository;
use TaskManager\Tasks;

class TasksController extends Controller
{
    protected $api;
    protected $task;
    function __construct(\TaskManager\Services\ApiService $api, TasksRepository $task)
    {
        $this->api = $api;
        $this->task = $task;
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if (auth()->guest()) {
                return view('home');
            } else {
                $tasks = $this->task->allTask(9);
                return view('tasks', compact('tasks'));
            }

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store()
    {

        Tasks::create(\request(['task', 'complete','user_id']));
        return redirect()->home();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Tasks $task
     * @return bool
     * @internal param Request $request
     * @internal param Tasks $id
     * @internal param Tasks $tasks
     */
    public function update(Tasks $task)
    {
        $this->task->mark($task);
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tasks $id
     * @return bool
     * @internal param Tasks $tasks
     */
    public function destroy(Tasks $id)
    {
        $id->delete();
        return true;
    }


}
