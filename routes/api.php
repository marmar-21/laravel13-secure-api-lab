<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public API Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public Sample Routes
Route::get('/sample', function () {
    return response()->json([
        'message' => 'This is a sample route.',
    ]);
});

Route::get('/hello', function () {
    return response()->json([
        'message' => 'Welcome to the Laravel 13 API',
    ]);
});

// Authenticated Routes
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/profile', function (Request $request) {
        return response()->json([
            'message' => 'This is a protected route.',
            'user' => $request->user(),
        ]);
    });

    Route::post('/logout', [AuthController::class, 'logout']);

});

// Admin Only Routes
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function (Request $request) {
        return response()->json([
            'message' => 'Welcome Admin!',
            'user' => $request->user()->only([
                'id',
                'name',
                'email',
                'role',
            ]),
        ]);
    });

});

// Student Only Routes
Route::middleware(['auth:sanctum', 'role:student'])->group(function () {

    Route::get('/student/dashboard', function (Request $request) {
        return response()->json([
            'message' => 'Welcome Student!',
            'user' => $request->user()->only([
                'id',
                'name',
                'email',
                'role',
            ]),
        ]);
    });

});
