<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Share;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();
        $user = User::find(Auth::user()->id);
        $shares = $user->shares;
        $shared = [];
        foreach ($shares as $share) {
            array_push($shared, $share);
        }

        $tab = DB::table('likes')->where('user_id', Auth::user()->id)->get();

        return view('pages.share', compact('notes', 'shared', 'tab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

    public function sharecreate($id){
        $users = User::where('id' , '!=', Auth::user()->id)->get();
        $notes = Note::find($id);
        return view('pages.shareform', compact('users', 'notes'));
    }

    public function share(Request $request, $id){
        $share = new Share;
        $note = Note::find($id);
        $share->user_id = $request->user;
        $share->note_id = $note->id;
        $share->save();
        return redirect('/note')->with('info', 'Partage effectué avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function show(Share $share)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function edit(Share $share)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Share $share)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function destroy(Share $share)
    {
        //
    }
}
