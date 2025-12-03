<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role ?? 'user';
            if ($request->expectsJson()) {
                return response()->json(['message' => 'ok', 'redirect' => $role === 'admin' ? '/admin/dashboard' : '/']);
            }
            return redirect()->intended($role === 'admin' ? '/admin/dashboard' : '/');
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => 'invalid'], 422);
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:Male,Female'],
            'registration_fee' => ['nullable', 'integer', 'in:10000'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data['registration_fee'] = 10000;
        User::create($data);
        if ($request->expectsJson()) {
            return response()->json(['message' => 'ok'], 201);
        }
        return redirect()->route('login');
    }
}
