<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['as' => 'api.'], function () {
    Route::post('login', [ApiController::class, 'authenticate'])->name('login');
    Route::post('register', [ApiController::class, 'register'])->name('register');
    Route::post('validate', [ApiController::class, 'validate_token_request'])->name('validate_token');

    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::post('logout', [ApiController::class, 'logout'])->name('logout');
        Route::get('get_user', [ApiController::class, 'get_user'])->name('get_user');

        Route::group(['product' => 'apis', 'as' => 'product.'], function () {
            Route::get('', [ProductController::class, 'index'])->name('index');
            Route::get('{id}', [ProductController::class, 'show'])->name('show');
            Route::post('create', [ProductController::class, 'store'])->name('store');
            Route::put('update/{product}',  [ProductController::class, 'update'])->name('update');
            Route::delete('delete/{product}',  [ProductController::class, 'destroy'])->name('destroy');
        });
    });
});
