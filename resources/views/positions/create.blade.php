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
            <option value="hourly">Hourly</option>
            <option value="daily">Daily</option>
            <option value="weekly">Weekly</option>
            <option value="monthly" selected>Monthly</option>
            <option value="yearly">Yearly</option>
        </select>
        <input type="number" min="1" step="1" name="hire_count" placeholder="Hire how many people?" required>
        <select name="employment_type" required>
            <option value="fulltime">Full-time</option>
            <option value="parttime">Part-time</option>
            <option value="internship">Internship</option>
        </select>

        <input type="submit" value="Post">
    </form>
</section>
@endsection