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


Route::post('/dologin', 'UserController@dologin');


Route::get('/', function () {
    return view('admin.login');
});


//Route::get('/', function () {
//    return view('admin.index');
//});


//Route::get('/', 'UserController@index');
//Route::get('/', function () {
//
//    return view('welcome');
//});

Route::get('/add', function () {
    return view('admin.userCreate');
});

Route::get('/edit/{id}', function ($id) {
    return view('admin.userEdit', ['id' => $id]);

});
Route::get('/success/{text}', function ($text) {

    return view('user.success', ['text' => $text]);
});
Route::get('/lose/{text}', function ($text) {

    return view('user.lose', ['text' => $text]);
});


Route::get('/select', 'UserController@select');

Route::resource('user', 'UserController');

//Route::get('user/{id}/delete', [
//    'as' => 'user.delete',
//    'uses' => 'UserController@destroy',
//]);


