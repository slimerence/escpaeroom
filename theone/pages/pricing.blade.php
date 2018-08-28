@extends(_get_frontend_layout_path('childfrontend'))
@section('seoconfig')
    <title>Escape Room Near Me | Escape Room Glen Waverley</title>
    <meta name="keywords" content="Escape Room Near Me | Escape Room Glen Waverley">
    <meta name="description" content="The one room escape offers customers the best escape room in Glen Waverley. Find the fabulous escape room near me. Book now, see if you can be the winner.">
@endsection

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
                                    10 People or more: $35 per person
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    Corporate team building: please contact us
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="price-info">
                        <h2 class="text-center" style="font-family:unset;font-size: 22px;">Process of Booking<br/> A "Escape Room Near Me"</h2>
                        <hr class="colored">
                        <ol>
                            <li>Pick up a game</li>
                            <li>Pick up a date on the calendar from the game page</li>
                            <li>Fill out all your details on the form</li>
                            <li>Make a $50.00 deposit for your reservation online. The balance is payable on the date before the game.</li>
                            <li>Please check your email, including spam box, for your booking details.</li>
                        </ol>
                        <p>If you have any trouble, please send us an email <a href="mailto:Bookings.torx@gmail.com" target="_blank">Bookings.torx@gmail.com</a>. Please turn up 10mins before the session time of the game.</p>
                        <h1 class="text-center color-ye" style="font-size: 16px;">Escape Room Near Me | Escape Room Glen Waverley</h1>
                        <p>The One Room Escape is focusing on providing the wonderful experience to all escape room fans in Glen Waverley and all areas in Melbourne.  </p>
                        <p>If you want to find a different experience of "escape room near me"， Please also email us and discuss with our staff. </p>
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