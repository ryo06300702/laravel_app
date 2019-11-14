<?php

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
Route::resource('todo', 'TodoController');

// Route::get('todo', 'TodoController@index')->name('todo.index');      これは/todoパスにgetメソッドできたリクエストをTodoController@indexで処理する、というルートを定義します。
// Route::get('todo/create', 'TodoController@create')->name('todo.create');
// Route::post('todo', 'TodoController@store')->name('todo.store');
// Route::get('todo/{$todo}', 'TodoController@show')->name('todo.show');
// Route::get('todo/{$todo}/edit', 'TodoController@edit')->name('todo.edit');
// Route::put('todo/{$todo}', 'TodoController@update')->name('todo.update');
// Route::delete('todo/{$todo}', 'TodoController@destroy')->name('todo.destroy');


Auth::routes();

// // Authentication Routes...
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');
