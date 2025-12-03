<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PageController;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('forgot-password');
});

Route::get('/', [PageController::class, 'dashboard']);

Route::get('/vote-page', [PageController::class, 'votePage']);

Route::get('/voters-dashboard', [PageController::class, 'votersDashboard'])->middleware('auth');

Route::get('/admin/dashboard', [PageController::class, 'adminDashboard'])->middleware(['auth', 'admin']);

Route::get('/admin/manage', [PageController::class, 'adminManage'])->middleware(['auth', 'admin']);

Route::middleware('auth')->post('/votes', [VoteController::class, 'store'])->name('votes.store');

Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/elections', [ElectionController::class, 'index']);
Route::get('/elections/{election}', [ElectionController::class, 'show']);
Route::get('/elections/{election}/positions', [PositionController::class, 'index']);
Route::get('/elections/{election}/candidates', [CandidateController::class, 'index']);

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::post('/elections', [ElectionController::class, 'store']);
    Route::put('/elections/{election}', [ElectionController::class, 'update']);
    Route::delete('/elections/{election}', [ElectionController::class, 'destroy']);

    Route::post('/elections/{election}/positions', [PositionController::class, 'store']);
    Route::get('/positions/{position}', [PositionController::class, 'show']);
    Route::put('/positions/{position}', [PositionController::class, 'update']);
    Route::delete('/positions/{position}', [PositionController::class, 'destroy']);

    Route::post('/elections/{election}/candidates', [CandidateController::class, 'store']);
    Route::get('/candidates/{candidate}', [CandidateController::class, 'show']);
    Route::put('/candidates/{candidate}', [CandidateController::class, 'update']);
    Route::delete('/candidates/{candidate}', [CandidateController::class, 'destroy']);
});
