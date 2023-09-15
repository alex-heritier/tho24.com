@extends('layouts.page')


@section('title', Str::ucfirst(config('app.name')) . ' | Expert Home Services')


@section('style')
<style>
    :root {
        --search-padding: 14px;
        --search-rounding: 4px;
        --color-primary: lightskyblue;
        --color-secondary: #FB8500;
    }

    #intro-section {
        height: calc(82vh - var(--nav-height));
        background-color: var(--color-primary);
        display: flex;
        flex-direction: column;
        gap: 10px;
        justify-content: center;
        align-items: stretch;
        padding: 10px;
    }

    #intro-section h1 {
        font-size: 2.2rem;
        line-height: 2.6rem;
        text-align: center;
        color: white;
    }

    #search-form {
        display: flex;
        flex-direction: column;
        gap: 6px;
        align-items: flex-end;
        text-align: center;
        padding: 30px 6px 14px;
    }

    #search-box {
        align-self: stretch;
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto;
    }

    #search-box i {
        margin-left: var(--search-padding);
        grid-row: 1;
        grid-column: 1;
        z-index: 1;
        align-self: center;
        justify-self: start;
    }

    #search-box input {
        width: 100%;
        padding: var(--search-padding) var(--search-padding) var(--search-padding) calc(var(--search-padding) + 24px);
        border: 1px solid #D1D1D5;
        border-radius: var(--search-rounding) 0 0 var(--search-rounding);
        box-sizing: border-box;
        grid-row: 1;
        grid-column: 1;
        font-size: 1rem;
    }

    #search-box button {
        /* border: 1px solid #D1D1D5; */
        border: none;
        border-radius: 0 var(--search-rounding) var(--search-rounding) 0;
        box-sizing: border-box;
        padding: 0 var(--search-padding);
        grid-row: 1;
        grid-column: 2;
        background-color: var(--color-secondary);
        color: white;
    }

    #search-overlay {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        overflow: auto;
        width: 100%;
        height: 100%;
        background-color: white;
        z-index: 2;
    }

    #search-overlay.hidden {
        display: none;
    }

    #overlay-search-bar {
        display: grid;
        grid-template-areas: "back search go";
        gap: 4px;
        grid-template-columns: 20px 1fr 48px;
        align-items: stretch;
        padding: 4px 14px;
    }

    #overlay-search-bar i {
        grid-area: back;
        align-self: center;
    }

    #overlay-search-bar input {
        grid-area: search;
        padding: 4px 10px;
        border: none;
        outline: none;
    }

    #overlay-search-bar button {
        grid-area: go;
        padding: 12px 0;
        border: none;
        border-radius: var(--search-rounding);
        background-color: var(--color-secondary);
        color: white;
        flex-basis: 100%;
    }

    #overlay-search-filters {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
    }

    #overlay-search-filters .search-filter {
        border: 1px solid lightgray;
        border-radius: var(--search-rounding);
        padding: 6px 4px;
        color: #222;
        font-size: 0.9rem;
    }

    #search-result-list {
        border-top: 2px solid black;
    }

    #trade-quick-search {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 32px;
        width: 80%;
        align-self: center;
        margin-top: 20px;
    }

    #trade-quick-search .item {
        display: flex;
        flex-direction: column;
        gap: 20px;
        object-position: center;
        text-align: center;
    }

    #trade-quick-search .item i {
        color: white;
    }

    #trade-quick-search .item p {
        color: #333;
        font-size: 0.85rem;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    h2 {
        font-size: 1.5rem;
        margin: 14px;
    }

    #howitworks-section {
        padding: 32px 0;
        background-color: #f5f5f2;
    }

    #howitworks-section .howitworks-item {
        padding: 18px 0;
    }

    #howitworks-section p,
    #howitworks-section i {
        margin: 8px 14px;
        line-height: 1.6rem;
    }

    #biz-section {
        padding: 32px 0;
    }

    .biz-item {
        margin: 20px 12px;
        padding: 4px;
        display: flex;
        flex-direction: row;
        align-items: stretch;
        gap: 4px;
        border: 0.5px solid lightgray;
        border-radius: 6px;
    }

    .biz-item img {
        display: block;
        height: 10vh;
        flex-grow: 0;
        padding: 0 10px;
        object-fit: contain;
        object-position: center;
        aspect-ratio: 1;
        box-sizing: border-box;
    }

    .biz-item .info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 2px;
        padding: 8px;
        flex-grow: 1;
    }

    .biz-item p,
    .biz-item h2 {
        color: black;
        text-decoration: none;
    }

    .biz-item .title {
        font-weight: 600;
    }

    @media only screen and (min-width: 600px) {
        #business-listing {
            margin: auto;
            width: 60%;
        }
    }
