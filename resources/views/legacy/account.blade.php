@extends('layouts.app')

@section('title', 'Account Settings')

@section('style')
    <style>
        .content {
            padding: 10px;
        }

        #logout-btn {
            width: 80%;
            margin: auto;
            margin-top: 50px;
            display: block;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .inbox-btn button {
            display: flex;
            margin-top: 10px;
            gap: 10px;
            align-items: center;
            background-color: aliceblue;
            border: 1px solid lightgray;
            border-radius: 4px;
        }
    </style>
@endsection

@section('content')
    <div class="nav-bar">
        <x-back-button url="/" />
        <span>My Account</span>
        <div class="spacer"></div>
    </div>

    <div class="content">
        <p>Email: <b>{{ session('my.email') }}</b></p>

        <a href="/users/{{ Auth::id() }}/messages" class="inbox-btn">
            <button>
                <i class="fa-solid fa-inbox"></i>
                <span>Inbox</span>
            </button>
        </a>

        <form method="post" action="{{ route('logout') }}">
            @csrf
            <input type="submit" id="logout-btn" value="Log out" />
        </form>
    </div>
@endsection