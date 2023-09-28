<a class="biz-item" href="/biz.html?id={{ $biz['id'] }}">
    <img class="img--inline" src="{{ $biz['main_img'] }}" />
    <div class="info">
        <h3 class="title">{{ $biz['name'] }}</h3>
        <h4 class="subtitle">{{ $biz->prettyTrade() }}</h4>
        <p>{{ $biz['descr'] }}</p>
    </div>
</a>