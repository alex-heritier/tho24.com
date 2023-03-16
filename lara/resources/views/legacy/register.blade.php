<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Sign In | Bizzy</title>

    @vite(['resources/css/style.css'])

    <style>
        #main-content {
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px;
        }

        #button-container {
            display: flex;
            margin: 20px auto;
            width: 80%;
            justify-content: space-evenly;
            gap: 20px;
        }

        #button-container button {
            padding: 6px;
        }


        #button-container button.btn-on {
            font-weight: bold;
        }

        label {
            display: block;
        }

        #loc-picker {
            display: flex;
            justify-content: space-between;
        }

        select {
            margin: 8px 0;
            padding: 4px;
            text-align: center;
        }

        option.inactive {
            display: none;
        }

        #file-error:empty::before {
            content: "\00a0";
        }
    </style>

    <script type="text/javascript">
        function validateSize(input) {
            const file = input.files[0];
            const fileSize = file.size / 1024.0 / 1024.0; // in MiB
            const fileType = file.type;
            console.log("FILE SIZE", fileSize);

            const inputError = document.getElementById('file-error');

            // 1 - Validate file type
            const validFileTypes = ['image/png', 'image/jpeg'];
            if (!validFileTypes.includes(fileType)) {
                input.value = null;
                inputError.innerText = "File must be an image";
                return;
            }

            // 2 - Validate image size
            if (fileSize >= 2) {
                input.value = null;
                inputError.innerText = "File must be under 2MB";
            } else {
                inputError.innerText = null;
            }
        }

        async function setupLocationDropdown() {
            let onDistrictChange = function () {
                // console.log('DATA', this.value);
                Array.from(document.querySelectorAll(`select[name=ward] option[x-district=${this.value}]`)).forEach((e) => e.classList.remove('inactive'));
                Array.from(document.querySelectorAll(`select[name=ward] option:not([x-district=${this.value}])`)).forEach((e) => e.classList.add('inactive'));

                document.querySelector('select[name=ward]').value = document.querySelectorAll(`option[x-district=${this.value}]`)[0].value;
            };

            document.querySelector('select[name=district]').addEventListener("change", onDistrictChange);
        }

        window.addEventListener("load", function () {
            document.getElementById("register-button").addEventListener("click", function () {

                // Switch form contents
                document.getElementById("register-form").style.display = "block";
                document.getElementById("existing-account-form").style.display = "none";

                // Toggle button class
                document.getElementById("register-button").classList.add('btn-on');
                document.getElementById("existing-account-button").classList.remove('btn-on');
            });
            document.getElementById("existing-account-button").addEventListener("click", function () {
                // Switch form contents
                document.getElementById("register-form").style.display = "none";
                document.getElementById("existing-account-form").style.display = "block";

                // Toggle button class
                document.getElementById("register-button").classList.remove('btn-on');
                document.getElementById("existing-account-button").classList.add('btn-on');
            });

            setupLocationDropdown();
        });
    </script>
</head>

<body>
    <div id="sign-up-screen">
        <div id="button-container">
            <button id="register-button" class="btn-on">Register</button>
            <button id="existing-account-button">Existing Account</button>
        </div>
        
        @if(Session::has('email'))
            <p class="alert">{{ Session::get('email') }}</p>
        @endif
        
        <div id="main-content">
            <div id="register-form">
                <!-- Form elements for registering a new account -->
                <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="name" value="Billy Bob" />
                    <input type="hidden" name="phone_code" value="1" />

                    <!-- Account info -->
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" /><br>
                    <label for="phone">Phone Number:</label>
                    <input type="phone" id="phone" name="phone" /><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" /><br>

                    <!-- Business info -->
                    <br>
                    <label for="biz_name">Business Name:</label>
                    <input type="text" id="biz_name" name="biz_name" /><br>
                    <label for="descr">Description:</label>
                    <input type="text" id="descr" name="descr" /><br>
                    <label for="website">Website:</label>
                    <input type="text" id="website" name="website" /><br>

                    <!-- Business trade -->
                    <select name="trade">
                        <option value="electrician">Electrician</option>
                        <option value="plumber">Plumber</option>
                        <option value="carpenter">Carpenter</option>
                        <option value="hvac">HVAC technician</option>
                        <option value="welder">Welder</option>
                        <option value="mechanic">Mechanic</option>
                        <option value="painter">Painter</option>
                        <option value="roofer">Roofer</option>
                        <option value="mason">Mason</option>
                        <option value="landscaper">Landscaper</option>
                        <option value="drywall">Drywall installer</option>
                        <option value="insulator">Insulator</option>
                        <option value="concrete">Concrete worker</option>
                        <option value="glazier">Glazier</option>
                        <option value="flooring">Flooring installer</option>
                        <option value="sheetmetal">Sheet metal worker</option>
                        <option value="bricklayer">Bricklayer</option>
                        <option value="ironworker">Ironworker</option>
                    </select>
                    <br>

                    <!-- Business location (loaded dynamically) -->
                    <div id="loc-picker">
                        <select class="notranslate" name="district">
                            @foreach ($districts as $district)
                                <option value="{{ $district["code"] }}">{{ $district["name"] }}</option>
                            @endforeach
                        </select>
                        <select class="notranslate" name="ward">
                            @foreach ($districts as $district)
                                @foreach ($district['ward'] as $ward)
                                    <option 
                                        class="{{ $district == $districts[0] ? '' : 'inactive' }}" 
                                        x-district="{{ $district["code"] }}" 
                                        value="{{ $ward["code"] }}">{{ $ward["name"] }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <input onchange="validateSize(this)" type="file" name="image" />
                    <p id="file-error">&nbsp;</p>
                    <br>

                    <input type="submit" value="Submit" />
                </form>
            </div>
            <div id="existing-account-form" style="display:none">
                <!-- Form elements for logging into an existing account -->
                <form method="post" action="{{ route('login') }}">
                    @csrf

                    <label for="login">Login:</label>
                    <input type="text" id="login" name="email" placeholder="Email"><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>