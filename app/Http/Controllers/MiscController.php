<?php

namespace App\Http\Controllers;

use App\Mail\DummyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MiscController extends Controller
{
    public function email_tester_view(Request $request)
    {
        return view('misc/email_tester')->with(['email'=>$request->email]);
    }

    public function email_tester_action(Request $request)
    {
        $email_body = $request->email_body;
        $recipient = $request->recipient_email;

        $result = Mail::to($recipient)->send(new DummyEmail(recipient_email: $recipient, custom_msg: $email_body))->getSymfonySentMessage()->toString();

        $msg = "$result %%% $recipient %%% $email_body";

        return response($msg);
    }
}
