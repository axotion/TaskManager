<?php

namespace TaskManager\Http\Controllers;

use Illuminate\Http\Request;
use TaskManager\Http\Requests\RegisterForm;
use TaskManager\Mail\WelcomeNewUser;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param RegisterForm $form
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RegisterForm $form)
    {
       $user = \TaskManager\User::create($request->only('email','name','password'));
       auth()->login($user);
       \Mail::to($user)->send(new WelcomeNewUser($user));
       return redirect()->home();
    }

}
