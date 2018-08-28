@extends(_get_frontend_layout_path('childfrontend'))
@section('seoconfig')
    <title>Best Escape Room Melbourne | Adventure Games Melbourne | Franchise</title>
    <meta name="keywords" content="Best Escape Room Melbourne | Adventure Games Melbourne | Franchise">
    <meta name="description" content="The one room escape offers customers the best escape rooms experience in Melbourne. Escape Room as the adventure games can be a challenge to many people. Book now, see if you and your team can escape out.">
@endsection

@section('content')
    <header class="childhead" style="background-image:  url({{ asset('images/backgrounds/childbanner.jpg') }}) ">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto text-center text-white">
                    <div class="child-title">FRANCHISE</div>
                    <h1 class="text-center">Best Escape Room Melbourne | Adventure Games Melbourne</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="ptb" style="background-image:  url({{ asset('images/backgrounds/nbg.png') }})">
        <!-- .contact form -->
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h3>Franchise Form</h3>
                        </div>
                        @include(_get_frontend_theme_path('pages.elements.alert'))
                        <form action="{{ url('franchise') }}" method="post" id="franchiseform" >
                            {{ csrf_field() }}
                            <input type="hidden" name="user" value="{{ session('user_data.uuid') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Name <span>*</span></p>
                                    <p class="comment-form-author">
                                        <input class="input" name="lead[name]" type="text" placeholder="Your Name" id="input-name" required>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>Phone <span>*</span></p>
                                    <p class="comment-form-email">
                                        <input class="input" name="lead[phone]" type="text" placeholder="Your Phone #" id="input-phone" required>
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <p>Email <span>*</span></p>
                                    <p class="comment-form-email">
                                        <input class="input" type="email" placeholder="Your Email" name="lead[email]" id="input-email" required>
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <p>Estimated Budget（AUD）</p>
                                    <p class="comment-form-money">
                                        <input class="input" type="text" placeholder="Estimated Budget" name="lead[money]" id="input-email">
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <p>Comments <span>*</span></p>
                                    <p class="comment-form-comment">
                                        <textarea rows="6" class="textarea" placeholder="Say Something ..." id="input-message" name="lead[message]"></textarea>
                                    </p>
                                </div>
                            </div>
                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-link" type="submit" style="border: none; width: 100%; background-color: #ffd152; padding: 0.5em;">Submit</button>
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