<?php

namespace TaskManager\Http\Controllers;

use TaskManager\ApiKeys;
use Illuminate\Http\Request;
use TaskManager\Services;
class ApiKeysController extends Controller
{
    protected $api;
    function __construct( \TaskManager\Services\ApiService $api)
    {
        $this->api = $api;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($this->api->exists());
       // dd($this->api->exists());
        if(!$this->api->exists()) {
            $this->api->generateKey();
            session()->flash('suc_key', 'API key added successfully');
            return redirect()->back();
        }

        return redirect()->back()->withErrors('Key already exists');

    }

    /**
     * Display the specified resource.
     *
     * @param  \TaskManager\ApiKeys  $apiKeys
     * @return \Illuminate\Http\Response
     */
    public function show(ApiKeys $apiKeys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \TaskManager\ApiKeys  $apiKeys
     * @return \Illuminate\Http\Response
     */
    public function edit(ApiKeys $apiKeys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \TaskManager\ApiKeys  $apiKeys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApiKeys $apiKeys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \TaskManager\ApiKeys  $apiKeys
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApiKeys $apiKeys)
    {
        //
    }
}
