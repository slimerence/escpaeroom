<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">
           THE ONE ROOM ESCAPE
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
            Menu
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about-us') }}">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/games') }}">GAMES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pricing') }}">PRICING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/team-building') }}">TEAM BUILDING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/faq') }}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/franchise') }}">FRANCHISE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact-us') }}">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
