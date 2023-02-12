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
Route::get('/',[TaskController::class,"showData"]);
//add page show
Route::view('/add','add'); 
//add data
Route::post('/add',[TaskController::class,"addData"]);
//delete data
Route::get('delete/{id}',[TaskController::class,"deleteData"]);
//update Data Show
Route::get('update/{id}',[TaskController::class,"updateDataShow"]);
//update Data 
Route::post('update/{id}',[TaskController::class,"updateData"]);


