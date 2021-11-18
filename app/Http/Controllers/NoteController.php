<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Note;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // création de la relation many to many entre le rôle éditeur et le user (auteur de la note)
        $store->rolepluses()->attach(1);
        $store->users()->attach(Auth::user()->id);
        // boucle pour attacher la note avec ses tags
        foreach ($new_tab as $tag) {
            $new_tag = new Tag();
            $new_tag->tag = $tag;
            $new_tag->save();
            $store->tags()->attach($new_tag->id);
        }
        return redirect('/note');
    }

    public function like($id){
        $note = Note::find($id);
        $note->like += 1;
        $note->save();
        $like = new Like();
        $like->note_id = $note->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        $user = User::find(Auth::user()->id);
        $user->likes += 1;
        $user->save();
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
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
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
        $destroy->delete();
        return redirect('/note');
    }
}
