@extends('layouts.page')


@section('content')
<section class="solo-box">
    <div class="m-position">
        <h2 class="m-position__title">{{ $position->title }}</h2>
        <p>{{ $position->biz->name }}</p>
        <p class="m-position__address"><i class="fa fa-location-dot"></i>&nbsp;{{ $position->address }}</p>
        <br>
        <p class="m-position__salary">{{ $position->min_salary }} - {{ $position->max_salary }} VND ({{ $position->salary_rate }})</p>
        <p class="m-position__type">{{ \App\Models\Position::$employmentTypeValues[$position->employment_type] }}</p>

        <p class="m-position__description">{{ $position->description }}</p>

        {{-- <a href="/" class="btn m-position__apply-btn">Apply</a> --}}

        @if (!$isBiz)
        <form action="/applies" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="position_id" value="{{ $position->id }}">
            <input class="btn" type="submit" value="Apply">
        </form>
        @endif
    </div>
</section>
@endsection