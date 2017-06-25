<?php

namespace TaskManager\Http\Controllers;

use TaskManager\Http\Requests\LoginForm;
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, LoginForm $form)
    {
        if (auth()->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return redirect()->home();
        } else {
            return redirect()->back()->withErrors('Invalid email or password');
        }
    }
}
