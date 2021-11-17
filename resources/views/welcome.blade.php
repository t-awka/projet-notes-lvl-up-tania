@extends('layouts.index')
@section('content')
    <section>
        <div class="relative flex items-top justify-center min-h-screen sm:items-center ">
            <div class="row">
                <div class="col">
                    <div class="flex justify-center">
                        <img xmlns="http://www.w3.org/2000/svg" width="300px" src="{{ asset('assets/img/logos.png') }}" alt="logo">
                    </div>
                </div>
        
                <div class="col">
                    <div class="flex text-red-400 mt-5">
                        <p class="text-5xl font-bold">Bienvenue dans Notey</p>
                    </div>
                </div>

                <div class="col flex justify-center mt-20">
                    <a href="/createnote" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-400 rounded-md hover:bg-yellow-300 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-80">
                        créer une nouvelle note
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection


