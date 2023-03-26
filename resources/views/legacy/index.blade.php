@extends('layouts.app')

@section('title', 'Business network')

@section('style')
    <style>
        :root {
            --search-padding: 14px;
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
            font-size: 20px;
            padding: var(--search-padding) var(--search-padding) var(--search-padding) calc(var(--search-padding) + 24px);
            border: 1px solid #D1D1D5;
            border-radius: 10px 0 0 10px;
            box-sizing: border-box;
            grid-row: 1;
            grid-column: 1;
            font-size: 1rem;
        }

        #search-box button {
            border: 1px solid #D1D1D5;
            border-radius: 0 10px 10px 0;
            box-sizing: border-box;
            padding: 0 var(--search-padding);
            grid-row: 1;
            grid-column: 2;
        }

        #intro-section {
            height: calc(80vh - var(--nav-height));
            background-color: lightskyblue;
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

        // Function to get the value of a cookie
        // function getCookie(name) {
        //     var value = "; " + document.cookie;
        //     var parts = value.split("; " + name + "=");
        //     if (parts.length == 2) return parts.pop().split(";").shift();
        // }

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

            let bizListing = document.getElementById('biz-list');
            bizListing.innerHTML = response;
        }

        function onInputChanged(event) {
            // console.log("FIRED");

            let duration = 250; // millis
            let searchText = document.getElementById('search').value;
            let district = document.querySelector('.district-picker').value;
            if (timer !== null) {
                clearTimeout(timer);
            }
            timer = setTimeout(() => searchBiz(searchText, district), duration);
        }

        window.addEventListener("load", function () {
            let searchField = document.getElementById('search');
            let districtPicker = document.querySelector('.district-picker');
            search.addEventListener("input", onInputChanged);
            districtPicker.addEventListener("change", onInputChanged);

            // Check current location
            // if (navigator.geolocation) {
            //     navigator.geolocation.getCurrentPosition(function (pos) {
            //         // console.log(pos);
            //         let data = `${pos.coords.latitude}:${pos.coords.longitude}`;
            //         document.cookie = `my_latlng=${data}; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/`;
            //     });
            // }
        });
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
                <input type="text" id="search" name="search" placeholder="How can we help?" />
                <button>Search</button>
            </div>
            <select class="district-picker">
                @foreach ($districts as $district)
                    @if ($district)
                        <option value="{{ $district['code'] }}">{{ $district['name'] }}</option>
                    @else
                        <option disabled></option>
                    @endif
                @endforeach
            </select>
        </div>
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
