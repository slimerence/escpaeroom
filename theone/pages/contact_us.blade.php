@extends(_get_frontend_layout_path('childfrontend'))

@section('content')
    <header class="childhead" style="background-image:  url({{ asset('images/backgrounds/childbanner.jpg') }}) ">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto text-center text-white">
                    <div class="child-title">CONTACT NOW</div>
                </div>
            </div>
        </div>
    </header>

    <section class="ptb" style="background-image:  url({{ asset('images/backgrounds/nbg.png') }})">
        <!-- .contact form -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h3>
                                Contact Info
                            </h3>
                        </div>
                    </div>
                    <div class="col-md-12 contact-info">
                        <ul>
                            <li>
                                <div class="img-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <strong>Phone</strong>
                                <br/> {{ $siteConfig->contact_phone }}
                            </li>
                            <li>
                                <div class="img-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <strong>Email  </strong>
                                <br/> {{ $siteConfig->contact_email }}
                            </li>
                            <li>
                                <div class="img-icon">
                                    <i class="fa fa-weixin"></i>
                                </div>
                                <strong>Wechat  </strong><br>
                                <div class="qrcode">
                                    <span>Scan QR code</span>
                                </div>
                            </li>
                        </ul>

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h3>Contact From</h3>
                        </div>
                        <form action="{{ url('contact-us') }}" method="post" id="commentform" class=contact-us-form">
                            {{ csrf_field() }}
                            <input type="hidden" name="user" value="{{ session('user_data.uuid') }}">
                            <div class="row">
                            <div class="col-md-6">
                                <p>Name <span>*</span></p>
                                <p class="comment-form-author">
                                    <input class="input" name="name" type="text" placeholder="Your Name" id="input-name" required>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>Phone <span>*</span></p>
                                <p class="comment-form-email">
                                    <input class="input" name="mobile" type="text" placeholder="Your Phone #" id="input-phone" required>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <p>Email <span>*</span></p>
                                <p class="comment-form-email">
                                    <input class="input" type="email" placeholder="Your Email" name="email" id="input-email" required>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <p>Comments <span>*</span></p>
                                <p class="comment-form-comment">
                                    <textarea rows="6" class="textarea" placeholder="Say Something ..." id="input-message" name="message"></textarea>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <div class="control">
                                    <label class="checkbox">
                                        <input type="checkbox" checked>
                                        I agree to the <a href="{{ url('/terms') }}">terms and conditions</a>
                                    </label>
                                </div>
                            </div>
                            </div>
                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-link" id="submit-contact-us-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                        <div class="notification is-primary" style="display: none;margin-top: 10px;" id="txt-on-success">
                            <p>Your enquiry form has been saved, we will contact you very soon!</p>
                        </div>
                        <div class="notification is-danger" style="display: none;margin-top: 10px;" id="txt-on-fail">
                            <p>System is busy, please try again later!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.contact form  -->
    </section>
@endsection