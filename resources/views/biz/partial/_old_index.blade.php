<div>
    @foreach ($bizs as $biz)
        @include('biz/partial/show', ['biz'=>$biz])
    @endforeach
</div>