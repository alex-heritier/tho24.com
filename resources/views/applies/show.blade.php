@extends('layouts.page')


@section('content')
<section class="solo-box">
    <div class="m-apply m-position">
        <h2 class="m-position__title">{{ $apply->position->title }}</h2>
        <p class="m-position__biz-name">{{ $apply->position->biz->name }}</p>
        <p class="m-position__address"><i class="fa fa-location-dot"></i>{{ $apply->position->address }}</p>
        <br>
        <p class="m-position__salary">{{ $apply->position->min_salary }} - {{ $apply->position->max_salary }} VND ({{ $apply->position->salary_rate }})</p>
        <p class="m-position__type">{{ \App\Models\Position::$employmentTypeValues[$apply->position->employment_type] }}</p>

        {{-- <p class="m-position__description">{{ $apply->position->description }}</p> --}}

        <p class="m-apply__status">Application status: <b>{{ \App\Models\Apply::$statusValues[$apply->status] }}</b></p>
    </div>
</section>
@endsection