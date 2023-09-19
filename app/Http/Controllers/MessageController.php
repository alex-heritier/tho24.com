<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        Log::debug('Request: '.$request);

        try {
            $request->validate([
                'snd_id' => 'required',
                'rcv_id' => 'required',
                'msg_text' => 'required',
            ]);
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to send message']);
        }

        $chat_token = Message::buildUserToUserToken($request->input('snd_id'), $request->input('rcv_id'));
        $msg = Message::create([
            ...$request->only(['snd_id', 'rcv_id', 'msg_text']),
            'chat_token' => $chat_token,
        ]);

        return redirect()->back();
    }

    public function userInbox(Request $request, int $id)
    {
        /**
         * TODO make sure this actually works
         * this seems too complex
         */
        $sql = '
        SELECT messages.*
        FROM messages
        INNER JOIN (
            SELECT
                CASE
                    WHEN snd_id = :user_id1 THEN rcv_id
                    ELSE snd_id
                END AS other_user_id,
                MAX(created_at) AS latest_created_at
            FROM messages
            WHERE rcv_id = :user_id2 OR snd_id = :user_id3
            GROUP BY other_user_id
        ) AS latest
        ON (messages.snd_id = latest.other_user_id AND messages.rcv_id = :user_id4)
        OR (messages.rcv_id = latest.other_user_id AND messages.snd_id = :user_id5)
        WHERE messages.created_at = latest.latest_created_at
        ORDER BY latest.latest_created_at DESC
        ';

        $messages = DB::select($sql, [
            'user_id1' => $id,
            'user_id2' => $id,
            'user_id3' => $id,
            'user_id4' => $id,
            'user_id5' => $id,
        ]);

        return view('message.inbox')->with('messages', $messages);
    }

    public function showChat(Request $request, string $token)
    {
        [$id1, $id2] = explode('::', $token);

        $min_id = min($id1, $id2);
        $max_id = max($id1, $id2);
        $other_user = User::find((Auth::id() == $min_id) ? $max_id : $min_id);

        $fixed_token = Message::buildUserToUserToken($min_id, $max_id);

        // Log::debug(">> Auth::id() is " . Auth::id());
        // Log::debug(">> \$min_id is " . $min_id);
        // Log::debug(">> \$max_id is " . $max_id);
        // Log::debug(">> \$other_user is " . $other_user);

        $messages = Message::where('chat_token', $fixed_token)->orderBy('created_at', 'asc');

        return view('chat.show')->with(['ref_user' => $other_user, 'messages' => $messages->get()]);
    }
}
