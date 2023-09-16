@extends('layouts.page')


@section('content')
<section class="solo-box">

    <h1 class="solo-box__title">Post a Job</h1>
    <form action="/positions" method="POST" class="solo-box__content form-24">
        @csrf

        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="description" placeholder="Description" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="number" min="0" step="1" name="min_salary" placeholder="Min salary" required>
        <input type="number" min="0" step="1" name="max_salary" placeholder="Max salary" required>
        <select name="salary_rate" required>
            <option selected disabled hidden>Pay how often?</option>
            @foreach (\App\Models\Position::$salaryRateValues as $key => $val)
                <option value="{{$key}}">{{$val}}</option>
            @endforeach
        </select>
        <input type="number" min="1" step="1" name="hire_count" placeholder="Hire how many people?" required>
        <select name="employment_type" required>
            <option selected disabled hidden>Work how often?</option>
            @foreach (\App\Models\Position::$employmentTypeValues as $key => $val)
                <option value="{{$key}}">{{$val}}</option>
            @endforeach
        </select>

        <input type="submit" value="Post">
    </form>
</section>
@endsection