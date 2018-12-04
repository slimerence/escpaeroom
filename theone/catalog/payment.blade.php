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
                                        <strong>Customer</strong>: {{ $reservation->name }}
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="w-100 text-center font-italic">
                                        <strong>Game</strong>: {{ $reservation->product->name }}
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="w-100 text-center font-italic">
                                       <strong>Time</strong>: {{ $reservation->at }}
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="w-100 text-center font-italic">
                                       <strong>Phone number</strong>: {{ $reservation->phone }}
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="w-100 text-center font-italic">
                                        <strong>Participants</strong>: {{ $reservation->participants }}
                                    </div>
                                </li>
                                @endif
                                <li class="list-group-item">
                                    <div class="w-100 text-center font-italic">
                                        <p style="font-size: 0.9em;">Notice: You need to pay $50 if you want to confirm this booking.<br/>
                                            This reservation will expire in <span class="color-ye">10</span> minutes. <br/>
                                        If you have any question please call <span class="color-ye">043 001 9292</span> for help.</p>
                                        <p style="font-size: 0.9em;">The Deposit is non-refundable; the balance is payable on the date.</p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="button" class="button pay-btn bg-ye" value="Pay" onclick="Checkout.showLightbox();" />
                                        </div>
                                        <div class="col-6">
                                            <form action="{{ url('api/booking/cancel')}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $reservation->id }}">
                                                <button class="button pay-btn bg-normal text-white" type="submit">Cancel</button>
                                            </form>
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