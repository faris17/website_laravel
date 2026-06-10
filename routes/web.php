<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){
    return "hello laravel";
})->name('test');

Route::resource('categories', CategoryController::class);

//Route::post
//Route::put
