<?php

namespace TaskManager\Http\Controllers;

use TaskManager\Services\ApiService;

class ApiKeysController extends Controller
{
    protected $api;
    function __construct(ApiService $api)
    {
        $this->api = $api;
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Request $request
     */
    public function store()
    {
        if(!$this->api->exists()) {
            $this->api->generateKey();
            session()->flash('suc_key', 'API key added successfully');
            return redirect()->back();
        }
        return redirect()->back()->withErrors('Key already exists');
    }
}
