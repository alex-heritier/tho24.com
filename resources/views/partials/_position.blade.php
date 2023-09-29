<div class="m-position">
    <h2 class="m-position__title">{{ $position->title }}</h2>
    <p>{{ $position->biz->name }}</p>
    <p class="m-position__address"><i class="fa fa-location-dot"></i>{{ $position->address }}</p>
    <p class="m-position__salary">{{ $position->min_salary / 100 }} - {{ $position->max_salary / 100 }} {{ $position->currency_code }} ({{
        $position->salary_rate }})</p>
    <p class="m-position__type">{{ \App\Models\Position::$employmentTypeValues[$position->employment_type] }}</p>

    @unless (isset($hideDescription) && $hideDescription)
        <p class="m-position__description">{{ $position->description }}</p>
    @endif
</div>