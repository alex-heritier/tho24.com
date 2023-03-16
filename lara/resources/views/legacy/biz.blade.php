@extends('layouts.app')

@section('title', $biz['name'])

@section('style')
    <style>
        .content {
            padding: 10px;
        }

        img {
            width: 100%;
            aspect-ratio: 16/9;
            box-sizing: border-box;
        }

        #signup-btn {
            display: block;
            margin: auto;
            background-color: #eee;
            padding: 10px;
            border: 1px grey solid;
            border-radius: 4px;
            font-weight: bold;
        }

        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
@endsection

@section('content')
    <div class="nav-bar">
        <a href="/"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <div class="spacer"></div>
        <i class="fa-solid fa-bars"></i>
    </div>

    <img src="{{ $biz["main_img"] }}" />

    @auth
        <div class="content open">
            <h2>{{ Str::ucfirst($biz['trade']) }}</h2>
            <p>{{ $biz['name'] }}</p>
            <p>{{ $biz['descr'] }}</p>

            <br/>
            <h3>Contact</h3>
            <p>{{ $biz['email'] }}</p>
            <p>{{ '+'.$biz['phone_code'].' '.$biz['phone'] }}</p>

            {{-- <br/>
            <h3>Location</h3>
            <p>{{ $biz['district'] }}, {{ $biz['ward'] }}</p> --}}
        </div>
    @endauth
    @guest
        <div class="content locked">
            <h2>Sign up for free to view this</h2>
            <ul></ul>
                <li>Get access to our tradesman network</li>
                <li>Check prices and previous work history</li>
                <li>Read reviews left by other Bizzy members</li>
            </ul>

            <br/>
            <a href="/register"><button id="signup-btn">Sign up for free</button></a>
            {{-- <p>Sign up for free</p>
            <input type="email" placeholder="Your email" />
            <input type="submit" /> --}}
        </div>
    @endguest
@endsection