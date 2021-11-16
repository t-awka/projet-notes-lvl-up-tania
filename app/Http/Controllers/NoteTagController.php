<?php

namespace App\Http\Controllers;

use App\Models\Note_tag;
use App\Models\Role;
use Illuminate\Http\Request;

class NoteTagController extends Controller
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
        $note_tag_pivots = Role::create([
            'note_id' => $request->note_id,
			'tag_id' => $request->tag_id,
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
     * @param  \App\Models\Note_tag  $note_tag
     * @return \Illuminate\Http\Response
     */
    public function show(Note_tag $note_tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note_tag  $note_tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Note_tag $note_tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note_tag  $note_tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note_tag $note_tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note_tag  $note_tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note_tag $note_tag)
    {
        //
    }
}
