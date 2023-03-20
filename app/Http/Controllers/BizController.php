<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biz;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class BizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bizs = Biz::all();
        if (request()->ajax()) {
            return view('biz/partial/index')->with('bizs', $bizs);
        } else {
            return view('biz/index')->with('bizs', $bizs);
        }
    }

    public function show(Request $request, $id)
    {
        $biz = Biz::with('reviews')->find($id);
        return view('legacy/biz', [
            'biz' => $biz,
            'avg_rating' => $biz->averageRating(),
            'reviews' => $biz->reviews->take(2),
        ]);
    }

    // public function showConversation(Request $request, int $id)
    // {
    //     $biz = Biz::find($id);

    //     $customer_user_id = Auth::id();
    //     $biz_user_id = $biz->user_id;

    //     if (!$customer_user_id || !$biz_user_id) {
    //         if (!$customer_user_id) {
    //             $error = ['data' => 'Invalid user session'];
    //         } else {
    //             $error = ['data' => 'Business does not exist'];
    //         }
    //         return view('/biz/chat')
    //             ->with(['biz' => $biz, 'messages' => []])
    //             ->withErrors($error);
    //     }
        
    //     $messages = Message::where(['snd_id' => $customer_user_id, 'rcv_id' => $biz_user_id])
    //         ->orWhere(function ($builder) use ($customer_user_id, $biz_user_id) {
    //             return $builder
    //                 ->where('snd_id', $biz_user_id)
    //                 ->where('rcv_id', $customer_user_id);
    //         })
    //         ->orderByDesc('created_at');

    //     return view('/biz/chat')->with(['biz' => $biz, 'messages' => $messages->get()]);
    // }
}
