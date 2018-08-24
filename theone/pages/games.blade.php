@extends(_get_frontend_layout_path('childfrontend'))
@section('seoconfig')
    <meta name="keywords" content="Room Escape | Indoor Activities Melbourne">
    <meta name="description" content="The one room escape offers customers the best room escape experience. Room escape can be of the most interesting indoor activities Melbourne. Book now, see if you can be the winner.">
@endsection

@section('content')
    @include(_get_frontend_layout_path('frontend._childheader'))
    <!-- Call to Action -->
    <section class="page-section pricing" id="locations" style="background-image: url({{ asset('images/backgrounds/nbg.png') }})">
        <div class="container wow fadeIn">
            <div class="row">
                @if(isset($promotionProducts) && count($promotionProducts)>0)
                    @foreach($promotionProducts as $promotionProduct)
                        <div class="col-md-4">
                            <div class="pricing-item">
                                <div class="pro-img"><img src="{{ $promotionProduct->getProductDefaultImageUrl() }}" alt="{{ $promotionProduct->name }}" /></div>
                                <h3>{{ $promotionProduct->name }}</h3>
                                <div class="product-caption">{!! $promotionProduct->short_description !!}</div>
                                <hr class="colored">
                                <div class="bookbtn w-100">
                                    <a href="{{ url('catalog/product/'.$promotionProduct->uri) }}">BOOK GAME NOW</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection