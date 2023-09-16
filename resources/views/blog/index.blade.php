@extends('layouts.page')


@section('title', 'Blog')


@section('style')
<style>
    .blog-list {
        padding: 14px;
    }

    .blog-item {
        margin: 10px 0;
        padding: 8px;
        border: 0.5px solid lightgray;
        border-radius: 4px;
        display: flex;
        flex-direction: column;
        gap: 6px;
        font-size: 1.1rem;
    }

    a {
        color: inherit;
        text-decoration: none;
    }
</style>
@endsection


@section('content')
<div class="blog-list">
    @foreach ($blogs as $blog)
        <a href="/blog/{{ $blog['slug'] }}" class="blog-item">
            <p>Blog #{{ $blog['index'] }}</p>
            <p>{{ $blog['title'] }}</p>
        </a>
    @endforeach
</div>
@endsection