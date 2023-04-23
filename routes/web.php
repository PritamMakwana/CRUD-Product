<?php

use App\Http\Controllers\TaskController;
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
//select data
Route::get('/show', [TaskController::class, "showData"])->middleware('isloggedIn');
//add page show
Route::view('/add', 'add')->middleware('isloggedIn');
//add data
Route::post('/add', [TaskController::class, "addData"])->middleware('isloggedIn');
//delete data
Route::get('delete/{id}', [TaskController::class, "deleteData"])->middleware('isloggedIn');
//update Data Show
Route::get('update/{id}', [TaskController::class, "updateDataShow"])->middleware('isloggedIn');
//update Data
Route::post('update/{id}', [TaskController::class, "updateData"])->middleware('isloggedIn');

//search Data Page
Route::get('search', [TaskController::class, "searchPageData"])->middleware('isloggedIn');
//search  Data Show
Route::post('searchPage', [TaskController::class, "searchDataShow"])->middleware('isloggedIn');



// login
Route::get('/',[TaskController::class,"loginShowpage"])->middleware('checklogged');
Route::post('/login-author',[TaskController::class,"login"])->name("login-author")->middleware('checklogged');

//register
Route::view('/register','register')->middleware('checklogged');
Route::post('/register-author',[TaskController::class,"register"])->name("register-author")->middleware('checklogged');

//logout
Route::get('/logout',[TaskController::class,'logout'])->middleware('checklogged');
