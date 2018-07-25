@extends(_get_frontend_layout_path('childfrontend'))

@section('content')
    @include(_get_frontend_layout_path('frontend._childheader'))
    <section class="page-section bg-special bg-moving" style="background-image: url({{ asset('images/backgrounds/nbg.png') }})">
        <div class="container">
            <div class="panel-group faq" id="accordion">
                <div class="faqHeader">General questions</div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. HOW CAN I BOOK ESCAPE ROOMS AND WHEN DO I PAY?</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>Register your account and login first. Simply click the “Book” button and select your game. Follow the prompts to input names, number of players, date and time. You can then click “Pay Now” where you’ll be prompted to pay the deposit, followed by a booking confirmation via email. You will pay the remaining amount on the day.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
                                2. CAN I USE A CREDIT CARD?</a>
                        </h4>
                    </div>
                    <div id="collapseTen" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>We use PayPal Payments Pro Solutions for transactions and therefore accept Visa or MasterCard credit card.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">
                                3. IS IT POSSIBLE TO BOOK IN FOR SPECIAL EVENTS AND CORPORATE TEAM BUILDING </a>
                        </h4>
                    </div>
                    <div id="collapseEleven" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Yes. Please contact us via email info@doctorq.com.au to make special arrangements or simply book multiple rooms online.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                4. IS THERE AN AGE LIMIT?</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Please check each game's description.
                                Age limit of 12 years or 16 years applies to different games.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                5. THE NUMBER OF PEOPLE SHOWING UP MAY DIFFER FROM THE NUMBER THAT WAS BOOKED. IS THIS A PROBLEM?</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>No problem, provided the size of the team does not exceed the maximum number of each game.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                6. WHAT'S THE IDEAL TEAM/GROUP SIZE FOR AN ESCAPE ROOM?</a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>More people equal more excitement and fun. That said, small groups will of course have fun, but the experience will be different. Why not try both? We have 5 rooms. Please note, the maximum number of players is 6-8 to prevent over-crowding.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                7. ARE ALL ROOMS OF EQUAL DIFFICULTY?</a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>We have 5 escape rooms, and they are each very different in terms of story, environment, and game flow, therefore each offers a different escape room experience. Why not try one and experience our unique adventure.</p>
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
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">9. HOW DO I GET THERE?</a>
                        </h4>
                    </div>
                    <div id="collapseNine" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>A Google map is located on our Contact page.
                            TRAINS - We are located only metres away from the South Yarra train station.
                            TRAMS - Trams operate along Toorak Rd, as well as Chapel St which is only metres away.
                            PARKING - See plenty of parking options only walking distance away.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                10. WHAT TO BRING? ANY SUGGESTIONS BEFORE WE START THE ESCAPE GAME?</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>You, your friends, and colleagues, and get prepared to have fun. In order to ensure an hour of uninterrupted fun, if possible, please use the restroom before the game starts and mute or power off your mobile phone and give it to the Game Master before entering the game area.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">11. HOW LONG DOES IT TAKE TO FINISH THE GAME?</a>
                        </h4>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>It depends on your performance. When the game starts, you have 60/90 minutes to escape depending on the game.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection