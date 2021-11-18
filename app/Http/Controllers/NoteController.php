<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Note;
use App\Models\Note_role_user;
use App\Models\Note_tag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();
        // $perso = DB::table('note_role_user_pivots')->where('user_id', Auth::user()->id)->get();
        return view('pages.personnal', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.createnote');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ["required"],
            'content' => ["required"],
        ]);
        // transfert des tags dans un nouveau tableau pour vérifier si leur valeur n'est pas égale à null
        $tab_tag = [$request->tag1, $request->tag2, $request->tag3];
        $new_tab = [];
        foreach ($tab_tag as $tag) {
            $i = array_search($tag, $tab_tag);
            if ($tag != null) {
                array_push($new_tab, $tag);
            }
        }

        // création d'une nouvelle note
        $store = new Note();
        $store->title = $request->title;
        $store->content = $request->content;
        $store->save();

        // boucle pour attacher la note avec ses tags
        foreach ($new_tab as $tag) {
            $new_tag = new Tag();
            $new_tag->tag = $tag;
            $new_tag->save();
            $store->tags()->attach($new_tag->id);
        }

        DB::table("note_role_user_pivots")->insert([
            [
                "note_id" => $store->id,
                "roleplus_id" => 1,
                "user_id" => Auth::user()->id,
            ]
        ]);

        return redirect('/note');
    }

    public function like($id){
        $note = Note::find($id);
        $note->aime += 1;
        $note->save();
        DB::table("likes")->insert([
            [
                "note_id" => $note->id,
                "user_id" => Auth::user()->id,
            ]
        ]);
        $user = User::find(Auth::user()->id);
        $user->aime += 1;
        $user->save();
        return redirect()->back();
    }

    public function unlike($id){
        $user = User::find(Auth::user()->id);
        $note = Note::find($id);
        $like = Like::where('note_id', $note->id)->where('user_id', $user->id)->first();
        $like->delete();
        $user->aime -= 1;
        $user->save();
        $note->aime -= 1;
        $note->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Note::find($id);
        return view("pages.thisnote",compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Note::find($id);
        // $tags = Note_tag::where('note_id', $edit->id)->get();
        $tabtags = [];
        foreach ($edit->tags as $tag) {
            array_push($tabtags, $tag->tag);
        }
        return view('pages.editnote', compact('edit', 'tabtags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Note::find($id);
        $tags = Note_tag::where('note_id', $update->id)->get();
        foreach ($tags as $tag) {
            $tag->delete();
        }
        $tab_tag = [$request->tag1, $request->tag2, $request->tag3];
        $new_tab = [];
        foreach ($tab_tag as $tag) {
            $i = array_search($tag, $tab_tag);
            if ($tag != null) {
                array_push($new_tab, $tag);
            }
        }
        $update->title = $request->title;
        $update->content = $request->content;
        $update->save();

        foreach ($new_tab as $tag) {
            $new_tag = new Tag();
            $new_tag->tag = $tag;
            $new_tag->save();
            $update->tags()->attach($new_tag->id);
        }

        $update_pivots = Note_role_user::where('note_id', $update->id)->where("user_id", Auth::user()->id)->first();
        $update_pivots->roleplus_id = 2;
        $update_pivots->save();

        return redirect('/note/'.$update->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Note::find($id);
        $likes = Like::where('note_id', $destroy->id)->get();
        foreach ($likes as $like) {
            $user = User::find($like->user_id);
            $user->aime -= 1;
            $user->save();
            $like->delete();
        }
        $tags = Note_tag::where('note_id', $destroy->id)->get();
        foreach ($tags as $tag) {
            $tag->delete();
        }
        $noteroleusers = Note_role_user::where('note_id', $destroy->id)->get();
        foreach ($noteroleusers as $noteroleuser) {
            $noteroleuser->delete();
        }
        $destroy->delete();
        return redirect('/note');
    }
}
