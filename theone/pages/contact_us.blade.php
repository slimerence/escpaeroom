@extends(_get_frontend_layout_path('frontend'))

@section('content')
    <header class="childhead" style="background-image:  url({{ asset('images/backgrounds/footer-v2.jpg') }}) ">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto text-center text-white">
                    <div class="weltext">
                        <h1 class="align-items-center">一路有我，安全出行</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="ptb">
        <!-- .contact form -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h2>
                                联系方式
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-12 contact-info">
                        <ul>
                            <li>
                                <div class="img-icon">
                                    <img src="{{ asset('images/contact-icon2.jpg') }}" alt="phone-icon">
                                </div>
                                <strong>Phone</strong>
                                <br/> {{ $siteConfig->contact_phone }}
                            </li>
                            <li>
                                <div class="img-icon">
                                    <img src="{{ asset('images/contact-icon3.jpg') }}" alt="phone-icon">
                                </div>
                                <strong>Email  </strong>
                                <br/> {{ $siteConfig->contact_email }}
                            </li>
                            <li>
                                <div class="img-icon">
                                    <img src="{{ asset('images/contact-icon4.jpg') }}" alt="phone-icon">
                                </div>
                                <strong>微信  </strong><br>
                                <div class="qrcode">
                                    <span>扫二维码添加</span>
                                </div>
                            </li>
                        </ul>

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h2>联系我</h2>
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
                            Your enquiry form has been saved, we will contact you very soon!
                        </div>
                        <div class="notification is-danger" style="display: none;margin-top: 10px;" id="txt-on-fail">
                            System is busy, please try again later!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.contact form  -->
    </section>
@endsection