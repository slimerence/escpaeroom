<div class="short-desc">
    @if(count($productShortDescriptionTop) > 0)
        @foreach($productShortDescriptionTop as $b)
        <div class="content">{!! $b->content !!}</div>
        @endforeach
    @endif
    {!! $product->getProductShortDescription() !!}
    @if(count($productShortDescriptionBottom) > 0)
        @foreach($productShortDescriptionBottom as $b)
            <div class="content">{!! $b->content !!}</div>
        @endforeach
    @endif
</div>