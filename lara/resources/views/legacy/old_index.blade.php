<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <title>Bizzy: Business Network</title>

    @vite(['resources/css/style.css'])

    <style>
        #header {
            padding: 12px 0;
        }

        #header-buttons {
            display: flex;
            /* justify-content: flex-end; */
            justify-content: center;
            gap: 10px;
        }

        #header-buttons a {
            width: 100px;
            padding: 10px 0;
            text-align: center;
            text-decoration: none;
            color: black;
        }

        #header-buttons a:hover {
            color: blue;
        }

        #search-field {
            text-align: center;
            padding: 50px 0;
            background-color: lightblue;
        }

        #search {
            width: 80%;
            height: 40px;
            font-size: 20px;
            padding: 18px;
            border: 1px solid;
            border-color: #D1D1D5;
            border-radius: 4px;
        }

        #business-listing {
            /* padding: 10px; */
            padding-top: 20px;
        }

        #business-listing img {
            width: 100%;
            object-fit: contain;
            object-position: center;
            aspect-ratio: calc(16/9);
            border: 1px solid lightgray;
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

        @media only screen and (min-width: 600px) {
            #business-listing {
                margin: auto;
                width: 60%;
            }
        }
    </style>

    <script>
        let timer = null;

        // Function to get the value of a cookie
        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length == 2) return parts.pop().split(";").shift();
        }

        async function searchBiz(searchText) {
            let url = '/biz_search'; // '/svr/biz_search.php';
            if ((searchText || '').length > 0) {
                url = url + "/" + searchText;
            }
            let response = await fetch(url)
                .then((r) => r.text())
                .catch((err) => console.log("ERROR", err));
            console.log(response);

            let bizListing = document.getElementById('business-listing');
            bizListing.innerHTML = response;
            // response.forEach((e) => {
            //     /*
            //     <div class="biz-item">
            //         <img src="https://www.pho24.com.vn/wp-content/uploads/2018/10/Sala-1-2.jpg" />
            //         <div class="info">
            //             <p>Pho 24, the best pho ever</p>
            //             <p>555-555-5555 | support@pho24.vn</p>
            //         </div>
            //     </div>
            //     */
            //     let outerDiv = document.createElement('div');
            //     outerDiv.className = "biz-item";

            //     let img = document.createElement("img");
            //     img.src = e["main_img"];

            //     let infoDiv = document.createElement('div');
            //     infoDiv.className = "info";

            //     let title = document.createElement("h2");
            //     title.innerText = `${e["name"]} | ${e["trade"] || '?'}`;

            //     let descr = document.createElement("p");
            //     descr.innerText = e["descr"];

            //     infoDiv.appendChild(title);
            //     infoDiv.appendChild(descr);

            //     outerDiv.appendChild(img);
            //     outerDiv.appendChild(infoDiv);

            //     let base = document.createElement("a");
            //     base.href = "/biz.html?id=" + e["id"];

            //     base.appendChild(outerDiv);

            //     bizListing.appendChild(base);
            // });
        }

        window.addEventListener("load", function () {
            // // Check for the existence of the cookie
            // let key = "session_data";
            // let altBtn = document.getElementById("alt-btn");
            // if (getCookie(key)) {
            //     altBtn.innerText = "Account";
            //     altBtn.href = "/account.html";
            // } else {
            //     altBtn.innerText = "Sign In";
            //     altBtn.href = "/register.html";
            // }

            // // searchBiz(null);

            let searchField = document.getElementById('search');
            search.addEventListener("input", function (e) {
                console.log(e);

                let duration = 250; // millis
                let data = searchField.value;
                if (timer !== null) {
                    clearTimeout(timer);
                }
                timer = setTimeout(() => searchBiz(data), duration);
            });

            // Check current location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (pos) {
                    console.log(pos);

                    let data = `${pos.coords.latitude}:${pos.coords.longitude}`;
                    document.cookie = `my_latlng=${data}; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/`;
                });
            }
        });
    </script>
</head>

<body>
    <div id="header">
        <div id="header-buttons">
            <a id="explore-btn" href="#">Explore</a>
            {{-- <a id="alt-btn"></a> --}}
            @auth
                <a href="/account">Account</a>
            @endauth
            @guest
                <a href="/register">Sign in</a>
            @endguest
        </div>
    </div>

    <div id="search-field">
        <input type="text" id="search" name="search" placeholder="Name, email, or trade">
    </div>

    <div id="business-listing">
        <!-- <div class="biz-item">
            <img src="https://www.pho24.com.vn/wp-content/uploads/2018/10/Sala-1-2.jpg" />
            <div class="info">
                <p>Pho 24, the best pho ever</p>
                <p>555-555-5555 | support@pho24.vn</p>
            </div>
        </div>
        <div class="biz-item">
            <img
                src="https://media.dautuvietnam.com.vn/2020/09/23/9861/1600834272-dautuvietnam-su-chung-lai-cua-highlands-coffee-la-ban-dap-cho-the-luc-khac.jpg" />
            <div class="info">
                <p>Popular coffee shop that uses high-quality ingredients.</p>
                <p>555-555-5555 | info@highlands.vn</p>
            </div>
        </div> -->

        @include('biz/partial/index', ['bizs'=>$bizs])
    </div>

</body>

</html>