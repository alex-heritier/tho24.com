@extends('layouts.app')

@section('content')
    <p>Test sending an email to {{ $email }}</p>
    <form method="post" action="/misc/email_tester">
        @csrf

        <input type="hidden" name="recipient_email" value="{{ $email }}" />
        <textarea name="email_body"></textarea>
        <input type="submit" />
    </form>
@endsection