<?php

namespace TaskManager\Http\Controllers;

use TaskManager\Repository\UserRepository;
use TaskManager\Services\ApiService;
use TaskManager\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    protected $api;
    public function __construct(UserRepository $user, ApiService $api)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->api = $api;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $api = $this->api->getApi();
        return view('profile', compact('api'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \TaskManager\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \TaskManager\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \TaskManager\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \TaskManager\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        auth()->logout();
        return redirect()->home();
    }
}
