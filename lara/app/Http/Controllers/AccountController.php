<?php

namespace App\Http\Controllers;

use App\Models\Biz;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    public function register(Request $request)
    {
        // 0 - Validate info
        $users = DB::table('users')
            ->where(function (Builder $query) use ($request) {
                $query->where('email', $request->email)
                    ->orWhere('phone', $request->phone);
            })
            ->get();
        if (!empty($users) && count($users) > 0) {
            // Log::debug('User already exists - ' . $users);
            return response("User already exists. $users", 500);
        }

        DB::transaction(function () use ($request) {
            // 1 - Create user
            $user =  User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_code' => $request->phone_code,
                'phone' => $request->phone,
                'password' => $request->password,
            ]);

            // ## - Create biz
            // 2a - Save image
            $path = $request->file('image')->store('images');

            // 2b - Create biz
            $biz = Biz::create([
                'user_id' => $user->id,
                'name' => $request->biz_name,
                'descr' => $request->descr,
                'trade' => $request->trade,
                'url' => $request->website,
                'main_img' => $path,  // TODO
                'email' => $user->email,
                'phone_code' => $user->phone_code,
                'phone' => $user->phone,
            ]);
        });
    }

    public function login()
    {
    }
}
