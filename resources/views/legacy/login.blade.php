@extends('layouts.page')


@section('title', __('Login'))
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
        <a class="btn btn--text" href="/register">Register</a>
        <a class="btn btn--text btn--active" href="/login">Login</a>
    </div>

    @if($errors->count() > 0)
    @foreach ($errors->all() as $error)
    <p class="error">{{ $error }}</p>
    @endforeach
    @endif

    <section class="solo-box">
        <div id="existing-account-form">
            <!-- Form elements for logging into an existing account -->
            <form class="form-24" method="post" action="{{ route('login') }}">
                @csrf

                <label for="email">{{ __('Email') }}</label>
                <input type="email" name="email" placeholder="{{ __('Enter email') }}" value="{{ old('email') }}" />
                <label for="password">{{ __('Password') }}</label>
                <input type="password" id="password" name="password" placeholder="{{ __('Create password') }}" value="{{ old('password') }}" />

                <input type="submit" value="{{ __('Submit') }}" />
            </form>
        </div>
    </section>
</div>
@endsection