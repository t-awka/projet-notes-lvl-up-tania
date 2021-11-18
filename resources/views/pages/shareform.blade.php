@extends('layouts.index')
@section('content')
    <section>
        <div class="container w-full flex justify-center">
            <form class="flex mt-20 flex-col" action="/share/{{$notes->id}}/shared" method="POST">
                @csrf
                <label for="user"> personne:
                    <select name="user" id="user">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </label>

                <button type="submit">Partager</button>
            </form>
        </div>
    </section>
@endsection