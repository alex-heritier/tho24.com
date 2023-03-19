@extends('layouts.app')

@section('title', 'Business network')

@section('style')
    <style>
        #search-field {
            display: flex;
            flex-direction: column;
            gap: 6px;
            align-items: flex-end;
            text-align: center;
            padding: 30px 20px 14px;
            background-color: lightblue;
        }

        #search {
            width: 100%;
            margin: auto;
            font-size: 20px;
            padding: 18px;
            border: 1px solid;
            border-color: #D1D1D5;
            border-radius: 4px;
            box-sizing: border-box;
        }

        #business-listing {
            padding-top: 20px;
        }

        #business-listing img {
            padding: 0 10px;
            width: 100%;
            object-fit: contain;
            object-position: center;
            aspect-ratio: calc(16/9);
            /* border: 1px solid lightgray; */
            box-sizing: border-box;
        }

        #business-listing a {
            text-decoration: none;
            overflow: hidden;
        }

        .biz-item {
            margin: 20px 0;
        }

        .biz-item .info {
            padding: 8px;
        }

        .biz-item p,
        .biz-item h2 {
            color: black;
            text-decoration: none;
        }

        .district-picker {
            border: 1px solid lightgray;
            border-radius: 4px;
            background-color: white;
            padding: 4px 8px;
            color: #222;
            font-size: 0.9rem;
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
            let url = '/biz_search';
            
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

            let bizListing = document.getElementById('business-listing');
            bizListing.innerHTML = response;
        }

        function onInputChanged(event) {
            console.log("FIRED");

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
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (pos) {
                    // console.log(pos);
                    let data = `${pos.coords.latitude}:${pos.coords.longitude}`;
                    document.cookie = `my_latlng=${data}; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/`;
                });
            }
        });
    </script>
@endsection

@section('content')
    <div class="nav-bar">
        <span>{{ config('app.name') }}</span>
        <div style="flex-grow: 1"></div>
        @auth
            <a href="/account"><i class="fa-solid fa-user"></i></a>
        @endauth
        @guest
            <a href="/register">Sign in</a>
        @endguest
        <a id="menu-btn" href="#"><i class="fa-solid fa-bars"></i></a>
    </div>

    <div id="search-field">
        <input type="text" id="search" name="search" placeholder="Search by business name" />
        <select class="district-picker">
            @foreach ($districts as $district)
                @if ($district)
                    <option value="{{ $district['code'] }}">{{ $district['name'] }}</option>
                @else
                    <option disabled>------</option>
                @endif
            @endforeach
        </select>
    </div>

    <div id="business-listing">
        @include('biz/partial/index', ['bizs'=>$bizs])
    </div>
@endsection
