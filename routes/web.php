<?php
use App\Http\Controllers\UsersController;

Route::get('/','PagesController@root')->name('root');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('home','TopicsController@index')->name('home');


// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//UsersController
Route::resource('users', 'UsersController',['only'=>['show','update','edit']]);

//TopicsController
Route::post('upload_image','TopicsController@uploadImage')->name('topics.upload_image');
Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);


//CategoriesController
Route::resource('categories', 'CategoriesController',['only'=>['show']]);
//RepliesController
Route::resource('replies', 'RepliesController', ['only' => [ 'store','destroy']]);