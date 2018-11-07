@extends(_get_frontend_layout_path('childfrontend'))

@section('seoconfig')
    <!-- INCLUDE SESSION.JS JAVASCRIPT LIBRARY -->
    <script src="https://paymentgateway.commbank.com.au/form/version/48/merchant/TESTLYZGROCOM201/session.js"></script>
    <!-- APPLY CLICK-JACKING STYLING AND HIDE CONTENTS OF THE PAGE -->
    <style id="antiClickjack">body{display:none !important;}</style>
@endsection
@section('content')
    <!-- Masthead -->
    <header class="childhead" style="background-image:  url({{ asset('images/backgrounds/childbanner.jpg') }}) ">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto text-center text-white">
                    <div class="child-title">Payment</div>
                    <h1>Escape Rooms -- things to do near me</h1>
                </div>
            </div>
        </div>
    </header>
    <section class="page-section bg-special">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">

                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="box text-white">
                        <div>Please enter your payment details:</div>
                        <div>Card Number: <input type="text" id="card-number" class="input-field" value="" readonly></div>
                        <div>Expiry Month:<input type="text" id="expiry-month" class="input-field" value=""></div>
                        <div>Expiry Year:<input type="text" id="expiry-year" class="input-field" value=""></div>
                        <div>Security Code:<input type="text" id="security-code" class="input-field" value="" readonly></div>
                        <div><button id="payButton" onclick="pay();">Pay Now</button></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include(_get_frontend_theme_path('catalog.payjs'))
@endsection