<?php

use App\Http\Controllers\AuthControl;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatController;
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


Route::get('/books',[BookController::class,'index']);
Route::get('/books/latest',[BookController::class,'latest']);
Route::get('/books/show/{id}',[BookController::class,'show']);
Route::get('/books/search/{keyword}',[BookController::class,'search']);
Route::post('/books/store',[BookController::class,'store']);





// catgories routes


Route::get('/cats',[CatController::class,'index']);

Route::get('/cats/show/{id}',[CatController::class,'show']);


//

// Auth Routes




Route::middleware('is-Gust')->group(function(){
    Route::get('register',[AuthControl::class,'register']);

    Route::post('registerData',[AuthControl::class,'registerData']);

    Route::get('login',[AuthControl::class,'getLoginForm']);

    Route::post('LoginData',[AuthControl::class,'loginData']);

});

Route::middleware('is-login')->group(function(){


    Route::post('/books/update/{id}',[BookController::class,'update']);
    Route::get('/books/delete/{id}',[BookController::class,'delete']);
    Route::get('/books/edit/{id}',[BookController::class,'edit']);
    Route::get('/books/create',[BookController::class,'create']);

    Route::get('/cats/create',[CatController::class,'create']);
    Route::post('/cats/store',[CatController::class,'store']);
    Route::get('/cats/edit/{id}',[CatController::class,'edit']);
    Route::post('/cats/update/{id}',[CatController::class,'update']);
    Route::get('/cats/delete/{id}',[CatController::class,'delete']);
    Route::get('logout',[AuthControl::class,'logout']);



});


