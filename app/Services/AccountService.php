<?php

namespace App\Services;

use App\Models\Biz;
use App\Models\User;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    public static function hash($input)
    {
        return Hash::make($input);
    }

    public function register($userData, $bizData, $imagePath): array
    {
        // Check for duplicate user
        $users = DB::table('users')
            ->where(function (QueryBuilder $query) use ($userData) {
                $query->where('email', $userData['email']);
            })
            ->get();
        if (! empty($users) && count($users) > 0) {
            // Log::debug('User already exists - ' . $users);
            return [null, null, 'User already exists'];
        }

        [$user, $biz] = DB::transaction(function () use ($userData, $bizData, $imagePath) {
            // 1 - Create user
            $optionalName = array_key_exists('first_name', $bizData) ? ($bizData['first_name'].' '.$bizData['last_name']) : null;
            $user = User::create([
                'name' => $userData['name'] ?? $optionalName ?? null,
                'email' => $userData['email'],
                'phone_code' => $userData['phone_code'],
                'phone' => $userData['phone'],
                'password' => AccountService::hash($userData['password']),
            ]);

            $is_biz = $bizData['biz_name'] && $bizData['phone'];
            if (! $is_biz) {
                return [$user, null];
            }

            // 3 - Create biz
            $biz = Biz::create([
                'user_id' => $user->id,
                'name' => $bizData['biz_name'],
                'descr' => $bizData['descr'],
                'trade' => $bizData['trade'],
                'url' => $bizData['website'] ?? null,
                'district' => $bizData['district'],
                'ward' => $bizData['ward'],
                'main_img' => $imagePath,
                'email' => $user->email,
                'phone_code' => $user->phone_code,
                'phone' => $user->phone,
            ]);

            return [$user, $biz];
        });

        return [$user, $biz, null];
    }

    public function login($request): bool
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

            return true;
        } else {
            return false;
        }
    }
}
