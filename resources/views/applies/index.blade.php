@extends('layouts.page')


@section('content')
    <section>
        @foreach ($applies as $apply)
            <div class="m-apply">
                @include('partials._position', ['position' => $apply->position])
            </div>
        @endforeach
    </section>
@endsection