<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryAttributesController;
use App\Http\Controllers\CategoryAttributesDefaultController;
use App\Http\Controllers\CategoryAttributeValueController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ProductController;
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
    Route::apiResource('category-attribute-values' , CategoryAttributeValueController::class);
    Route::apiResource('brands' , BrandController::class);
    Route::apiResource('products' , ProductController::class);
});

Route::prefix('status')->name('status')->group(function () {
    Route::put('brands-success' , [\App\Http\Controllers\BrandController::class , 'success'])->name('brands-success');
    Route::put('brands-reject' , [\App\Http\Controllers\BrandController::class , 'reject'])->name('brands-reject');
    Route::put('brands-pending' , [\App\Http\Controllers\BrandController::class , 'pending'])->name('brands-pending');
    Route::put('brands-close' , [\App\Http\Controllers\BrandController::class , 'close'])->name('brands-close');
    Route::put('brands-finish' , [\App\Http\Controllers\BrandController::class , 'finish'])->name('brands-finish');

});
