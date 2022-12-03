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
Route::get("/all-products", [ProductController::class, 'getAllProducts']);
Route::post("/add-product", [ProductController::class, 'addProduct']);
Route::get("/get-product/{id}", [ProductController::class, 'getProduct']);
Route::post("/update-product/{id}", [ProductController::class, 'updateProduct']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
