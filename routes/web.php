<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', [HomeController::class,'home'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');


Route::resource('posts', PostController::class)->only(['index', 'show', 'create', 'store']);

// Route::get('/posts', function() use($posts){
//     // dd(request()->all());
//     return view('posts.index', ['posts' => $posts]);
// });

// Route::get('/posts/{id?}', function($id) use($posts){

//     abort_if(!isset($posts[$id]), 404);
//     return view('posts.show', ['post' =>$posts[$id]]);
// });


// Route::get('/single',AboutController::class);


// Route::prefix('/fun')->name('fun.')->group(function() use ($posts){
//     Route::get('/resp', function() use($posts){
//         return response($posts, 201)
//             ->header('Content-Type', 'application/json')
//             ->cookie('MY_COOKIE', 'QuyetVV',3600);
//     });

//     Route::get('/redirect', function() use($posts){
//         return redirect('/contact');
//     });

//     Route::get('/json', function() use($posts){
//         return response()->json($posts);
//     });
// });



