@extends(_get_frontend_layout_path('childfrontend'))

@section('content')
    @include(_get_frontend_layout_path('frontend._childheader'))
    <section class="page-section bg-special bg-moving" style="background-image: url({{ asset('images/backgrounds/nbg.png') }})">
        <div class="container">
            <div class="special-box color-text h-color">
                <h2>WHY AN ESCAPE ROOM?</h2>
                <h4>Team working</h4>
                <p>Here at The One Room Escape, the games require participants to work as a team. You all have the same goal which is to escape within the time limit.</p>
                <h4>Problem-solving</h4>
                <p>To escape is not easy, you need to solve problems as you go. Think about the problems and talk to your mates and find out the solution. Thinking outside of the box sometimes will be very helpful.</p>
                <h4>Leadership</h4>
                <p>However, randomly talking and guessing is not going to help, one of you will have to stand out and lead the conversations and actions.</p>
                <h4>Competitions</h4>
                <p>While you are trying to escape, your colleagues in the other game are trying too.<br>
                A competition in a healthy way.</p>
                <h4>Fun</h4>
                <p>It’s an extremely fun way to get your team out of the workplace!</p>

                <h2>Why The One Room Escape?</h2>
                <p>Since 2017, The One Room Escape have hosted many corporate events and the list of the business is still growing today.</p>

                <h4>Huge lounge area</h4>
                <p>More than 200m2 space, you could make yourselves very comfortable.</p>
                <h4>Large games and small games</h4>
                <p>The One Room Escape have large games and small games could suit perfectly for your team.</p>
                <h4>Public transport and parking make easy</h4>
                <p>The location of The One Room Escape is about 15mins walking distance from Glen Waverley Station.</p>
                <p>Heaps of private parking spaces in front of the property could easily handle your cars and even more parking at rear. Don’t worry about the parking, they all free of charge.</p>
                <h4>Catering packages</h4>
                <p>Catering package is available. If you need more than just snacks and drinks, please talk to us, we could order food for your event.</p>


            </div>
        </div>
    </section>

@endsection