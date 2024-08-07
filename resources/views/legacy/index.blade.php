@extends('layouts.page')


@section('title', Str::ucfirst(config('app.name')) . ' | Jobs for University Students')
@section('meta-description', 'Find jobs for university students in Vietnam. We have a wide range of jobs from online
tutoring to salespeople. Build a quick CV and start applying now!')


@section('script')
<script>
    let timer = null;

    async function searchBiz(searchText, district, trade) {
        let url = window.location.origin + '/biz_search?';
        
        { // district
            const token = district || '';
            url = url + "district=" + token;
        }
        { // trade
            const token = trade || '';
            url = url + "&trade=" + token;
        }
        { // searchText
            const token = searchText || '';
            url = url + "&query=" + token;
        }

        console.log(url);
        const response = await axios.get(url)
            .then((r) => r.data)
            .catch((err) => console.log("ERROR", err));
        // console.log("Response: ", response);

        const bizListing = document.getElementById('search-result-list');
        const responseView = response || '<p style="margin: 14px">{{ __('No results') }}</p>';
        bizListing.innerHTML = responseView;
    }

    function onSearchTriggered(_) {
        // console.log("FIRED");

        const duration = 250; // millis
        // const searchText = document.querySelector("#overlay-search-bar input").value;
        const district = document.querySelector('#district-picker').value;
        const trade = document.querySelector('#trade-picker').value;

        if (timer !== null) {
            clearTimeout(timer);
        }

        timer = setTimeout(() => searchBiz(null, district, trade), duration);
        // if ((searchText ?? "").length > 0) {
        //     timer = setTimeout(() => searchBiz(searchText, district, trade), duration);
        // } else {
        //     document.getElementById('search-result-list').innerHTML = '';
        // }
    }

    function showOverlay({tradeValue}) {
        const searchOverlay = document.getElementById('search-overlay');
        searchOverlay.classList.remove('hidden');
        if (tradeValue) {
            const trade = document.querySelector('#trade-picker');
            trade.value = tradeValue;
        }
        onSearchTriggered(null);
    }

    function onIntroSearchFocus() {
        showOverlay({});
    }

    function onCloseOverlayClick() {
        const searchOverlay = document.getElementById('search-overlay');
        searchOverlay.classList.add('hidden');

        // const searchText = document.querySelector("#overlay-search-bar input");
        const district = document.querySelector('#district-picker');
        const trade = document.querySelector('#trade-picker');

        // Reset overlay state
        // searchText.value = '';
        district.value = district.children[0].value;
        trade.value = trade.children[0].value;
        document.getElementById('search-result-list').innerHTML = '';
    }

    function isOverlayShowing() {
        const overlay = document.getElementById('search-overlay');
        return !overlay.classList.has('hidden');
    }
</script>
@endsection


@section('content')
<div id="index-body">
    <div>
        <section id="intro">
            <h1>{!! \Illuminate\Support\Str::replace('. ', '.<br />', __('Jobs for students. Quick. Easy.')) !!}</h1>
            <h3>Find your dream job today!</h3>

            <a class="btn btn--text btn--jumbo index-hero-btn" href="/positions">Find a job</a>
        </section>
    </div>


    <div id="search-overlay" class="hidden">
        {{-- <div id="overlay-search-bar">
            <i class="fa fa-arrow-left" onclick="onCloseOverlayClick(this)"></i>
            <input placeholder="{{ __('How can we help?') }}" oninput="onSearchTriggered(event)" />
            <button>Go</button>
        </div> --}}

        <div id="overlay-search-filters">
            <i class="fa fa-arrow-left" onclick="onCloseOverlayClick(this)"></i>

            <select id="district-picker" class="search-filter" onchange="onSearchTriggered(event)">
                @foreach ($districts as $district)
                @if ($district)
                <option value="{{ $district['code'] }}">{{ $district['name'] }}</option>
                @else
                <option disabled></option>
                @endif
                @endforeach
            </select>

            <select id="trade-picker" class="search-filter" onchange="onSearchTriggered(event)">
                @foreach ($trades as $key => $val)
                @if ($key)
                <option value="{{ $key }}">{{ $val }}</option>
                @else
                <option disabled></option>
                @endif
                @endforeach
            </select>
        </div>

        <div id="search-result-list"></div>
    </div>

    <div id="howitworks-section">
        <section>
            <h2>{{ __('How it works') }}</h2>

            <div class="howitworks-item">
                <i class="fa-regular fa-xl fa-message"></i>
                <p><b>1. Search for job openings</b></p>
                <p>From online tutoring to salesperson, there's a job for everyone.</p>
            </div>
            <div class="howitworks-item">
                <i class="fa-solid fa-xl fa-hammer"></i>
                <p><b>2. Build a quick CV and start applying</b></p>
                <p>We guide you through building a professional CV to show off your talent.</p>
            </div>
            <div class="howitworks-item">
                <i class="fa-regular fa-xl fa-thumbs-up"></i>
                <p><b>3. Let our partner companies get back to you</b></p>
                <p>Now just wait for a response and your dream job may just be yours.</p>
            </div>
        </section>
    </div>

    <div id="biz-section">
        <section>
            <h2>{{ __('Popular businesses') }}</h2>

            <div id="biz-list">
                @foreach ($bizs as $biz)
                @include('biz/partial/show', ['biz' => $biz])
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection