<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizConTroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\examController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('/admin1', AdminController::class);
Route::resource('/Category', CateController::class);
Route::resource('/User1', UserController::class);
Route::resource('/Quiz', QuizConTroller::class);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [AdminController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::prefix('exam')->group(function () {
    Route::get('list', [examController::class, 'list'])->name('list.exam');
    Route::get('add', [examController::class, 'add'])->name('add.exam');
    Route::post('add', [examController::class, 'addPost'])->name('add.exam');
    Route::get('edit/{id}', [examController::class, 'edit'])->name('edit.exam');
    Route::post('edit/{id}', [examController::class, 'editPost'])->name('edit.exam');
    Route::get('delete', [examController::class, 'delete'])->name('delete.exam');

    Route::get('addQz/{id}', [examController::class, 'addQz'])->name('add.qz.exam');
    Route::post('addQzz', [examController::class, 'addQzPost'])->name('add.qz.exam.post');
    Route::post('delete/{id}', [examController::class, 'deleteQz'])->name('delete.qz.exam');

});
