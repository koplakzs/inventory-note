<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserInventoryController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.home');
// });

Route::controller(InventoryController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::delete('/{id}', 'destroy');
    Route::put('/{id}', 'update');
});

Route::resource('user', UserInventoryController::class);

Route::get("/pdf/{id}", [PdfController::class, 'index']);
