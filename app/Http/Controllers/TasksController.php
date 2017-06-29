<?php

namespace TaskManager\Http\Controllers;

use TaskManager\Http\Requests\TaskRequest;
use TaskManager\Repository\TasksRepository;
use TaskManager\Tasks;

class TasksController extends Controller
{
    protected $task;
    function __construct( TasksRepository $task)
    {
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
                $archives = $this->task->allTask();
               return view('tasks', compact( 'archives'));
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
     * @param TaskRequest $task
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(TaskRequest $task)
    {
        Tasks::create(\request(['task', 'complete','user_id']));
        return redirect()->home();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Tasks $task
     * @return void
     * @internal param Request $request
     * @internal param Tasks $id
     * @internal param Tasks $tasks
     */
    public function update(Tasks $task)
    {
        $this->task->mark($task);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param Tasks $id
     * @return void
     * @internal param Tasks $tasks
     */
    public function destroy(Tasks $id)
    {
        $id->delete();
    }


}
