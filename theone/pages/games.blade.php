@extends(_get_frontend_layout_path('childfrontend'))
@section('seoconfig')
    <title>Room Escape | Indoor Activities Melbourne</title>
    <meta name="keywords" content="Room Escape | Indoor Activities Melbourne">
    <meta name="description" content="Room escape could be a good choice as indoor activities Melbourne. You can have fun with your family and friends, also you can hold a team building, have a birthday party, even make a surprised marriage proposal.">
@endsection
@section('content')
    @include(_get_frontend_layout_path('frontend._childheader'))

    <!-- Call to Action -->
    <section class="page-section pricing" id="locations" style="background-image: url({{ asset('images/backgrounds/nbg.png') }})">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="open-item">
                        <h1 class="color-ye font-weight-bold" style="font-size: 24px;">Indoor Activities Melbourne | Room Escape</h1>
                        <p>There could be four seasons in one day in Melbourne, and there could be rainy and windy in each “season”. Escape room could be a good choice as indoor activities in Melbourne. You can have fun with your family and friends, also you can hold a team building, have a birthday party, even make a surprised marriage proposal. There are not much indoor activities in Melbourne that can play with many people. Come to TORX to have a unique experience.</p>
                    </div>
                </div>
                @if ($message = Session::get('expire'))
                    <div class="col-12">
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong style="color: #000">{{ $message }}</strong>
                        </div>
                    </div>
                @endif
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