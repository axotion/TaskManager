<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::post('/tasks', function (Request $request) {
    if ($user = \TaskManager\ApiKeys::where('key', $request->input('key'))->first()) {
        return response()->json([
            'Tasks' => \TaskManager\Tasks::where('user_id', $user->user_id)->orderBy('created_at', 'desc')->select('tasks.id','tasks.complete','tasks.task')->get()->groupBy(function($data){
                return Carbon\Carbon::parse($data->created_at)->format('d.m.Y');
            })
        ]);
    } else {
        return response()->json([
            'API_KEY' => 'Not found',
        ]);
    }
});

