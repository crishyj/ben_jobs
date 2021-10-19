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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('index');
Route::get('/job/{id}', [App\Http\Controllers\FrontController::class, 'jobDetail'])->name('jobDetail');
Route::get('/job/{id}/apply', [App\Http\Controllers\FrontController::class, 'jobApply'])->name('jobApply');
Route::post('/apply', [App\Http\Controllers\FrontController::class, 'storeProposal'])->name('storeProposal');

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

Route::get('/jobs', [App\Http\Controllers\AdminController::class, 'job'])->name('jobs');
Route::get('/adminjobDetail/{id}', [App\Http\Controllers\AdminController::class, 'adminjobDetail'])->name('adminjobDetail');
Route::get('/createjob', [App\Http\Controllers\AdminController::class, 'createJob'])->name('createJob');
Route::post('/createjob', [App\Http\Controllers\AdminController::class, 'storeJob'])->name('storeJob');
Route::post('/jobs', [App\Http\Controllers\AdminController::class, 'updateJob'])->name('updateJob'); 
Route::get('/jobs/{id}', [App\Http\Controllers\AdminController::class, 'jobDelete'])->name('jobDelete');
Route::get('/proposals', [App\Http\Controllers\AdminController::class, 'proposal'])->name('proposal');

