@extends('layouts.app')


@section('content')
@include('partials.header')

<main>
    @yield('content')
</main>

@include('partials.footer')
@overwrite