@extends(_get_frontend_layout_path('childfrontend'))

@section('seoconfig')

@endsection
@section('content')
    <!-- Masthead -->
    <header class="childhead" style="background-image:  url({{ asset('images/backgrounds/childbanner.jpg') }}) ">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto text-center text-white">
                    <div class="child-title">Payment</div>
                    <h1>Escape Rooms -- things to do near me</h1>
                </div>
            </div>
        </div>
    </header>
    <section class="page-section bg-special">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="open-item">
                        <h3>Booking Details</h3>
                        <hr class="colored">

                            <ul class="list-group">
                                @if(isset($reservation))
                                <li class="list-group-item">
                                    <div class="w-100 text-center font-italic">
                                        <p><strong>Customer</strong>: {{ $reservation->name }}</p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="w-100 text-center font-italic">
                                        <p><strong>Game</strong>: {{ $reservation->product->name }}</p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="w-100 text-center font-italic">
                                        <p><strong>Time</strong>: {{ $reservation->at }}</p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="w-100 text-center font-italic">
                                        <p><strong>Phone number</strong>: {{ $reservation->phone }}</p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="w-100 text-center font-italic">
                                        <p><strong>Participants</strong>: {{ $reservation->participants }}</p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="w-100 text-center font-italic">
                                        <p><strong>Message</strong>: {{ $reservation->message }}</p>
                                    </div>
                                </li>
                                @endif
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="button" class="button pay-btn bg-ye" value="Pay" onclick="Checkout.showLightbox();" />
                                        </div>
                                        <div class="col-6">
                                            <input type="button" class="button pay-btn bg-normal text-white" value="Cancel" onclick="Checkout.showPaymentPage();" />
                                        </div>
                                    </div>
                                </li>
                            </ul>


                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="open-item">
                        <h3>Address</h3>
                        <hr class="colored">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    9 Aristoc Road, Glen Waverley VIC 3150, Australia
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    @if($siteConfig->embed_map_code)
                                        <div id="google-map-area" style="height: 400px;">
                                            {!! $siteConfig->embed_map_code !!}
                                        </div>
                                    @endif
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection