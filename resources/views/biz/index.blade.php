@extends('layouts.app')

@section('title', 'Biz')

@section('content')

<div>
    @foreach ($bizs as $biz)
        @include('biz/partial/show')
    @endforeach
</div>

@endsection