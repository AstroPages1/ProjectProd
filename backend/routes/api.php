<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\DefaultProviders;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('products', ProductController::class);
});


Route::middleware('auth:sanctum')->get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('products', ProductController::class)->except(['create', 'edit']);
});

