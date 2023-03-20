@extends('layouts.app')

@section('title', 'Inbox')

@section('style')
    <style>
        .chat-item {
            display: block;
            margin: 10px;
            padding: 4px;
            border: 1px solid lightgray;
            border-radius: 4px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .chat-item .msg-text {
            font-style: italic;
        }
    </style>
@endsection

@section('content')
    <div class="nav-bar">
        <x-back-button />
        <span>Inbox</span>
        <div class="spacer"></div>
    </div>

    <div class="chat-list">
        @foreach ($messages as $msg)
            <a href="/chat/{{ $msg->snd_id }}::{{ $msg->rcv_id }}" class="chat-item">
                <p>Chat #{{ $msg->id }}</p>
                <p class="msg-text">{{ $msg->msg_text }}</p>
            </a>
        @endforeach
    </div>
@endsection