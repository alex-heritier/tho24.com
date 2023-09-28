@extends('layouts.page')


@section('content')
<section class="solo-box data-listing">
    @foreach ($positions as $pos)
    <div class="m-position">
        <span class="m-position__id">{{ $pos->id }}</span>

        <h2 class="m-position__title"><a href="/positions/{{$pos->id}}">{{ $pos->title }}</a></h2>
        {{-- <p class="m-position__description">{{ $pos->description }}</p> --}}
        <p class="m-position__biz-name">{{ $pos->biz->name }}</p>
        <p class="m-position__address"><i class="fa fa-location-dot"></i>{{ $pos->address }}</p>
        <p class="m-position__salary">{{ $pos->min_salary / 100 }} to {{ $pos->max_salary / 100 }} {{ $pos->currency_code }} ({{ $pos->salary_rate }})</p>
        <p class="m-position__type">{{ \App\Models\Position::$employmentTypeValues[$pos->employment_type] }}</p>

        @if ($isBiz)
        <div class="m-position__buttons">
            <button class="btn btn--red" onclick="deleteModel('/positions/{{$pos->id}}')"><i class="fa fa-trash"></i>&nbsp;Delete</button>
        </div>
        @endif
    </div>
    @endforeach
</section>
@endsection