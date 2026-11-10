<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

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

Route::middleware(['auth:sanctum', 'role:admin,student'])
    ->get('/students', function (Request $request) {
        return response()->json([
            'message' => 'Students list accessed successfully.',
            'user' => $request->user()->only([
                'id',
                'name',
                'email',
                'role',
            ]),
        ]);
    });

Route::middleware(['auth:sanctum', 'admin'])
    ->get('/admin/dashboard', function (Request $request) {
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

Route::middleware(['auth:sanctum', 'role:student'])
    ->get('/student/dashboard', function (Request $request) {
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
