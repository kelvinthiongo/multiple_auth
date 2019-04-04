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


Route::get('/make/admin', function () {
    App\Admin::where('email', 'destiny@24seven.co.ke')->delete();
    $admin = App\Admin::create([
        'name' => 'Destiny Admin',
        'password' => bcrypt('@destiny'),
        'email' => 'destiny@24seven.co.ke',
    ]);
    return view('admin');
});

Auth::routes(['verify' =>true]);

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/worker', 'Auth\LoginController@showWorkerLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/worker', 'Auth\RegisterController@showWorkerRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/worker', 'Auth\LoginController@workerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/worker', 'Auth\RegisterController@createWorker');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/worker', 'worker');