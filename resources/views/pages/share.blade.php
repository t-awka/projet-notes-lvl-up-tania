@extends('layouts.index')
@section('content')

    <div class="flex justify-center mt-10">
        <a href="/createnote"
            class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-400 rounded-md hover:bg-yellow-300 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-80">
            créer une nouvelle note
        </a>
    </div>

    <div class="grid grid-cols-4 gap-4 mt-15">
        {{-- @foreach (Auth::user()->notes as $note)
            @foreach ($shares as $share)
                @if ($share->note_id == $note->id)
                    <div class="mt-10">
                        <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                            <div class="flex justify-end">
                                @foreach ($note->tags as $tag)
                                    <span
                                        class="px-3 py-1 text-xs text-gray-600 uppercase bg-yellow-300 rounded-full dark:bg-indigo-300 dark:text-indigo-900 mr-2">{{ $tag->tag }}</span>
                                @endforeach
                            </div>

                            <div>
                                <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $note->title }}</h1>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{!! Str::limit($note->content, 40, '...') !!}</p>
                            </div>

                            <div>
                                <div class="flex items-center mt-2 text-gray-700 dark:text-gray-200">
                                    <span>Ecrit par:</span>
                                    <p class="mx-2 text-gray-500 cursor-pointer dark:text-blue-400 hover:underline">
                                        @foreach ($note->users as $user)
                                            {{ $user->name }}
                                        @endforeach
                                    </p>
                                </div>

                                <div class="flex">
                                    @if (Auth::user()->likes < 10)
                                        <form action="/note/like/{{ $note->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="mr-2 text-xl">
                                                ♡
                                            </button>
                                        </form>
                                    @endif
                                    <span class="mr-5">{{ $note->like }}</span>
                                </div>

                                <div class="flex items-center justify-center mt-4">
                                    <a href="/note/{{ $note->id }}"
                                        class="px-5 mr-2 font-semibold text-gray-100 transition-colors duration-200 transform bg-indigo-500 rounded-md hover:bg-gray-700">Lire</a>

                                    <a href="/share/{{ $note->id }}/sharing"
                                        class="px-5 mr-2 font-semibold text-gray-100 transition-colors duration-200 transform bg-gray-400 rounded-md hover:bg-gray-700">Partager</a>

                                    <a href="/note/{{ $note->id }}/edit"
                                        class="px-5 mr-2 font-semibold text-gray-100 transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-gray-700">Edit</a>

                                    <form action="/note/{{ $note->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-5 font-semibold text-gray-100 transition-colors duration-200 transform bg-red-500 rounded-md hover:bg-gray-700">Delete</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach --}}

        {{-- @endforeach --}}
        
        @foreach ($notes as $note)
            <h1>{{$note->shares}}</h1>
        @endforeach
        
    </div>
@endsection
