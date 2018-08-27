@extends(_get_frontend_layout_path('childfrontend'))
@section('seoconfig')
    <meta name="keywords" content="Escape Experience | Team Building Activity">
    <meta name="description" content="The one room escape offers customers the best escape experience in Melbourne. Escape Room is the best team building activities. Book now, see if you and your team can be the winner.">
@endsection

@section('content')
    @include(_get_frontend_layout_path('frontend._childheader'))
    <section class="page-section bg-special bg-moving" style="background-image: url({{ asset('images/backgrounds/nbg.png') }})">
        <div class="container " style="background-color: #222222e6;box-shadow: 0 0 30px 5px rgba(34, 34, 34, 0.78);padding: 2em 3em 2em 3em;">

            <div class="panel-group faq" id="accordion">

                <div class="faqHeader text-center mb-10" style="font-family: unset;font-size: 32px;">General questions</div>
                <h1 class="text-center mb-30" style="font-family: unset;font-size: 20px;color: #ffd152;">Unforgettable escape experience and team building activities</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. I never play escape room before; do I need to know anything before I come? </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>Yes, you need to observe, search, communicate and solve problems as a team to escape at the end, which can be a unforgettable escape experience for you. Good luck!</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
                                2. What if I am stuck? </a>
                        </h4>
                    </div>
                    <div id="collapseTen" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>A game master will be in control, if you are stuck, call the game master via walkie talkie and you will receive the information you need for the game. </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">
                                3. Is there an age limit? </a>
                        </h4>
                    </div>
                    <div id="collapseEleven" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>If the participants are under 16 years old, they must be accompanied by an adult.
                                The adult needs to pay for the game as well.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                4. Will we play with people we don’t know? </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>No. You are playing with your teammates only. Which is the one of the best team building activities for people in almost all age. </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                5. What if some of my friends wants to join on the date? Or drop out at the last minute? </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>If you have extra participants, no worries at all. Bring them along and enjoy!
                                If you have less, no problem, just work harder!</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                6. What if I am running late? </a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>We try all our effort to make sure you can have 60mins escape room experience.
                                However, if you are really running late, that’s a very unfortunate issue, your gaming session will be affected, please make sure you arrive 10 mins in advance.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                7. Can I cancel my booking?</a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>No refund on confirmed bookings or in case of no-show.
                                We do allow rescheduling if you contact us more than 48 hours ahead of your booking time.
                                Please contact us if you need to reschedule.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                                8. WHEN SHOULD I ARRIVE? WHAT IF I’M LATE?</a>
                        </h4>
                    </div>
                    <div id="collapseEight" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Your punctuality is greatly appreciated! It would be best to arrive 15 minutes before your booking time. If you are late you’ll have less time to play in order to allow the next team/booking to start on time.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse9">9. What should I wear? </a>
                        </h4>
                    </div>
                    <div id="collapse9" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Make yourself comfortable please. </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                                10. Can I book over the phone?</a>
                        </h4>
                    </div>
                    <div id="collapse10" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Unfortunately, we do not take bookings over the phone. </p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse11">11. Where is The One Room Escape? </a>
                        </h4>
                    </div>
                    <div id="collapse11" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>The One Room Escape is located in 9 Aristoc Rd, Glen Waverley.</p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse12">11. Public transport / Parking?</a>
                        </h4>
                    </div>
                    <div id="collapse12" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>10-15 mins walking distance from the Glen Waverley train station.
                                Heaps of private parking spaces in front of the property and free of charge
                                Heaps at the rear as well free of charge.
                                2 hours on the street during week days please refer to the sign.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection