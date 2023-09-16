@extends('layouts.page')


@section('content')
<section>
    @foreach ($positions as $pos)
    <div class="m-position">
        <span class="m-position__id">{{ $pos->id }}</span>

        <h2 class="m-position__title">{{ $pos->title }}</h2>
        {{-- <p class="m-position__description">{{ $pos->description }}</p> --}}
        <p class="m-position__address"><i class="fa fa-location-dot"></i>{{ $pos->address }}</p>
        <p class="m-position__salary">{{ $pos->min_salary / 100 }} to {{ $pos->max_salary / 100 }} VND ({{ $pos->salary_rate }})</p>
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