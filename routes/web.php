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

Route::get('/', 'PagesController@root')->name('root');

//Laravel的认证路由可以从vendor/laravel/ui/src/AuthRouteMethods.php找得到!
Auth::routes(['verify' => true]);

Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
/*
上面代码等效为如下,使用resource是可以很方便符合RESETful原则.
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
*/