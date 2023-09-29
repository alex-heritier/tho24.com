@extends('layouts.page')


@section('content')
<section class="solo-box">
    <div class="m-apply m-position">
        @include('partials._position', ['position' => $apply->position])

        <p class="m-apply__status">Application status: <b>{{ \App\Models\Apply::$statusValues[$apply->status] }}</b></p>
    </div>
</section>
@endsection