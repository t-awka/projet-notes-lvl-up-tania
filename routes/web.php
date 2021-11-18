<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ShareController;
use App\Models\Like;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/allnote', function () {
    $notes = Note::all();
    $likes = Like::all();
    return view('pages.allnote', compact('notes', 'likes'));
});

Route::get('/createnote', function () {
    $notes = Note::all();
    return view('pages.createnote', compact('notes'));
});

Route::resource('note', NoteController::class);
Route::resource('share', ShareController::class);
Route::post('/note/like/{id}', [NoteController::class, 'like']);
Route::get('/share/{id}/sharing', [ShareController::class, 'sharecreate']);
Route::post('/share/{id}/shared', [ShareController::class, 'share']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
