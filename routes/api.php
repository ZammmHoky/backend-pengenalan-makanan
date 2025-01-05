<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

// Route untuk login user
Route::post('login', [UserController::class, 'login']);

// Route CRUD makanan
Route::apiResource('foods', FoodController::class);

// Route untuk mengirim pesan (hubungi kami)
Route::post('contacts', [ContactController::class, 'store']);
Route::get('contacts', [ContactController::class, 'index']);

// Route untuk klasifikasi makanan
Route::post('classify', function (Request $request) {
    // Contoh respon sementara
    return response()->json([
        'message' => 'Fitur klasifikasi makanan akan ditambahkan di sini',
        'data' => $request->all(),
    ]);
});