</style>
@endsection


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
        const response = await fetch(url, {
            method: "GET",
            headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
        })
            .then((r) => r.text())
            .catch((err) => console.log("ERROR", err));
        // console.log("Response: ", response);

        const bizListing = document.getElementById('search-result-list');
        let responseView = response ? response : '<p style="margin: 14px">{{ __('No results') }}</p>';
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
{{-- <div class="nav-bar">
    <span style="font-size: 1.2rem;">{{ config('app.name') }}</span>
    <div style="flex-grow: 1"></div>
    @auth
    <a href="/account"><i class="fa-solid fa-user"></i></a>
    @endauth
    @guest
    <a href="/register">{{ __('Sign in') }}</a>
    @endguest
    <a id="menu-btn" href="#"><i class="fa-solid fa-bars"></i></a>
</div> --}}

<div id="intro-section">
    <h1>{{ __('Find top-rated certified pros in your area.') }}</h1>

    <div id="search-form">
        <div id="search-box">
            <i class="fa fa-search"></i>
            <input type="text" id="search" name="search" placeholder="{{ __('How can we help?') }}" readonly
                onfocus="onIntroSearchFocus(this)" />
            <button>Search</button>
        </div>
    </div>

    <div id="trade-quick-search">
        @foreach (array_slice($trades, 2) as $key => $value)
        @php
        $iconClasses = match ($key) {
        'house_cleaning' => 'fa fa-soap',
        'water_delivery' => 'fa fa-droplet',
        'moving' => 'fa fa-dolly',
        'catering' => 'fa fa-bowl-rice',
        };
        @endphp
        <a class="item" href="#" onclick="showOverlay({tradeValue: '{{ $key }}'})">
            <i class="fa-2xl {{ $iconClasses }}"></i>
            <p>{{ $value }}</p>
        </a>
        @endforeach
    </div>
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
    <h2>{{ __('How it works') }}</h2>

    <div class="howitworks-item">
        <i class="fa-regular fa-xl fa-message"></i>
        <p><b>1. Tell us what you need</b></p>
        <p>From housecleaning to home cooking, we can help with it all.</p>
    </div>
    <div class="howitworks-item">
        <i class="fa-solid fa-xl fa-hammer"></i>
        <p><b>2. We'll connect you with pros nearby</b></p>
        <p>See your price and book an appointment right away.</p>
    </div>
    <div class="howitworks-item">
        <i class="fa-regular fa-xl fa-thumbs-up"></i>
        <p><b>3. Let us take care of the rest</b></p>
        <p>Now just wait for the appointment date and your service pro will arrive to make your dreams come true.</p>
    </div>
</div>

<div id="biz-section">
    <h2>{{ __('Popular businesses') }}</h2>

    <div id="biz-list">
        @foreach ($bizs as $biz)
        @include('biz/partial/show', ['biz' => $biz])
        @endforeach
    </div>
</div>

{{-- <footer>
    <div class="links">
        <span><a href="/privacy">{{ __('Privacy policy') }}</a></span>
        <span><a href="/blog">Blog</a></span>
    </div>

    <p>tho24.com &copy; 2023</p>
</footer> --}}
@endsection