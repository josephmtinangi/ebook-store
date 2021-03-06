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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoryController');

Route::resource('books', 'BookController');

Route::post('books/{book}/download-links', 'DownloadLinkController@store')->name('books.download-links.store');

Route::get('download/{token}', 'DownloadController@handle');

Route::get('{username}', function ($username) {
	$user = \App\Models\User::whereUsername($username)->firstOrFail();
	return view('users.show', compact('user'));
})->name('profile');
