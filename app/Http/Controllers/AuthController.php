<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'student_number' => [
                'nullable',
                'string',
                'max:50',
                'unique:users,student_number',
            ],
            'college' => 'required|string|max:150',
            'program' => 'required|string|max:150',
            'year_level' => [
                'required',
                Rule::in([
                    '1st Year',
                    '2nd Year',
                    '3rd Year',
                    '4th Year',
                    '5th Year',
                ]),
            ],
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8),
            ],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'student_number' => $validated['student_number'] ?? null,
            'college' => $validated['college'],
            'program' => $validated['program'],
            'year_level' => $validated['year_level'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('organizations.index')
            ->with('success', 'Account created successfully!');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()
                ->intended(route('organizations.index'))
                ->with('success', 'Welcome back!');
        }

        return back()
            ->withErrors([
                'email' => 'The email or password is incorrect.',
            ])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'You have logged out successfully.');
    }

    // Student Profile
    public function profile()
    {
        return view('auth.profile', [
            'user' => Auth::user(),
        ]);
    }
}
