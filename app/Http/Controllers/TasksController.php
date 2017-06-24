<?php

namespace TaskManager\Http\Controllers;

use function Couchbase\basicDecoderV1;
use Gate;
use TaskManager\ApiKeys;
use TaskManager\Http\Requests\TaskRequest;
use TaskManager\Repository\TasksRepository;
use TaskManager\Tasks;
use Illuminate\Http\Request;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TaskRequest $task)
    {

        Tasks::create(\request(['task', 'complete','user_id']));
        return redirect()->home();
    }

    /**
     * Display the specified resource.
     *
     * @param  \TaskManager\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \TaskManager\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Tasks $id
     * @return \Illuminate\Http\Response
     * @internal param Tasks $tasks
     */
    public function update(Request $request, Tasks $task)
    {
        $this->task->mark($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \TaskManager\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $id)
    {


        $id->delete();

    }


}
