@extends(_get_frontend_layout_path('childfrontend'))
@section('seoconfig')
    <title>Escape Rooms | Things To Do Near Me</title>
    <meta name="keywords" content="Escape Rooms | Things To Do Near Me">
@endsection
@section('content')
    <section class="product-detail bg-normal color-text h-100">
        <div class="container wow fadeIn my-auto">
            <div class="row">
                <div class="col-12 text-center">
                    @include(_get_frontend_theme_path('pages.elements.alert'))
                    <div class="confirmation text-center bg-special ptb" style="margin: 5em 0; border-radius: 0.2em;">
                        <h3>THANK YOU</h3>
                        <hr class="colored">
                        <p> Dear customer<br>
                            Thank you for your booking.<br>

                            We have received your request now<br>

                            You should have received an email now from us.<br>

                            *If you haven't received the email, please check your junk box. *<br>

                            Thank you for your booking.<br></p>

                        <h5>The One Room Escape @ 9 Aristoc Rd, Glen Waverley</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection