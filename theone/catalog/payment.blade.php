@extends(_get_frontend_layout_path('childfrontend'))

@section('seoconfig')
    <script src="https://paymentgateway.commbank.com.au/checkout/version/49/checkout.js"
            data-error="errorCallback"
            data-cancel="cancelCallback">
    </script>

    <script type="text/javascript">
        function errorCallback(error) {
            console.log(JSON.stringify(error));
        }
        function cancelCallback() {
            confirm('Are you sure you want to cancel?');
        }

        Checkout.configure({
            merchant: 'TESTLYZGROCOM201',
            order: {
                amount: function() {
                    //Dynamic calculation of amount
                    return 80 + 20;
                },
                currency: 'USD',
                description: 'Ordered goods',
                id: 'Easdqwe3'
            },
            interaction: {
                merchant: {
                    name: 'Your merchant name',
                    address: {
                        line1: '200 Sample St',
                        line2: '1234 Example Town'
                    }
                }
            }
        });
    </script>
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
            <input type="button" value="Pay with Lightbox" onclick="Checkout.showLightbox();" />
            <input type="button" value="Pay with Payment Page" onclick="Checkout.showPaymentPage();" />
        </div>
    </section>

@endsection