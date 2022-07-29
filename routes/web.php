<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyCRUDController;
use App\Http\Controllers\voteController;
use App\Http\Controllers\membreController;
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

Route::resource('companies', CompanyCRUDController::class);

Route::resource('votes', voteController::class);
Route::resource('membres', membreController::class);


Route::get('/', function () {
    return view('welcome');
});
