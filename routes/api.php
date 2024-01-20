<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/product', [ProductController::class,'index']);
Route::post('v1/product/save', [ProductController::class,'store']);
Route::put('v1/product/update/{id}', [ProductController::class,'update']);
Route::delete('v1/product/delete/{id}', [ProductController::class,'destroy']);