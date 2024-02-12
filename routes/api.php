<?php

use App\Http\Controllers\CategoryAttributesController;
use App\Http\Controllers\CategoryAttributesDefaultController;
use App\Http\Controllers\CategoryProductController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('panel')->name('panel')->group(function () {
    Route::apiResource('category-product' , CategoryProductController::class);
    Route::apiResource('category-attribute' , CategoryAttributesController::class);
    Route::apiResource('category-attribute-default' , CategoryAttributesDefaultController::class);
    Route::apiResource('brands' , \App\Http\Controllers\BrandController::class);

});
