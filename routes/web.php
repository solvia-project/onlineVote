<?php

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PageController;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $data = $request->validate([
        'email' => ['required', 'email'],
        'new_password' => ['required', 'min:8'],
        'confirm_password' => ['required', 'same:new_password'],
    ]);

    $user = User::where('email', $data['email'])->first();
    if (!$user) {
        return back()->withErrors(['email' => 'Email not registered']);
    }

    $user->forceFill([
        'password' => Hash::make($data['new_password']),
    ])->setRememberToken(Str::random(60));
    $user->save();
    event(new PasswordReset($user));

    return redirect()->route('login')->with('status', 'Password updated, please login.');
})->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8', 'confirmed'],
    ]);
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));
            $user->save();
            event(new PasswordReset($user));
        }
    );
    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');

Route::get('/', [PageController::class, 'dashboard']);

Route::get('/vote-page', [PageController::class, 'votePage']);

Route::get('/voters-dashboard', [PageController::class, 'votersDashboard'])->middleware('auth');

Route::get('/admin/dashboard', [PageController::class, 'adminDashboard'])->middleware(['auth', 'admin']);

Route::get('/admin/manage', [PageController::class, 'adminManage'])->middleware(['auth', 'admin']);
Route::get('/admin/analytics', [PageController::class, 'adminAnalytics'])->middleware(['auth', 'admin']);

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
