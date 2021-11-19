@extends('layouts.index')
@section('content')
    <div class="grid grid-cols-4 gap-4 mt-20">
        @foreach ($notes as $note)
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
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{!! Str::limit($note->content, 15, '...') !!}</p>
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

                        <div class="flex items-center justify-center mt-4">
                            @auth
                                @php
                                    $check = $tab->where('note_id', $note->id)->first();
                                @endphp
                                @if (Auth::user()->aime < 10)
                                    @if ($check)
                                        <form action="/note/unlike/{{ $note->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="mr-2 text-xl">
                                                ❤
                                            </button>
                                        </form>
                                    @else
                                        <form action="/note/like/{{ $note->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="mr-2 text-xl">
                                                ♡
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            @endauth
                            <span class="mr-5">{{ $note->aime }}</span>

                            <a href="/note/{{ $note->id }}"
                                class="px-5 mr-2 font-semibold text-gray-100 transition-colors duration-200 transform bg-indigo-500 rounded-md hover:bg-gray-700">Lire</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
