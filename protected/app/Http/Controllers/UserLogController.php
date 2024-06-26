<?php

namespace App\Http\Controllers;

use App\Models\user_log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storeuser_logRequest;
use App\Http\Requests\Updateuser_logRequest;

class UserLogController extends Controller
{
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
     * @param  \App\Http\Requests\Storeuser_logRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeuser_logRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_log  $user_log
     * @return \Illuminate\Http\Response
     */
    public function show(user_log $user_log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_log  $user_log
     * @return \Illuminate\Http\Response
     */
    public function edit(user_log $user_log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_logRequest  $request
     * @param  \App\Models\user_log  $user_log
     * @return \Illuminate\Http\Response
     */
    public function update(Updateuser_logRequest $request, user_log $user_log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_log  $user_log
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_log $user_log)
    {
        //
    }
}
