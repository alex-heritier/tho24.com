@extends('layouts.page')


@section('content')
<section class="solo-box">
    <div class="m-position">
        <h2 class="m-position__title">{{ $position->title }}</h2>
        <p>{{ $position->biz->name }}</p>
        <p class="m-position__address"><i class="fa fa-location-dot"></i>{{ $position->address }}</p>
        <p class="m-position__salary">{{ $position->min_salary / 100 }} - {{ $position->max_salary / 100 }} VND ({{
            $position->salary_rate }})</p>
        <p class="m-position__type">{{ \App\Models\Position::$employmentTypeValues[$position->employment_type] }}</p>

        <p class="m-position__description">{{ $position->description }}</p>

        {{-- <a href="/" class="btn m-position__apply-btn">Apply</a> --}}

        <div class="main-action">
            @if (!$isBiz)
            @if (Auth::check())
            <form class="main-action" action="/applies" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="position_id" value="{{ $position->id }}">
                <input class="btn" type="submit" value="{{ $position->myApplies->isEmpty() ? 'Apply' : 'Pending' }}"
                    @disabled($position->myApplies->isNotEmpty())>
            </form>
            @else
            <a class="main-action btn btn--big" href="/register">{{ __('Sign up for free to apply') }}</a>
            @endif
            @endif
        </div>

    </div>
</section>
@endsection