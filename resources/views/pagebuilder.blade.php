@extends('layouts.app')


@section('content')
<div id="app"></div>

@viteReactRefresh
@vite('resources/jsx/PageBuilder/index.jsx')

@endsection