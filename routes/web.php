<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MemberController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/checkrole')->middleware('role')->name('checkrole');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/student-home', [StudentController::class, 'index'])->name('student.home');
Route::get('/teacher-home', [TeacherController::class, 'index'])->middleware('teacher-role')->name('teacher.home');

Route::get('/pending', [AssignmentController::class, 'PendingAssignments'])->name('pending_assignments');

Route::get('/list',[MemberController::class,'display']);