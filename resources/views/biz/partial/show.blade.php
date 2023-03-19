<a href="/biz.html?id={{ $biz['id'] }}">
    <div class="biz-item">
        <img src="{{ $biz['main_img'] }}" />
        <div class="info">
            <h2>{{ $biz['name'] }} | {{ Str::ucfirst($biz['trade']) }}</h2>
            <p>{{ $biz['descr'] }}</p>
        </div>
    </div>
</a>