<?php

use App\Http\Controllers\crud_userController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Models\Crud_users;
use App\Http\Controllers\indexController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\LoginController as ControllersLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/welcome',[LoginController::class,'welcome'])->name('welcome');
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/datasave',[LoginController::class,'formsave'])->name('formsave');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::get('/admin',[LoginController::class,'admin'])->name('admin');
Route::get('/admission',[LoginController::class,'admission'])->name('admission');
Route::get('/teacher',[LoginController::class,'teacher'])->name('teacher');
Route::get('/student',[LoginController::class,'student'])->name('student');
Route::get('/manage_user', [HomeController::class, 'manage_user'])->name('manage_user');
Route::get('/manage_user_admission', [HomeController::class, 'manage_user_admission'])->name('manage_user_admission');
Route::get('/manage_admission', [HomeController::class, 'manage_admission'])->name('manage_admission');
Route::get('/manage_teacher', [HomeController::class, 'manage_teacher'])->name('manage_teacher');
Route::get('/assign', [HomeController::class,'assign'])->name('assign');
Route::post('/saveassign', [HomeController::class, 'saveassign'])->name('saveassign');
Route::get('/manage_student', [HomeController::class, 'manage_student'])->name('manage_student');
Route::get('/manage_student_admission', [HomeController::class, 'manage_student_admission'])->name('manage_student_admission');
Route::get('/manage_student_marks', [HomeController::class, 'manage_student_marks'])->name('manage_student_marks');
Route::get('/read/{id}', [HomeController::class, 'read'])->name('read');
Route::post('/change/{id}', [HomeController::class, 'change'])->name('change');
Route::get('/delete/{id}', [HomeController::class, 'delete'])->name('delete');
Route::get('/update/{id}',[HomeController::class,'update'])->name('update');
Route::get('/updatestudent/{id}',[HomeController::class,'updatestudent'])->name('updatestudent');
Route::get('/updatestudentmarks/{id}',[HomeController::class,'updatestudentmarks'])->name('updatestudentmarks');
Route::post('/savemarks',[HomeController::class,'savemarks'])->name('savemarks');
Route::get('/updatestudentadmission/{id}',[HomeController::class,'updatestudentadmission'])->name('updatestudentadmission');
Route::post('/saveupdate',[HomeController::class,'saveupdate'])->name('saveupdate');
Route::post('/saveupdatestudent',[HomeController::class,'saveupdatestudent'])->name('saveupdatestudent');
Route::post('/saveupdatestudentadmission',[HomeController::class,'saveupdatestudentadmission'])->name('saveupdatestudentadmission');
ROute::get('/useraccount',[HomeController::class,'useraccount'])->name('useraccount');
ROute::get('/useraccount_admission',[HomeController::class,'useraccount_admission'])->name('useraccount_admission');
ROute::get('/useraccount_student',[HomeController::class,'useraccount_student'])->name('useraccount_student');
ROute::get('/useraccount_teacher',[HomeController::class,'useraccount_teacher'])->name('useraccount_teacher');
Route::post('states_by_country', [HomeController::class, 'states_by_country'])->name('states_by_country');
Route::post('cities_by_state', [HomeController::class, 'cities_by_state'])->name('cities_by_state');




