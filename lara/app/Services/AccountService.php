<?php

namespace App\Services;

use App\Models\Biz;
use App\Models\User;
use Exception;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AccountService
{
    public static function hash($input)
    {
        return Hash::make($input);
    }

    public function register_biz($user_data, $biz_data, $image_path): array
    {
        // Check for duplicate user
        $users = DB::table('users')
            ->where(function (QueryBuilder $query) use ($user_data) {
                $query->where('email', $user_data['email'])
                    ->orWhere('phone', $user_data['phone']);
            })
            ->get();
        if (!empty($users) && count($users) > 0) {
            // Log::debug('User already exists - ' . $users);
            return [null, null, "User already exists"];
        }

        [$user, $biz] = DB::transaction(function () use ($user_data, $biz_data, $image_path) {
            // 1 - Create user
            $user =  User::create([
                'name' => $user_data['name'],
                'email' => $user_data['email'],
                'phone_code' => $user_data['phone_code'],
                'phone' => $user_data['phone'],
                'password' => AccountService::hash($user_data['password']),
            ]);

            // 2 - Save image
            $path = $image_path;

            // 3 - Create biz
            $biz = Biz::create([
                'user_id' => $user->id,
                'name' => $biz_data['biz_name'],
                'descr' => $biz_data['descr'],
                'trade' => $biz_data['trade'],
                'url' => $biz_data['website'],
                'main_img' => $path,
                'email' => $user->email,
                'phone_code' => $user->phone_code,
                'phone' => $user->phone,
            ]);

            return [$user, $biz];
        });

        return [$user, $biz, null];
    }
}
