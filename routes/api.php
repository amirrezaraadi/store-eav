<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryAttributesController;
use App\Http\Controllers\CategoryAttributesDefaultController;
use App\Http\Controllers\CategoryAttributeValueController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\User\CityController;
use App\Http\Controllers\User\CountryController;
use App\Http\Controllers\User\ProvinceController;
use App\Http\Controllers\VariantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('panel')->name('panel')->group(function () {
    Route::apiResource('category-product', CategoryProductController::class);
    Route::apiResource('attribute', CategoryAttributesController::class);
    Route::apiResource('attribute-default', CategoryAttributesDefaultController::class);
    Route::apiResource('attribute-values', CategoryAttributeValueController::class);
    Route::apiResource('brands', BrandController::class);
    Route::apiResource('sellers', SellerController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('variants', VariantController::class);
    Route::apiResource('countries', CountryController::class);
    Route::apiResource('provinces', ProvinceController::class);
    Route::apiResource('cities', CityController::class);
    Route::apiResource('location', LocationController::class);
    Route::apiResource('delivery', DeliveryController::class);

});
Route::prefix('status')->name('status')->group(function () {
    Route::put('brands-success/{brand}', [\App\Http\Controllers\BrandController::class, 'success'])->name('brands-success');
    Route::put('brands-reject/{brand}', [\App\Http\Controllers\BrandController::class, 'reject'])->name('brands-reject');
    Route::put('brands-pending/{brand}', [\App\Http\Controllers\BrandController::class, 'pending'])->name('brands-pending');
    Route::put('brands-close/{brand}', [\App\Http\Controllers\BrandController::class, 'close'])->name('brands-close');
    Route::put('brands-finish/{brand}', [\App\Http\Controllers\BrandController::class, 'finish'])->name('brands-finish');
    Route::put('seller-success/{seller}', [\App\Http\Controllers\SellerController::class, 'success'])->name('seller-success');
    Route::put('seller-reject/{seller}', [\App\Http\Controllers\SellerController::class, 'reject'])->name('seller-reject');
    Route::put('seller-pending/{seller}', [\App\Http\Controllers\SellerController::class, 'pending'])->name('seller-pending');
    Route::put('variant-success/{variant}', [\App\Http\Controllers\VariantController::class, 'success'])->name('variant-success');
    Route::put('variant-reject/{variant}', [\App\Http\Controllers\VariantController::class, 'reject'])->name('variant-reject');
    Route::put('variant-pending/{variant}', [\App\Http\Controllers\VariantController::class, 'pending'])->name('variant-pending');
    Route::put('location-success/{location}', [LocationController::class, 'success'])->name('location-success');
    Route::put('location-reject/{location}', [LocationController::class, 'reject'])->name('location-reject');
    Route::put('location-pending/{location}', [LocationController::class, 'pending'])->name('location-pending');
});
