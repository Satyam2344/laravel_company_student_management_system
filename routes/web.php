<?php


use App\Http\Controllers\AboutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
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




Route::post('/authenticate', [LoginController::class, 'authenticate']);
// Route::post('/cred', [AboutController::class, 'cred']);
Route::post('/add/student/registration', [RegistrationController::class, 'register'])->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::view('/student/registration', 'register.index')->middleware('auth');
Route::view('/dashboard', 'dashboard')->middleware('auth');
Route::view('/', 'login')->name('login');
Route::get('/students', [RegistrationController::class, 'show'])->middleware('auth');
// Route::view('/students', 'students')->middleware('auth');
Route::view('/companies', 'companies')->middleware('auth');
Route::get('/student/getData/{email}', [RegistrationController::class, 'getData'])->middleware('auth');
Route::post('/student/update', [RegistrationController::class, 'update'])->middleware('auth');
Route::get('/student/delete/{id}', [RegistrationController::class, 'delete'])->middleware('auth');


//comapny routes
Route::post('/add/company/registration', [CompanyController::class, 'register'])->middleware('auth');
Route::view('/company/registration', 'register.companyregistration')->middleware('auth');
Route::get('/company/getData/{email}', [CompanyController::class, 'getData'])->middleware('auth');
Route::post('/company/update', [CompanyController::class, 'update'])->middleware('auth');
Route::get('/company/delete/{id}', [CompanyController::class, 'delete'])->middleware('auth');
Route::get('/companies', [CompanyController::class, 'show'])->middleware('auth');
