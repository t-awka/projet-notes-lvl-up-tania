<?php

namespace App\Http\Controllers;

use App\Models\Note_role_user;
use App\Models\Role;
use Illuminate\Http\Request;

class NoteRoleUserController extends Controller
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
    public function create(Request $request)
    {
        $note_role_user_pivots = Role::create([
            'note_id' => $request->note_id,
			'roleplus_id' => $request->roleplus_id,
			'user_id' => $request->user_id,
        ]);
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
     * @param  \App\Models\Note_role_user  $note_role_user
     * @return \Illuminate\Http\Response
     */
    public function show(Note_role_user $note_role_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note_role_user  $note_role_user
     * @return \Illuminate\Http\Response
     */
    public function edit(Note_role_user $note_role_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note_role_user  $note_role_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note_role_user $note_role_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note_role_user  $note_role_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note_role_user $note_role_user)
    {
        //
    }
}
