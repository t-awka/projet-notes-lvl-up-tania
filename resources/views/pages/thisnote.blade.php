@extends('layouts.index')
@section('content')
    <div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 mt-20">
        <div class="flex items-center justify-between">
            <span class="text-sm font-light text-gray-600 dark:text-gray-400">Mar 10, 2019</span>
            <div class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform rounded cursor-pointer hover:bg-gray-500">
                @foreach ($show->tags as $tag)
                    <span class="px-3 py-1 text-xs text-gray-600 uppercase bg-yellow-300 rounded-full dark:bg-indigo-300 dark:text-indigo-900 mr-2">{{$tag->tag}}</span>
                @endforeach
            </div>
        </div>

        <div class="mt-2">
            <a href="#" class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">{{$show->title}}</a>
            <p class="mt-2 text-gray-600 dark:text-gray-300">{!!$show->content!!}</p>
        </div>
        
        <div class="flex items-center justify-between mt-4">
            <a href="/allnote" class="text-red-400 dark:text-blue-400 hover:underline">Retour</a>

            <div class="flex items-center">
                <p class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">
                    écrit par
                    @foreach ($show->users as $user)
                        {{$user->name}}
                    @endforeach
                </p>
            </div>
        </div>
    </div>
@endsection
