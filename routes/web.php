<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;


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
    return view('login');
});


Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/make-quiz', function () {
    return view('quiz.create');
})->name('quiz.create');

Route::get('/train-quiz', function () {
    return view('quiz.train');
})->name('quiz.train');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => '/quiz'], function () {
    Route::get('/train-quiz', [QuizController::class, 'index'])->middleware('auth')->name('quiz.train');
});