<a class="biz-item" href="/biz.html?id={{ $biz['id'] }}">
    <img src="{{ $biz['main_img'] }}" />
    <div class="info">
        <p class="title">{{ $biz['name'] }} | {{ $biz->prettyTrade() }}</p>
        <p>{{ $biz['descr'] }}</p>
    </div>
</a>