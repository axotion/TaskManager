<?php

namespace TaskManager\Http\Controllers;

use TaskManager\Http\Requests\LoginForm;
use TaskManager\User;
use Illuminate\Http\Request;
use TaskManager\Services\CaptchaService;

class LoginController extends Controller
{
    protected $captcha;
    public function __construct(CaptchaService $captcha)
    {
        $this->captcha = $captcha;
        $this->middleware('guest');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, LoginForm $form)
    {
        if(auth()->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
            return redirect()->home();
        }
        else{
            return redirect()->back()->withErrors('Invalid email or password');
        }
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
        //
    }
}
