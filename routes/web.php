<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@index')->name('home');
Route::get('/article/{slug}', 'PostController@show')->name('article.single');
Route::get('/category/{slug}', 'CategoryController@show')->name('category.single');
Route::get('/tag/{slug}', 'TagController@show')->name('tag.single');
Route::get('/author/{slug}', 'AuthorController@show')->name('author.single');
Route::post('/comment/{slug}', 'CommentController@store')->name('comment.store');
Route::get('/offer/{slug}', 'OfferPageController@show')->name('offer_page.show');
Route::post('/requestoffer/{slug}', 'RequestOfferController@store')->name('request.offer.store');
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/contact', 'ContactController@index')->name('contact');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');
    Route::resource('/post', 'PostController');
    Route::resource('/author', 'AuthorController');
    Route::resource('/offer', 'OfferController');
    Route::resource('/requestoffer', 'RequestOfferController');
    Route::resource('/contact', 'ContactController');
    Route::resource('/user', 'UserController');
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});

Route::get('/logout', 'UserController@logout')->name('logout');
