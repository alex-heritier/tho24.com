@extends('layouts.page')


@section('title', 'Account | tho24.com')


@section('content')
<section>

    {{-- INFO --}}
    <div class="account-info">
        <p><b>{{ Auth::user()->name }}</b></p>
        <p>{{ Auth::user()->email }}</p>
        <p>+{{ Auth::user()->phone_code }} {{ Auth::user()->phone }}</p>
    </div>


    {{-- BUTTONS --}}
    <a class="btn btn--inline btn--inverse btn--icon" href="/users/{{ Auth::id() }}/messages">
        <i class="fa-solid fa-inbox"></i>
        <span>Inbox</span>
    </a>

    <a class="btn btn--inline btn--inverse btn--icon" href="/applies">
        <i class="fa-solid fa-briefcase"></i>
        <span>Job Applications</span>
    </a>

    <a class="btn btn--inline btn--inverse btn--icon" href="/pagebuilder">
        <i class="fa-solid fa-brands fa-internet-explorer"></i>
        <span>Page Builder</span>
    </a>


    {{-- LOGOUT --}}
    <form method="post" action="{{ route('logout') }}">
        @csrf
        <input class="btn main-action" type="submit" value="Log out" />
    </form>
</section>
@endsection