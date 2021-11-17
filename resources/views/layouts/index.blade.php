<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    {{-- CKEditor UI --}}
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>

    <header>
        <nav class="bg-white shadow dark:bg-gray-800">
            <div class="container flex items-center justify-center p-6 mx-auto text-gray-600 capitalize dark:text-gray-300">
                <a href="/" class="text-gray-800 dark:text-gray-200 border-b-2 border-red-400 mx-1.5 sm:mx-6">home</a>

                <a href="allnote"
                    class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-red-400 mx-1.5 sm:mx-6">Toutes les notes</a>

                <a href="/note"
                    class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-red-400 mx-1.5 sm:mx-6">Mes notes</a>

                    <a href="/createnote"
                    class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-red-400 mx-1.5 sm:mx-6">Nouvelle note</a>

                <a href="/createnote"
                    class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-red-400 mx-1.5 sm:mx-6">Notes partagées</a>

                <a href="#"
                    class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-red-400 mx-1.5 sm:mx-6">Likes</a>

                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-yellow-300 mx-1.5 sm:mx-6">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-yellow-300 mx-1.5 sm:mx-6">Log in</a>
        
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-yellow-300 mx-1.5 sm:mx-6">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </nav>
    </header>

    @yield('content')
</body>

</html>
