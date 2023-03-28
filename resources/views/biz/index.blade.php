@extends('layouts.app')

@section('title', 'Biz list')

@section('style')
    <style>
        a {
            color: inherit;
            text-decoration: none;
        }

        h2 {
            font-size: 1.5rem;
            margin: 14px;
        }

        .biz-item {
            margin: 20px 12px;
            padding: 4px;
            display: flex;
            flex-direction: row;
            align-items: stretch;
            gap: 4px;
            border: 0.5px solid lightgray;
            border-radius: 6px;
        }

        .biz-item img {
            display: block;
            height: 10vh;
            flex-grow: 0;
            padding: 0 10px;
            object-fit: contain;
            object-position: center;
            aspect-ratio: 1;
            box-sizing: border-box;
        }

        .biz-item .info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 2px;
            padding: 8px;
            flex-grow: 1;
        }

        .biz-item p,
        .biz-item h2 {
            color: black;
            text-decoration: none;
        }

        .biz-item .title {
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    @foreach ($bizs as $biz)
        @include('biz/partial/show')
    @endforeach
@endsection