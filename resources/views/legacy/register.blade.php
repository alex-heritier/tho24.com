@extends('layouts.app')

@section('title', 'Register')
@section('meta-description', 'Create an account to start finding professionals near you.')

@section('style')
    <style>
        #main-content {
            /* background-color: #f2f2f2;
            border: 1px solid #ccc; */
            padding: 20px;
            /* margin: 20px; */
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
            background-color: transparent;
            border: none;
            color: #777;
        }

        #button-container button.btn-on {
            color: #000;
        }

        label {
            display: block;
        }

        label[for] {
            margin-bottom: 4px; 
        }

        input {
            box-sizing: border-box;
        }

        input:not([type='submit']):not([type='checkbox']):not([name='phone']), select:not([name='phone_code']) {
            width: 100%;
            padding: 6px;
            margin-bottom: 12px;
        }

        input[type='submit'] {
            width: 100%;
            padding: 12px 0;
            border: none;
            border-radius: 4px;
            background-color: powderblue;
            font-size: 1.1rem;
        }

        #loc-picker {
            display: flex;
            gap: 10px;
        }

        #loc-picker>div {
            display: block;
            flex: 1;
            text-overflow: ellipsis;
        }

        option.inactive {
            display: none;
        }

        #file-error:empty::before {
            content: "\00a0";
        }

        p.alert {
            padding: 0 10px;
            color: black;
        }

        #phone-fields {
            height: 40px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: row;
            gap: 4px;
            align-items: stretch;
            align-content: stretch;
            box-sizing: border-box;
        }

        #phone-fields input[type="tel"] {            
            flex-grow: 1;
        }

        #phone-fields > * {
            padding: 6px 4px;
        }
    </style>
@endsection

@section('script')
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

        function onBizCheckChange(checkbox) {
            const checked = checkbox.checked;
            console.log("IS BIZ CHECK", checked);

            const el = document.getElementById('biz-form-section');
            if (checked) {
                el.style.display = 'block';
            } else {
                el.style.display = 'none';
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

                document.querySelector('p.alert').innerText = '';
            });
            document.getElementById("existing-account-button").addEventListener("click", function () {
                // Switch form contents
                document.getElementById("register-form").style.display = "none";
                document.getElementById("existing-account-form").style.display = "block";

                // Toggle button class
                document.getElementById("register-button").classList.remove('btn-on');
                document.getElementById("existing-account-button").classList.add('btn-on');

                document.querySelector('p.alert').innerText = '';
            });

            setupLocationDropdown();

            onBizCheckChange(document.querySelector('input[type="checkbox"]'));
        });
    </script>
@endsection

@section('content')
    <div class="nav-bar">
        <a href="/"><i class="fa fa-close"></i></a>
        <div class="spacer"></div>
    </div>

    @php
        $err_type = session('err_type');
        
        $reg_class = ($err_type === 'register' || $err_type === null) ? 'btn-on' : '';
        $login_class = $err_type === 'login' ? 'btn-on' : '';
    @endphp

    <div id="sign-up-screen">
        <div id="button-container">
            <button id="register-button" class="{{ $reg_class }}">Register</button>
            <button id="existing-account-button" class="{{ $login_class }}">Sign in</button>
        </div>
        
        {{-- @if(Session::has('email'))
            <p class="alert">{{ Session::get('email') }}</p>
        @endif --}}

         @if($errors->count() > 0)
            @foreach ($errors->all() as $error)
                <p class="alert">{{ $error }}</p>
            @endforeach
        @endif
        
        <div id="main-content">
            <div id="register-form">
                <!-- Form elements for registering a new account -->
                <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="name" value="Billy Bob" />
                    <input type="hidden" name="phone_code" value="1" />

                    <!-- Account info -->
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter email" /><br/>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Create password"/><br/>

                    <br/>
                    <div style="display: flex; gap: 10px">
                        <input type="checkbox" checked onchange="onBizCheckChange(this)">
                        <label>I am a professional tradesman</label>
                    </div>
                    <br/>

                    <!-- Business info -->
                    <div id="biz-form-section" style="display: none">
                        <label for="biz_name">Business name</label>
                        <input type="text" name="biz_name" placeholder="Business name" /><br/>
                        <div style="display: flex; gap: 10px;">
                            <div>
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name"  placeholder="First name" /><br/>
                            </div>
                            <div>
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name"  placeholder="Last name" /><br/>
                            </div>
                        </div>
                        <label for="phone">Phone number</label>
                        <div id="phone-fields">
                            <select name="phone_code">
                                <option value="1">🇺🇸 +1</option>
                                <option value="84">🇻🇳 +84</option>
                            </select>
                            <input type="tel" name="phone"  placeholder="Phone number" />
                        </div>
                        <label for="descr">Description</label>
                        <input type="text" name="descr"  placeholder="Description" /><br/>
                        <label for="website">Website</label>
                        <input type="text" name="website"  placeholder="Website" /><br/>

                        <!-- Business trade -->
                        <label for="trade">Trade</label>
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
                        <br/>

                        <!-- Business location (loaded dynamically) -->
                        <div id="loc-picker">
                            <div>
                                <label for="district">District</label>
                                <select class="notranslate" name="district">
                                    @foreach ($districts as $district)
                                        <option value="{{ $district["code"] }}">{{ $district["name"] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="ward">Ward</label>
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
                        </div>
                        <br/>

                        <input onchange="validateSize(this)" type="file" name="image" />
                        <p id="file-error">&nbsp;</p>
                        <br/>
                    </div>

                    <input type="submit" value="Submit" />
                </form>
            </div>
            <div id="existing-account-form" style="display:none">
                <!-- Form elements for logging into an existing account -->
                <form method="post" action="{{ route('login') }}">
                    @csrf

                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="jimmy@example.com" /><br/>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" /><br/>
                    
                    <input type="submit" value="Submit" />
                </form>
            </div>
        </div>
    </div>
@endsection