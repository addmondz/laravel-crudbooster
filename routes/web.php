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

// Route::get('/admin', function () {
// 	return redirect('admin');
// });

// Route::get('/', function () {
//     // return ;
// 	return view('welcome');
// });

Route::get('/login', function () {
	return view('login');
});

Route::get('/', function () {
	return redirect('admin');
});