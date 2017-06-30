<?php

namespace TaskManager\Http\Controllers;

use TaskManager\Services\ApiService;

class UserController extends Controller
{
    protected $user;
    protected $api;
    public function __construct(ApiService $api)
    {
        $this->middleware('auth');
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
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     * @internal param User $user
     */
    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
