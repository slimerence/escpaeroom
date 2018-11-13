<!-- Footer -->
<footer class="footer" style="background-image: url({{asset('images/backgrounds/darkbg.jpg')}})">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4 footer-contact-details">
                <h4>
                    <i class="fa fa-phone"></i>
                    Call</h4>
                <p>{{ $siteConfig->contact_phone }}</p>
            </div>
            <div class="col-md-4 footer-contact-details">
                <h4>
                    <i class="fa fa-map-marker"></i>
                    Visit</h4>
                <p>{{ $siteConfig->contact_address }}</p>
            </div>
            <div class="col-md-4 footer-contact-details">
                <h4>
                    <i class="fa fa-envelope"></i>
                    Email</h4>
                <p>
                    <a href="mailto:mail@example.com">{{ $siteConfig->contact_email }}</a>
                </p>
            </div>
        </div>
        <div class="row footer-social">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="{{$siteConfig->facebook }}">
                            <i class="fa fa-facebook fa-fw fa-2x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{$siteConfig->twitter }}">
                            <i class="fa fa-twitter fa-fw fa-2x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{$siteConfig->linkedin }}">
                            <i class="fa fa-linkedin fa-fw fa-2x"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <p class="copyright">&copy; Web Design & SEO by <a href="https://www.webmelbourne.com/" target="_blank">WebMelbourne</a> All Rights Reserved.</p>
    </div>
</footer>