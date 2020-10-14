<?php

use App\Post;
//This is for the home page
Route::get('/', function () {
    return view('landing', ["posts" => Post::latest()->get()]);
});

Auth::routes();

// This is for the login Dashboard Page
Route::get('/home', 'HomeController@index')->name('home');
// This is for upload form page
Route::get('/create', 'HomeController@create');
// This is to insert and save post in public folder and database
Route::post('/store', 'HomeController@store');
// This is to delete post from public folder and database
Route::delete('/home/{post}', 'HomeController@destroy');
