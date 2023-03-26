@extends('layouts.app')

@section('title', 'Business network')

@section('style')
    <style>
        :root {
            --search-padding: 14px;
            --search-rounding: 4px;
            --color-primary: lightskyblue;
            --color-secondary: #FB8500;
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
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: stretch;
            padding: 6px 10px;
        }

        #overlay-search-bar i {
            align-self: center;
            padding: 4px;
        }

        #overlay-search-bar input {
            flex-grow: 1;
            padding: 4px;
            border: none;
            outline: none;
        }

        #overlay-search-bar select {
            width: 90px;
            font-size: 0.9rem !important;
        }

        #overlay-search-bar button {
            padding: 12px 20px;
            border: none;
            border-radius: var(--search-rounding);
            background-color: var(--color-secondary);
            color: white;
        }

        #search-result-list {
            border-top: 2px solid black;
        }

        #intro-section {
            height: calc(80vh - var(--nav-height));
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

        #biz-section {
            padding-top: 32px;
        }

        #biz-section img {
            padding: 0 10px;
            width: 100%;
            object-fit: contain;
            object-position: center;
            aspect-ratio: calc(16/9);
            box-sizing: border-box;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        h2 {
            font-size: 1.5rem;
            margin: 14px;
        }

        .biz-item {
            margin: 20px 12px;
            padding: 4px;
            display: flex;
            flex-direction: column;
            gap: 4px;
            border: 0.5px solid lightgray;
            border-radius: 6px;
        }

        .biz-item .info {
            padding: 8px;
        }

        .biz-item p,
        .biz-item h2 {
            color: black;
            text-decoration: none;
        }

        .biz-item .title {
            font-weight: 600;
        }

        .district-picker {
            border: 1px solid lightgray;
            border-radius: 4px;
            background-color: white;
            padding: 4px 8px;
            color: #222;
            font-size: 0.9rem;
        }

        footer {
            padding: 30px 10px;
            background-color: #f8f8f8;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }

        footer .links a {
            display: inline;
            color: inherit;
            text-decoration: none;
        }

        footer .links span:not(:first-child)::before {
            content: " •  ";
            white-space: pre-wrap;
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

        async function searchBiz(searchText, district) {
            let url = window.location.origin + '/biz_search';
            
            { // district
                const token = district || '';
                url = url + "/" + token;
            }
            { // searchText
                const token = searchText || '';
                url = url + "/" + token;
            }

            console.log(url);
            let response = await fetch(url)
                .then((r) => r.text())
                .catch((err) => console.log("ERROR", err));
            // console.log(response);

            let bizListing = document.getElementById('search-result-list');
            bizListing.innerHTML = response;
        }

        function onSearchTriggered(event) {
            // console.log("FIRED");

            const duration = 250; // millis
            const searchText = document.querySelector("#overlay-search-bar input").value;
            const district = document.querySelector('#district-picker').value;

            if (timer !== null) {
                clearTimeout(timer);
            }
            if ((searchText ?? "").length > 0) {
                timer = setTimeout(() => searchBiz(searchText, district), duration);
            } else {
                document.getElementById('search-result-list').innerHTML = '';
            }
        }

        function onSearchFocus(input) {
            const searchOverlay = document.getElementById('search-overlay');
            searchOverlay.classList.remove('hidden');
            document.querySelector('#search-overlay input').focus();
        }

        function onCloseOverlayClick(button) {
            const searchOverlay = document.getElementById('search-overlay');
            searchOverlay.classList.add('hidden');
        }
    </script>
@endsection

@section('content')
    <div class="nav-bar">
        <span style="font-size: 1.2rem;">{{ config('app.name') }}</span>
        <div style="flex-grow: 1"></div>
        @auth
            <a href="/account"><i class="fa-solid fa-user"></i></a>
        @endauth
        @guest
            <a href="/register">{{ __('Sign in') }}</a>
        @endguest
        <a id="menu-btn" href="#"><i class="fa-solid fa-bars"></i></a>
    </div>

    <div id="intro-section">
        <h1>{{ __('Find top-rated certified pros in your area.') }}</h1>

        <div id="search-form">
            <div id="search-box">
                <i class="fa fa-search"></i>
                <input type="text" id="search" name="search" placeholder="{{ __('How can we help?') }}" readonly onfocus="onSearchFocus(this)"  />
                <button>Search</button>
            </div>
        </div>
    </div>

    <div id="search-overlay" class="hidden">
        <div id="overlay-search-bar">
            <i class="fa fa-arrow-left" onclick="onCloseOverlayClick(this)"></i>
            <input placeholder="{{ __('How can we help?') }}" oninput="onSearchTriggered(event)" />
            <select id="district-picker" onchange="onSearchTriggered(event)">
                @foreach ($districts as $district)
                    @if ($district)
                        <option value="{{ $district['code'] }}">{{ $district['name'] }}</option>
                    @else
                        <option disabled></option>
                    @endif
                @endforeach
            </select>
            <button>Go</button>
        </div>
        <div id="search-result-list"></div>
    </div>

    <div id="biz-section">
        <h2>{{ __('Popular businesses') }}</h2>

        <div id="biz-list">
            @include('biz/partial/index', ['bizs'=>$bizs])
        </div>
    </div>

    <footer>
        <div class="links">            
            <span><a href="/privacy">{{ __('Privacy policy') }}</a></span>
            <span><a href="/blog">Blog</a></span>
        </div>

        <p>tho24.com &copy; 2023</p>
    </footer>
@endsection
