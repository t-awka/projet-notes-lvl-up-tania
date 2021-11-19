@extends('layouts.index')
@section('content')
    <section class="max-w-xl p-6 mt-16 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-20">Partager une note</h2>

        <form action="/share/{{ $notes->id }}/shared" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 mb-10">
                <div class="mx-auto">
                    <label class="text-gray-700 dark:text-gray-200" for="user">Sélectionnez un utilisateur :</label>
                    <select class="border border-none rounded bg-yellow-100" name="user" id="user">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-between mt-20">
                <a href="/note" class="text-red-400 dark:text-blue-400 hover:underline">Retour</a>
                
                <button
                        class="px-4 py-2 text-white transition-colors duration-200 transform bg-red-400 rounded-md hover:bg-yellow-300 focus:outline-none focus:bg-yellow-300">Partager</button>
            </div>
        </form>
    </section>
@endsection
