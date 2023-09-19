@extends('layouts.page')


@section('title', __('Register'))
@section('meta-description', 'Create an account to start finding professionals near you.')


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

        function onCheckLabelClick() {
            const checkbox = document.getElementById('is-biz-checkbox');
            checkbox.checked = !checkbox.checked;
            onBizCheckChange(checkbox.checked);
            // onBizCheckChange(!checkbox.checked);
        }

        function onBizCheckChange(checked) {
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

            onBizCheckChange(document.querySelector('input[type="checkbox"]').checked);
        });
    </script>
@endsection


@section('content')
    <div id="sign-up-screen">
        <div id="button-container">
            {{-- <button id="register-button" class="{{ $regClass }}">{{ __('Register') }}</button>
            <button id="existing-account-button" class="{{ $loginClass }}">{{ __('Sign in') }}</button> --}}
            <button id="register-button" @class(['btn-on' => (session('err_type') === 'register' || session('err_type') === null)])>{{ __('Register') }}</button>
            <button id="existing-account-button"  @class(['btn-on' => session('err_type') === 'login'])>{{ __('Sign in') }}</button>
        </div>

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

                    <!-- Account info -->
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" name="email" placeholder="{{ __('Enter email') }}" /><br/>
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" name="password" placeholder="{{ __('Create password') }}"/><br/>

                    <br/>
                    <div style="display: flex; gap: 10px">
                        <input id="is-biz-checkbox" type="checkbox" onchange="onBizCheckChange(this.checked)">
                        <label onclick="onCheckLabelClick()">{{ __('I am a professional tradesman') }}</label>
                    </div>
                    <br/>

                    <!-- Business info -->
                    <div id="biz-form-section" style="display: none">
                        <label for="biz_name">{{ __('Business name') }}</label>
                        <input type="text" name="biz_name" placeholder="{{ __('Business name') }}" /><br/>
                        <div style="display: flex; gap: 8px;">
                            <div>
                                <label for="first_name">{{ __('First name') }}</label>
                                <input type="text" name="first_name"  placeholder="{{ __('First name') }}" /><br/>
                            </div>
                            <div>
                                <label for="last_name">{{ __('Last name') }}</label>
                                <input type="text" name="last_name"  placeholder="{{ __('Last name') }}" /><br/>
                            </div>
                        </div>
                        <label for="phone">{{ __('Phone number') }}</label>
                        <div id="phone-fields">
                            <select name="phone_code">
                                <option value="1">🇺🇸 +1</option>
                                <option value="84">🇻🇳 +84</option>
                            </select>
                            <input type="tel" name="phone"  placeholder="{{ __('Phone number') }}" />
                        </div>
                        <label for="descr">{{ __('Description') }}</label>
                        <input type="text" name="descr"  placeholder="{{ __('Description') }}" /><br/>
                        {{-- <label for="website">{{ __('Website') }}</label>
                        <input type="text" name="website"  placeholder="{{ __('Website') }}" /><br/> --}}
                        <label for="pricing">{{ __('Pricing').' ('.$currency_symbol.')' }}</label>
                        <input type="number" name="pricing" step="0.01" placeholder="{{ __('Pricing') }}" /><br/>

                        <!-- Business trade -->
                        <label for="trade">{{ __('Trade') }}</label>
                        <select name="trade">
                            @foreach ($trades as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                            {{-- <option value="electrician">Electrician</option>
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
                            <option value="ironworker">Ironworker</option> --}}
                        </select>
                        <br/>

                        <!-- Business location (loaded dynamically) -->
                        <div id="loc-picker">
                            <div>
                                <label for="district">{{ __('District') }}</label>
                                <select class="notranslate" name="district">
                                    @foreach ($districts as $district)
                                        <option value="{{ $district["code"] }}">{{ $district["name"] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="ward">{{ __('Ward') }}</label>
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

                    <input type="submit" value="{{ __('Submit') }}" />
                </form>
            </div>
            <div id="existing-account-form" style="display:none">
                <!-- Form elements for logging into an existing account -->
                <form method="post" action="{{ route('login') }}">
                    @csrf

                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" name="email" placeholder="{{ __('Enter email') }}" /><br/>
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" placeholder="{{ __('Create password') }}" /><br/>
                    
                    <input type="submit" value="{{ __('Submit') }}" />
                </form>
            </div>
        </div>
    </div>
@endsection