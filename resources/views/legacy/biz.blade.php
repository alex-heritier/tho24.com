@extends('layouts.page')


@section('title', $biz['name'])


@section('script')
<script>
    function onCalendarCellClick(event) {
        if (this.classList.contains('busy')) {
            this.classList.remove('busy');
            this.classList.add('open');
        } else {
            this.classList.add('busy');
            this.classList.remove('open');
        }
        // console.log(event, this);
    }

    function setupCalendarHandlers() {
        const calendarCells = document.querySelectorAll('.calendar-cell');
        // console.log("CELLS", calendarCells);
        calendarCells.forEach(e => e.addEventListener('click', onCalendarCellClick));
    }

    window.addEventListener("load", function () {
        // setupCalendarHandlers();
    });
</script>
@endsection


@section('content')
<section id="biz--show">

    {{-- BANNER IMAGE --}}
    <img src="/{{ $biz["main_img"] }}" />

    {{-- DYNAMIC CONTENT --}}
    @auth
    <div class="content open">
        {{-- BIZ INFO --}}
        <div class="info-section">
            <h3>{{ $biz['name'] }}&nbsp;&nbsp;•&nbsp;&nbsp;{{ $biz->prettyTrade() }}</h3>
            <p>{{ $biz['descr'] }}</p>
        </div>

        {{-- RATING AND REVIEWS --}}
        <div class="info-section">
            <h3>{{ __('Rating') }}</h3>
            <x-rating-field :rating="$avg_rating" :rating-count="$total_review_count" />

            @foreach ($reviews as $review)
            <div class="review">
                <p>{{ $review['rating'] }} out of 5<span class="timeago"> - {{ $review['created_at']->diffForHumans()
                        }}</span></p>
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

        {{-- AVAILABILITY --}}
        <div class="info-section" style="display: none">
            <h3>{{ __('Schedule an appointment') }}</h3>
            <div id="calendar">
                @for ($i = 0; $i < (5 + 1); $i++) @for ($j=0; $j < 7; $j++) @if ($i==0) <span
                    style="text-align: center">{{ ['Su','M','Tu','W','Th','F','Sa'][$j] }}</span>
                    @else
                    <a href="/biz/{{ $biz['id'] }}/agenda/{{ $calendar[$i - 1][$j]['pretty_date'] }}"
                        class="calendar-cell {{ (7 * $i + $j) % 3 == 0 ? 'open' : 'busy' }}">
                        {{ $calendar[$i - 1][$j]['dotm'] }}
                    </a>
                    @endif
                    @endfor
                    @endfor
            </div>
        </div>

        {{-- CONTACT INFO --}}
        <div class="info-section contact">
            <h3>{{ __('Contact') }}</h3>
            <p>{{ $biz['email'] }}</p>
            <p>{{ '+'.$biz['phone_code'].' '.$biz['phone'] }}</p>

            <div class="btn-row">
                <a href="mailto:{{ $biz['email'] }}" class="t24-btn">
                    <button>
                        <i class="fa-regular fa-at"></i>
                        <span>{{ __('Email') }}</span>
                    </button>
                </a>
                <a href="tel:{{ $biz['phone_code'].$biz['phone'] }}" class="t24-btn">
                    <button>
                        <i class="fa-solid fa-phone"></i>
                        <span>{{ __('Phone') }}</span>
                    </button>
                </a>
                <a href="/chat/{{ Auth::id() }}::{{ $biz['user_id'] }}" class="t24-btn">
                    <button>
                        <i class="fa-regular fa-message"></i>
                        <span>{{ __('Send a message') }}</span>
                    </button>
                </a>
            </div>
        </div>

        {{-- <br />
        <h3>Location</h3>
        <p>{{ SaigonService::prettyDistrict($biz['district']) }}, {{ $biz['ward'] }}</p> --}}
    </div>
    @else
    <div class="content locked">
        <h2>{{ __('Sign up for free to view this') }}</h2>
        <ul></ul>
        <li>{{ __('Get access to our tradesman network') }}</li>
        <li>{{ __('Check prices and previous work history') }}</li>
        <li>{{ __('Read reviews left by other Tho24.com members') }}</li>
        </ul>

        <br />
        <a id="signup-btn" class="btn btn--big" href="/register">{{ __('Sign up for free') }}</a>
    </div>
    @endauth

</section>
@endsection