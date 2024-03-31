<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        //$request->validate([
            //'email' => 'required|email',
            //'password' => 'required',
        //]);

        $email = $request->email;

        if (! RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
                RateLimiter::clear($this->throttleKey($request));

                return redirect()->intended('/');
            }

            RateLimiter::hit($this->throttleKey($request));

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => RateLimiter::availableIn($this->throttleKey($request)),
            ]),
        ]);
    }

    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }
}