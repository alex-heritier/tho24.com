<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    /**
     * Register a business
     */
    public function register_biz(Request $request, AccountService $accountService)
    {
        // 0 - Validate info
        // Validate data
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'name' => ['required'],
            'phone_code' => ['required'],
            'phone' => ['required'],
        ]);

        Log::debug("request->file " . $request->file('image'));
        Log::debug("request->file->store " . $request->file('image')->store('images'));

        // 1 - Create user + biz and save image 
        [$user, $biz, $error_msg] = $accountService->register_biz(
            user_data: $request->only(['name', 'email', 'phone_code', 'phone', 'password']),
            biz_data: $request->only(['biz_name', 'descr', 'trade', 'website', 'email', 'phone_code', 'phone']),
            image_path: $request->file('image')->store('images'),
        );

        if ($error_msg) {
            Log::debug("AccountController.register_biz ERROR " . $error_msg);
            return response("ERROR - $error_msg", 500);
        }

        return redirect('/')->with('info', 'Success!');
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Load user
            $user = User::where('email', $request->email)->first();

            // Store important user info in session
            $request->session()->put('my.id', $user->id);
            $request->session()->put('my.email', $user->email);

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
