<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\SubforumController;
use App\Http\Controllers\MessagesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});
Auth::routes();

Route::middleware ('auth') -> group (function () {

    Route::get('/forum', [ForumController::class, 'index']);
    Route::get('/subforum/{comments}', [SubforumController::class, 'index']);
    Route::get('/subforum/comments/{comments}', [MessagesController::class, 'index']);
    Route::post('/subforum/comments/{comments}', [MessagesController::class, 'store']);

});

