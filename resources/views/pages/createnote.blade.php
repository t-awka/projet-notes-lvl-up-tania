@extends('layouts.index')
@section('content')

    <section class="w-full max-w-2xl px-6 py-4 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-20">
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white">Ma nouvelle note</h2>
        
        <div class="mt-6 ">
            <form method="post" action="/note" enctype="multipart/form-data">
                @csrf
                <div class="items-center -mx-2 md:flex">
                    <div class="w-full mx-2">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Titre</label>
                        <input name="title" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-red-400 focus:outline-none focus:ring" type="text">
                    </div>
                </div>

                <div class="w-full mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Note</label>
                    <textarea name="content" id="editor1" class="ckeditor form-control"></textarea>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a href="/allnote" class="text-red-400 dark:text-blue-400 hover:underline">Retour</a>

                <div class="flex justify-center mt-6">
                    <button type="submit" class="px-4 py-2 text-white transition-colors duration-200 transform bg-red-400 rounded-md hover:bg-yellow-300 focus:outline-none focus:bg-yellow-300">Enregistrer</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        CKEDITOR.replace( 'editor1', {
            uiColor: '#feeb3f',
            toolbar: [[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ]]
        });
    </script>

    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection