<?php

namespace App\Http\Controllers;

use App\Models\InvitationRequest;
use Illuminate\Http\Request;

class InvitationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response(InvitationRequest::query()->where('name', 'like', '%'.$request->get('search').'%')->with(['firstMediaOnly'])->orderByDesc('updated_at')->paginate(20, ['*'], 'page', $request->get('page')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inv = InvitationRequest::query()->create($request->only(['name', 'degree', 'job', 'occupation', 'institution', 'country', 'email', 'category', 'presentation', 'telephone']));
        $inv->addMediaFromRequest('attachment')->toMediaCollection();
        return response('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvitationRequest  $invitationRequest
     * @return \Illuminate\Http\Response
     */
    public function show(InvitationRequest $invitationRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvitationRequest  $invitationRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvitationRequest $invitationRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvitationRequest  $invitationRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvitationRequest $invitationRequest)
    {
        //
    }
}
