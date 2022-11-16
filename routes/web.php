<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('post.index');//laravel 8* требует полный путь к контроллеру
Route::get('/posts/create', 'App\Http\Controllers\PostController@create')->name('post.create');
Route::get('/posts/update', 'App\Http\Controllers\PostController@update');
Route::get('/posts/delete', 'App\Http\Controllers\PostController@delete');
Route::get('/posts/first_or_create', 'App\Http\Controllers\PostController@firstOrCreate');
Route::get('/posts/first_or_create', 'App\Http\Controllers\PostController@firstOrCreate');
Route::get('/posts/update_or_create', 'App\Http\Controllers\PostController@updateOrCreate');

Route::post('/posts', 'App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/posts/{post}', 'App\Http\Controllers\PostController@show')->name('post.show');
Route::get('/posts/{post}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');
Route::patch('/posts/{post}', 'App\Http\Controllers\PostController@update')->name('post.update');
Route::delete('/posts/{post}', 'App\Http\Controllers\PostController@destroy')->name('post.delete');

//для продуктов CRUD
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');//laravel 8* требует полный путь к контроллеру
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products', 'App\Http\Controllers\ProductController@store')->name('product.store');
Route::get('/product/{product}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/product/category/{category}', 'App\Http\Controllers\ProductController@showByCategory')->name('product.showByCategory');
Route::get('/products/{product}/edit', 'App\Http\Controllers\ProductController@edit')->name('product.edit');
Route::patch('/products/{product}', 'App\Http\Controllers\ProductController@update')->name('product.update');
Route::delete('/products/{product}', 'App\Http\Controllers\ProductController@destroy')->name('product.delete');
//=========================*/

Route::get('/main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');
Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contacts.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
