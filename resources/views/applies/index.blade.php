@extends('layouts.page')


@section('content')
<section>
    @foreach ($applies as $apply)
    <div class="m-apply">
        @include('partials._position', ['position' => $apply->position])

        @switch($apply->status)
        @case('A')
        <p class="m-apply__status"><i class="fa fa-thumbs-up"></i>&nbsp;{{ \App\Models\Apply::$statusValues[$apply->status] }}</p>
        @break
        @case('P')
        <p class="m-apply__status"><i class="fa fa-hourglass-half"></i>&nbsp;{{ \App\Models\Apply::$statusValues[$apply->status] }}</p>
        @break
        @default
        <p class="m-apply__status"><i class="fa fa-question"></i>&nbsp;{{ \App\Models\Apply::$statusValues[$apply->status] }}</p>
        @break
        @endswitch
    </div>
    @endforeach
</section>
@endsection