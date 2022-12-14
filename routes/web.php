<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizConTroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\examController;
use App\Http\Controllers\TimeExamController;
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
Route::get('themchuong/{id_cate}', [CateController::class, 'addC'])->name('addC');
Route::post('themchuong/', [CateController::class, 'addCPost'])->name('addCPost');
Route::get('suachuongw/{id}', [CateController::class, 'editC'])->name('editC');
Route::post('suachuongw/', [CateController::class, 'editCPost'])->name('editCPost');
Route::get('danhsach/{id_cate}', [CateController::class, 'listC'])->name('listC');
Route::get('deleteC/{id}', [CateController::class, 'deleteC'])->name('deleteC');


Route::resource('/User1', UserController::class);
Route::resource('/Quiz', QuizConTroller::class);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/detailexam', [examController::class, 'readmore'])->name('readmore');
Route::get('/kiemtra/{idExam}/{idTimeExam}', [examController::class, 'kiemtra'])->name('kiemtra');

Route::post('/diemso', [examController::class, 'diemso'])->name('diemso');
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
    Route::get('delete/{id}', [examController::class, 'deleteQz'])->name('delete.qz.exam');
});
Route::prefix('time-exam')->group(function () {
    Route::get('diemthi/{id_exam}/{id_time_exam}', [TimeExamController::class, 'diemthi'])->name('diemthi');

    Route::get('addTime', [TimeExamController::class, 'add'])->name('add.Time');
    Route::get('listTime', [TimeExamController::class, 'list'])->name('list.Time');
    Route::get('listExamInTime/{id}', [TimeExamController::class, 'listExaminTime'])->name('list.listExaminTime');
    Route::post('addTime', [TimeExamController::class, 'addPost'])->name('add.Time.post');
    Route::get('delete/{id}', [TimeExamController::class, 'delete'])->name('delete.Time');
    Route::get('addstudent/{id_exam}/{id_time_exam}', [TimeExamController::class, 'addStudent'])->name('add.list.student');
    Route::post('addstudent', [TimeExamController::class, 'addStudentPost'])->name('add.list.student.post');
    Route::get('listLink/{id}', [TimeExamController::class, 'listLink'])->name('listLink');
    Route::get('linkExamRun/{id}/{id_exam_random}', [TimeExamController::class, 'linkExamRun'])->name('linkExamRun');
});
