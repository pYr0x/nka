<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//    return $request->user();
//});
////

Route::post('login', [\App\Http\Controllers\Api\AuthenticationController::class, 'store']);

Route::get('products', [ProductController::class, 'index'])->middleware('auth:sanctum');
Route::post('products', [ProductController::class, 'store']);

Route::get('test', [TestController::class, 'index']);
//Route::apiResource('products', ProductController::class);//->middleware('auth:sanctum');
