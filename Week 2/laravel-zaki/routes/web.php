<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return 'Hello World';
   });
Route::get('/world', function () {    return 'World'; 
   }); 
   Route::get('/index', [PageController::class, 'index']);
   Route::get('/about', [PageController::class, 'about']);
   Route::get('/articles/{id}', [PageController::class, 'articles']); 

    Route::get('/posts/{post}/comments/{comment}', function 
    ($postId, $commentId) { 
        return 'Pos ke-'.$postId." Komentar ke-: ".$commentId; });

        Route::get('/articles/{id}', function ($id) {
            return "Halaman Artikel dengan ID " . $id;
        });
        Route::get('/user/{name?}', function ($name='John') {
            return 'Nama saya '.$name;
            });

            Route::get('/greeting', [WelcomeController::class,'greeting']);

            Route::resource('photos', PhotoController::class);
           
            