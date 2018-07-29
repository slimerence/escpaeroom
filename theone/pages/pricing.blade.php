@extends(_get_frontend_layout_path('childfrontend'))

@section('content')
    @include(_get_frontend_layout_path('frontend._childheader'))
    <section class="page-section bg-special bg-moving" style="background-image:url({{ asset('images/backgrounds/nbg.png') }}) ">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="open-item">
                        <h3>Price List</h3>
                        <hr class="colored">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    1 Person : $59 per person
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    2 People: $42 per person
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    4 People: $40 per person
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    6 People: $38 per person
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    8 People: $36 per person
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    Corporate team building: Contact us please
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="price-info">
                        <h3 class="text-center">Booking process</h3>
                        <hr class="colored">
                        <ol>
                            <li>Please decide which game that you would like to experience.</li>
                            <li>Fill out your detail and select a date and time for your adventure.</li>
                            <li>Our friendly staff will send you a confirmation letter once we accept your booking request and will remind you again in 24 hours by phone call.</li>
                            <li>Please arrive at least 15 mins prior to your adventure.</li>
                            <li>Fees are payable at front desk before you start.</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-12 mx-auto">
                    <div class="bookbtn w-25 text-center mx-auto">
                        <a href="{{ url('games') }}">BOOK GAME NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection