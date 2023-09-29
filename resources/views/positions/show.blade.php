@extends('layouts.page')


@section('content')
<section class="solo-box">
    @include('partials._position', ['position' => $position])

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

        @if ($position->myApplies->isNotEmpty())
        <a class="btn btn--inverse" href="/applies/{{$position->myApplies->first()->id}}">View application status</a>
        @endif

        @else
        <a class="main-action btn btn--big" href="/register">{{ __('Sign up for free to apply') }}</a>
        @endif

        @endif
    </div>
</section>
@endsection