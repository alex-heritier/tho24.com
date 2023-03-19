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

    public function showConversation(Request $request, int $id)
    {
        $biz = Biz::find($id);

        $customer_user_id = Auth::id();
        $biz_user_id = $biz->user_id;
        $messages = Message::where(function ($builder) use ($customer_user_id, $biz_user_id) {
            return $builder
                ->where(['snd_id' => $customer_user_id, 'rcv_id' => $biz_user_id])
                ->orWhere(['snd_id' => $biz_user_id, 'rcv_id' => $customer_user_id]);
        });

        return view('/biz/chat')->with(['biz' => $biz, 'messages' => $messages->get()]);
    }
}
