<a href="/biz.html?id={{ $biz['id'] }}">
    <div class="biz-item">
        <img src="{{ $biz['main_img'] }}" />
        <div class="info">
            {{-- <p>Popular coffee shop that uses high-quality ingredients.</p>
            <p>555-555-5555 | info@highlands.vn</p> --}}
            <h2>{{ $biz['name'] }} | {{ Str::ucfirst($biz['trade']) }}</h2>
            <p>{{ $biz['descr'] }}</p>
            {{-- <p>{{ $biz['phone_code'] ?? '1432543654' }}</p> --}}
        </div>
    </div>
</a>

<!--
<a href="/biz.html?id=11">
    <div class="biz-item">
        <img src="http://wizbull.com/img/1200px-Highlands_Coffee_logo-f86be967.png">
        <div class="info">
            <h2>Highlands Coffee | hvac</h2>
            <p>Best coffee ever</p>
        </div>
    </div>
</a>-->