<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ShareController;
use App\Models\Like;
use App\Models\Note;
use App\Models\User;
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
    $notes = Note::orderBy('aime', 'DESC')->get();
    if (Auth::check()) {
        $user = User::find(Auth::user()->id);
        $likes = $user->likes;
        $test = [];
        foreach ($likes as $like) {
            array_push($test, $like);
        }
        $tab = DB::table('likes')->where('user_id', Auth::user()->id)->get();
        return view('pages.allnote', compact('notes', 'likes', 'test', 'tab'));
    } else {
        return view('pages.allnote', compact('notes'));
    }
})->middleware('MobileCheck');

Route::get('/createnote', function () {
    $notes = Note::all();
    return view('pages.createnote', compact('notes'));
});

Route::resource('note', NoteController::class);
Route::resource('share', ShareController::class);
Route::resource('like', LikeController::class);
Route::post('/note/like/{id}', [NoteController::class, 'like']);
Route::post('/note/unlike/{id}', [NoteController::class, 'unlike']);
Route::get('/share/{id}/sharing', [ShareController::class, 'sharecreate']);
Route::post('/share/{id}/shared', [ShareController::class, 'share']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['IsConnected'])->name('dashboard');

require __DIR__.'/auth.php';
