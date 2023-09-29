@extends('layouts.app')


@section('content')
@include('partials._header')

<main>
    @yield('content')
</main>

@include('partials._footer')
@overwrite