<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name( 'auth.login')->middleware('guest');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [AuthController::class, 'authentificate']);

Route::prefix('/blog')->name('blog.')->controller(PostController::class)->group(function () {

    // Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/', 'index')->name('index');

    Route::get('/{slug}/{post}', 'show')->where([
        'post' => '[0-9]+',
        'slug' => '[a-z0-9\-]+'
    ])->name('show');

    Route::get('/create', 'create')->name('create')->middleware('auth');
    Route::post('/create', 'store');

    Route::get('/{post}/edit', 'edit')->name('edit')->middleware('auth');;
    Route::post('/{post}/edit', 'update');

    Route::get('/{category}/category', 'category')->name('category');

    Route::delete('/{post}/destroy', 'destroy')->name('destroy');
});