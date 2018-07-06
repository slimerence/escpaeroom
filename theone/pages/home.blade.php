@extends(_get_frontend_layout_path('frontend'))

@section('content')
    @include(_get_frontend_layout_path('frontend._header'))

    <!-- About Section -->
    <section class="page-section bg-moving" id="about" style="background-image:url({{ asset('images/backgrounds/nbg.png') }}) ">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <img class="img-fluid rounded my-5 special-img" src="{{ asset('images/backgrounds/intro.png') }}" alt="Info Image">
                </div>
                <div class="col-lg-6 my-auto">
                    <h2 class="text-center">WHAT IS ESCAPE ROOM</h2>
                    <hr class="colored">
                    <p>Escape room is an exciting experience.You and your teammate will be given new identities. Settled into a room specially setup where you are faced with a series of puzzles to solve using only the available items.<br/>
                        It could be</p>
                        <ul>
                            <li>An expedition team in the Egyptian Pharaoh 's tomb. Or,</li>
                            <li>A group of talented young men learning skills to extinguish evils and save the world. Or,</li>
                            <li>A group of innocent people being attacked and locked into a strange hotel room</li>
                        </ul>
                        <p>As you progress through a story, you will learn and discover more and hopefully the way out and complete your goals in 60 mins.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->


    <section class="page-section bg-special" id="services">
        <div class="container">
            <div class="wow fadeIn text-center">
                <h2 class="color-text">WHO CAN PLAY?</h2>
                <p class="mb-0 color-ye" style="color:#ffd152">We recommend our rooms to following groups</p>
            </div>
            <hr class="colored">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6">
                    <div class="wow fadeIn " data-wow-delay=".8s">
                        <i class="fa fa-smile-o fa-3x"></i>
                        <h3>Families</h3>
                        <p class="mb-0">Spend some time with your family work together to find the solutions in our different games. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="wow fadeIn pb-4 pb-lg-0 " data-wow-delay=".2s">
                        <i class="fa fa-user fa-3x"></i>
                        <h3>Friends</h3>
                        <p class="mb-0">Chat with your mates face to face while discovering our games, and building stronger friendship.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="wow fadeInpb-4 pb-lg-0" data-wow-delay=".4s">
                        <i class="fa fa-gamepad fa-3x"></i>
                        <h3>Gamers</h3>
                        <p class="mb-0">Come and challenge our rooms.Reward yourself with the unique experience</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="wow fadeIn pb-4 pb-lg-0 " data-wow-delay=".6s">
                        <i class="fa fa-handshake-o fa-3x"></i>
                        <h3>Corporate</h3>
                        <p class="mb-0">It's a good opportunity to build teamwork while relaxing with your colleagues</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="page-section pricing" id="locations" style="background-image: url({{ asset('images/backgrounds/nbg.png') }})">
        <div class="container wow fadeIn">
            <div class="text-center">
                <h2 class="color-text">GAMES</h2>
                <hr class="colored">
                <p class="color-ye">Our firm has nine locations across three different states. We serve clients in the Western United States.</p>
            </div>
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

    @include(_get_frontend_theme_path('pages.elements.serviceadd'))
    @include(_get_frontend_theme_path('pages.elements.number'))
    @include(_get_frontend_theme_path('pages.elements.testimonials'))
    <section class="page-section call-to-action" style="background-image:url({{ asset('images/backgrounds/nbg.png') }})">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <span class="quote color-text">Our main goal is for you to have an unforgettable and enjoyable experience.</span>
                    <hr class="colored">
                    <a class="btn js-scroll-trigger btn-private" href="{{ url('/page/courses') }}">Book Now</a>
                </div>
            </div>
        </div>
    </section>


@endsection