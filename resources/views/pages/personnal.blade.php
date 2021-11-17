@extends('layouts.index')
@section('content')

    <div class="flex justify-center mt-10">
        <a href="/createnote" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-400 rounded-md hover:bg-yellow-300 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-80">
            créer une nouvelle note
        </a>
    </div>

    <div class="grid grid-cols-4 gap-4 mt-15">
        @foreach ($notes as $note)
            <div class="mt-10">
                <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-light text-gray-800 dark:text-gray-400">Courses and MOOCs</span>
                        <span class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">psychology</span>
                    </div>

                    <div>
                        <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{$note->title}}</h1>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{!! Str::limit($note->content, 40, '...') !!}</p>
                    </div>

                    <div>
                        <div class="flex items-center mt-2 text-gray-700 dark:text-gray-200">
                            <span>Visit on:</span>
                            <a class="mx-2 text-blue-600 cursor-pointer dark:text-blue-400 hover:underline">edx.org</a>
                            <span>or</span>
                            <a class="mx-2 text-blue-600 cursor-pointer dark:text-blue-400 hover:underline">classcentral.com</a>
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <a class="mr-2 text-gray-800 cursor-pointer dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                                <svg class="w-5 h-5 fill-current" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                                    <path d='M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z'/>
                                </svg>
                            </a>

                            <a href="/note/{{ $note->id }}"
                                class="px-5 mr-2 font-semibold text-gray-100 transition-colors duration-200 transform bg-indigo-500 rounded-md hover:bg-gray-700">Lire</a>

                            
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
        @endforeach
    </div>
@endsection