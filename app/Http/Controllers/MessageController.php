<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'snd_id'=>'required',
            'rcv_id'=>'required',
            'msg_text'=>'required',
        ]);

        $msg = Message::create($request->only(['snd_id','rcv_id','msg_text']));

        return redirect()->back();
    }
}
