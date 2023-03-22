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
    public function register(Request $request, AccountService $accountService)
    {
        // 0 - Validate info
        // Validate data
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($request->filled(['biz_name'])) {
            $request->validate([
                'biz_name' => ['required'],
                'descr' => ['required'],
                'trade' => ['required'],
                // 'phone_code' => ['required'],
                'phone' => ['required'],
                'district' => ['required'],
                'ward' => ['required'],
            ]);
        }

        // 1 - Create user + biz and save image
        $image_path = $request->file('image')?->store('images');
        [$user, $biz, $error_msg] = $accountService->register(
            user_data: $request->only(['name', 'email', 'phone_code', 'phone', 'password']),
            biz_data: $request->only(['biz_name', 'descr', 'trade', 'website', 'email', 'phone_code', 'phone', 'district', 'ward']),
            image_path: $image_path,
        );

        if ($error_msg) {
            Log::debug("AccountController.register_biz ERROR " . $error_msg);
            return response("ERROR - $error_msg", 500);
        }

        if ((new AccountService())->login($request)) {
            return redirect()->intended('/')->with('info', 'Success!');
        }

        return redirect('/')->with('info', 'Success!');
    }

    /**
     * Login
     */
    public function login(Request $request, AccountService $accountService)
    {
        if ($accountService->login($request)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email')->with(['err_type' => 'login']);
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
