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
            object-fit: contain;
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

        p {
            line-height: 1.5rem;
        }

        .info-section {
            padding: 10px 0;
        }

        .info-section h3 {
            font-size: 0.9rem;
        }

        .info-section p {
            font-size: 0.9rem;
        }

        .rating-stars i {
            width: 18px;
            height: 18px;
            object-position: center;
        }

        .rating-stars i.on {
            color: gold;
        }

        .review {
            margin: 4px 0;
        }

        .send-msg button {
            display: flex;
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
        <a href="/"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <div class="spacer"></div>
        <i class="fa-solid fa-bars"></i>
    </div>

    {{-- BANNER IMAGE --}}
    <img src="/{{ $biz["main_img"] }}" />

    {{-- DYNAMIC CONTENT --}}
    @auth
        <div class="content open">
            {{-- BIZ INFO --}}
            <div class="info-section">
                <h3>{{ $biz['name'] }}&nbsp;&nbsp;•&nbsp;&nbsp;{{ Str::ucfirst($biz['trade']) }}</h3>
                <p>{{ $biz['descr'] }}</p>
            </div>

            {{-- RATING AND REVIEWS --}}
            <div class="info-section">
                <h3>Rating</h3>
                <x-rating-field :rating="$avg_rating" />

                @foreach ($reviews as $review)
                    <div class="review">
                        <p>{{ $review['rating'] }} out of 5</p>
                        <p>"{{ $review['message'] }}"</p>                        
                    </div>
                @endforeach

                <form method="post" action="/reviews">
                    @csrf

                    <input type="hidden" name="biz_id" value="{{ $biz['id'] }}" />
                    <input type="text" placeholder="Leave a review" name="review_text" />
                    <input type="number" value="5" max="5" min="1" step="0.1" name="rating" />
                    <input type="submit" value="Send" />
                </form>

                @if($errors->has('review'))
                    <p>{{ $errors->first('review') }}</p>
                @endif
            </div>

            {{-- CONTACT INFO --}}
            <div class="info-section">
                <h3>Contact</h3>
                <p>{{ $biz['email'] }}</p>
                <p>{{ '+'.$biz['phone_code'].' '.$biz['phone'] }}</p>
                <a href="/chat/{{ Auth::id() }}::{{ $biz['user_id'] }}" class="send-msg">
                    <button>
                        <i class="fa-regular fa-message"></i>
                        <span>Send a message</span>
                    </button>
                </a>
            </div>

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
        </div>
    @endguest
@endsection