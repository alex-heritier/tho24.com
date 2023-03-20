@extends('layouts.app')

@section('title', 'Chat with ' . $biz['name'])

@section('style')
    <style>
        .nav-bar {
            border-bottom: 1px solid lightgray;
            box-sizing: border-box;
        }

        #chat {
            height: calc(100vh - var(--nav-height));
            display: flex;
            flex-direction: column;
        }

        #msg-list {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            padding: 10px;
        }

        .chat-bubble {
            padding: 4px 10px;
            margin: 2px 0;
            border-radius: 6px;
        }

        .chat-bubble.me {
            align-self: flex-end;
            background-color: dodgerblue;
            color: white;
        }

        .chat-bubble.other {
            border: 1px solid lightgray;
            box-sizing: border-box;
            align-self: flex-start;
            background-color: white;
        }

        #send-box {
            display: flex;
            gap: 8px;
            border-top: 1px solid lightgray;
            padding: 4px 10px;
        }

        #send-box input[type="text"] {
            flex-grow: 1;
            border: 0.5px solid lightgray;
            border-radius: 2px;
            padding: 2px 4px;
        }

        .error {
            display: block;
            margin: auto;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="nav-bar">
        <x-back-button url="/biz?id={{ $biz['id'] }}" />
        <span>{{ $biz['name'] }}</span>
        <div class="spacer"></div>
    </div>

    <div id="chat">
        <div id="msg-list">
            @error('data')
                <div class="error">
                    <p>{{ $errors->first('data') }}</p>
                    <a href="/">Go back</a>
                </div>
            @else
                @foreach ($messages as $msg)
                    <div class="chat-bubble {{ Auth::id() === $msg['snd_id'] ? 'me' : 'other' }}">
                        <p>{{ $msg['msg_text'] }}</p>
                    </div>
                @endforeach
            @enderror
        </div>

        <form id="send-box" method="post" action="/messages">
            @csrf

            <input hidden name="snd_id" value="{{ Auth::id() }}" />
            <input hidden name="rcv_id" value="{{ $biz['user_id'] }}" />
            <input type="text" name="msg_text" placeholder="Enter a message" required minlength="10" />
            <input type="submit" value="Send" />
        </div>
    </div>
@endsection