@extends('layouts.app')

@section('title', 'Book an appointment')

@section('style')
<style>
    .__content {
        display: flex;
        flex-direction: column;
        align-items: stretch;
    }

    .fast-info {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin: 14px;
    }

    .fast-info .item > p:first-child {
        font-size: 0.9rem;
    }
    
    .fast-info .item > p:last-child {
        font-size: 1rem;
        font-weight: 600;
    }

    #address-form {
        padding: 14px;
        display: flex;
        flex-direction: column;
    }

    #address-form input[type="text"] {
        padding: 4px;
    }

    input[type='submit'] {
        padding: 12px 0;
        border: none;
        border-radius: 4px;
        background-color: powderblue;
        font-size: 1.1rem;
        margin: 30px 20px 0;
        box-sizing: border-box;
    }
</style>
@endsection

@section('content')

    <div class="nav-bar">
        <x-back-button />
        <span>Book an appointment</span>
        <div class="spacer"></div>
    </div>

    <div class="fast-info">
        <div class="item">
            <p>Business</p>
            <p>{{ $biz['name'] }}</p>
        </div>
        <div class="item">
            <p>Service</p>
            <p>{{ Str::ucfirst($biz['trade']) }}</p>
        </div>
        <div class="item">
            <p>Price</p>
            <p>{{ $biz['pricing'] ?? '$ idk.99' }}</p>
        </div>
        <div class="item">
            <p>Appointment date</p>
            <p>{{ $aptDate }}</p>
        </div>
    </div>

    <form id="address-form">
        @csrf

        <label for="address">Address</label>
        <input type="text" required name="address" placeholder="Enter your full address" />
    </form>

    <input type="submit" value="{{ __('Confirm') }}" />

@endsection