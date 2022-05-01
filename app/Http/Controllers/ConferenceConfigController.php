<?php

namespace App\Http\Controllers;

use App\Models\ConferenceConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConferenceConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(ConferenceConfig::query()->first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConferenceConfig  $conferenceConfig
     * @return \Illuminate\Http\Response
     */
    public function show(ConferenceConfig $conferenceConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConferenceConfig  $conferenceConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return response(ConferenceConfig::query()->first()->update(['name' => $request->get('name'), 'deadline' => $request->get('deadline')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConferenceConfig  $conferenceConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConferenceConfig $conferenceConfig)
    {
        //
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'username'=>$request->get('username'),
            'password'=>$request->get('password')
        ])){
            $token=Auth::user()->createToken('myToken'.Auth::user()->id)->plainTextToken;
            $user = Auth::user();
            return \response(['user'=> $user,'token'=>$token]);
        }

        else {
            return \response('error with the username or password', 401);
        }
    }

    public function logout()
    {
        return auth()->user()->tokens()->delete();
    }
}
