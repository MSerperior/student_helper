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
	return redirect()->route('home');
});


Route::get('/profile', function () {
	return view('profile');
})->name('profile');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => '/quiz'], function () {

		// manages quiz
	Route::get('/index-quiz', [QuizController::class, 'index'])->middleware('auth')->name('quiz.index');
	Route::get('/train-quiz', [QuizController::class, 'train'])->middleware('auth')->name('quiz.train');
	Route::get('/make-quiz', [QuizController::class, 'create'])->middleware('auth')->name('quiz.create');
	Route::post('/store-quiz', [QuizController::class, 'store'])->middleware('auth')->name('quiz.store');
	Route::post('/update-quiz/{id}', [QuizController::class, 'update'])->middleware('auth')->name('quiz.update');
	Route::post('/destroy-quiz/{id}', [QuizController::class, 'destroy'])->middleware('auth')->name('quiz.destroy');
	Route::post('/check-quiz', [QuizController::class, 'check'] )->middleware('auth')->name('quiz.check');

});