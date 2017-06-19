<?php

Route::get('/ ' , 'FrontController@blog');
Route::get('blog' , 'FrontController@blog');
Route::get('contact' , 'FrontController@contact');
// ----------------------------------------------------
Route::resource('user', 'UserController');
// ----------------------------------------------------
Route::resource('category', 'CategoryController');
Route::resource('tag', 'TagController');
Route::resource('post', 'PostController');
Route::resource('image', 'ImageController');


Route::get('post/{slug}', 'PostController@show');
Route::get('post/publish/{id}', 'PostController@publish');
Route::get('post/unpublish/{id}', 'PostController@unpublish');
// ------------------------------------------------------
Route::resource('log', 'LogController');
Route::get('logout','logController@logout');
Route::resource('mail', 'MailController');
// ------------------------------------------------------
Route::get('categoria/{slug}', 'PostController@categories');
Route::get('filtro/{slug}', 'PostController@filtros');
