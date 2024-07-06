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
                el.style.display = 'contents';
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
            setupLocationDropdown();
            onBizCheckChange(document.querySelector('input[type="checkbox"]').checked);
        });
</script>
@endsection


@section('content')
<div id="sign-up-screen">
    <div id="button-container">
        <a class="btn btn--text btn--active" href="/register">Register</a>
        <a class="btn btn--text" href="/login">Login</a>
    </div>

    @if($errors->count() > 0)
    @foreach ($errors->all() as $error)
    <p class="error">{{ $error }}</p>
    @endforeach
    @endif

    <section class="solo-box">
        <div id="register-form" x-show="mode == 'register'">
            <!-- Form elements for registering a new account -->
            <form class="form-24" method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Account info -->
                <label for="email">{{ __('Email') }}</label>
                <input type="email" name="email" placeholder="{{ __('Enter email') }}" />
                <label for="password">{{ __('Password') }}</label>
                <input type="password" name="password" placeholder="{{ __('Create password') }}" />


                <div style="display: flex; gap: 10px">
                    <input id="is-biz-checkbox" type="checkbox" onchange="onBizCheckChange(this.checked)">
                    <label onclick="onCheckLabelClick()">{{ __('I am a professional tradesman') }}</label>
                </div>


                <!-- Business info -->
                <div id="biz-form-section" style="display: none">
                    <label for="biz_name">{{ __('Business name') }}</label>
                    <input type="text" name="biz_name" placeholder="{{ __('Business name') }}" />
                    <div class="form-24__row">
                        <div class="form-24__entry">
                            <label for="first_name">{{ __('First name') }}</label>
                            <input type="text" name="first_name" placeholder="{{ __('First name') }}" />
                        </div>
                        <div class="form-24__entry">
                            <label for="last_name">{{ __('Last name') }}</label>
                            <input type="text" name="last_name" placeholder="{{ __('Last name') }}" />
                        </div>
                    </div>
                    <label for="phone">{{ __('Phone number') }}</label>
                    <div id="phone-fields">
                        <select name="phone_code">
                            <option value="1">🇺🇸 +1</option>
                            <option value="84">🇻🇳 +84</option>
                        </select>
                        <input type="tel" name="phone" placeholder="{{ __('Phone number') }}" />
                    </div>
                    <label for="descr">{{ __('Description') }}</label>
                    <input type="text" name="descr" placeholder="{{ __('Description') }}" />
                    {{-- <label for="website">{{ __('Website') }}</label>
                    <input type="text" name="website" placeholder="{{ __('Website') }}" /> --}}
                    <label for="pricing">{{ __('Pricing').' ('.$currency_symbol.')' }}</label>
                    <input type="number" name="pricing" step="0.01" placeholder="{{ __('Pricing') }}" />

                    <!-- Business trade -->
                    <label for="trade">{{ __('Trade') }}</label>
                    <select name="trade">
                        @foreach ($trades as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>


                    <!-- Business location (loaded dynamically) -->
                    <div class="form-24__row">
                        <div class="form-24__entry">
                            <label for="district">{{ __('District') }}</label>
                            <select class="notranslate" name="district">
                                @foreach ($districts as $district)
                                <option value="{{ $district["code"] }}">{{ $district["name"] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-24__entry">
                            <label for="ward">{{ __('Ward') }}</label>
                            <select class="notranslate" name="ward">
                                @foreach ($districts as $district)
                                    @foreach ($district['ward'] as $ward)
                                    <option @class(['inactive'=> $district !== $districts[0]])
                                        x-district="{{ $district["code"] }}" value="{{ $ward["code"] }}">{{ $ward["name"] }}
                                    </option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-24__entry">
                        <label for="image">{{ __('Image') }}</label>
                        <input onchange="validateSize(this)" type="file" name="image" />
                    </div>

                    <p id="file-error">&nbsp;</p>

                </div>

                <input type="submit" value="{{ __('Submit') }}" />
            </form>
        </div>
    </section>
</div>
@endsection