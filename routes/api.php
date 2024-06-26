<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/index',[BookController::class, 'index']);
Route::post('/store',[BookController::class, 'store']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login',[UserController::class, 'loginAdmin']);
// Route::group(['prefix' => 'admin','middleware' =>
//  ['assign.guard:admins','jwt.auth']],function ()
// {
// 	Route::post('/login',[UserController::class, 'loginAdmin']);
// });

Route::group(['prefix' => 'user','middleware' => ['assign.guard:users','jwt.auth']],function ()
{
	Route::get('/index',[UserController::class, 'loginAdmin']);
});
