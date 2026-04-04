<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\RegistrationCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->validated();

        if(auth()->attempt($credentials)) {
            if(!auth()->user()->is_active)
            {
                auth()->logout();
                return back()->withErrors([
                    'email' => 'Your account is not activated or banned.'
                ]);
            }

            $request->session()->regenerate();
            session()->put('user', auth()->user());

            if(auth()->user()->role?->name === 'admin')
                {
                    return redirect()->route('admin.dashboard.index');
                }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.login');
    }

    public function register(RegisterRequest $request) {
        $credentials = $request->validated();

        $credentials['code'] = (string) Str::uuid();

        try {
            $user = User::create($credentials);

            Auth::login($user);

            Mail::to($user->email)->send(new RegistrationCodeMail($user->code, $user->username));

            return redirect()->route('home');
        } catch (\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function verify($code) {
        $user = User::where('code', $code);

        if(!$user) {
            return redirect()->route('show.login')->with('error', 'Invalid or expired verification code.');
        }

        try{
            $user->update([
                'email_verified_at' => now(),
                'code' => null
            ]);

            return redirect()->route('home')->with('success', 'Your email has been verified.');
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
