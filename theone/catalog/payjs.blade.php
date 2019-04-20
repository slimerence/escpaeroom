<script src="https://paymentgateway.commbank.com.au/checkout/version/51/checkout.js"
        data-error="errorCallback"
        data-cancel="cancelCallback"
        data-complete="{{ url('api/booking/success/'.$reservation->id) }}"
        >
</script>
<script type="text/javascript">
    function errorCallback(error) {
        console.log(JSON.stringify(error));
    }
    function cancelCallback() {
        console.log('Payment cancelled');
        window.location.herf = '{{ url('api/booking/cancel/'.$reservation->id) }}';
    }
    /*function completeCallback(resultIndicator, sessionVersion) {
        console.log(resultIndicator);
    }*/

    Checkout.configure({
        merchant: 'TESTLYZGROCOM201',
        order: {
            amount: function() {
                //Dynamic calculation of amount
                return 50;
            },
            currency: 'AUD',
            description: '{{ 'The One Room Escape - '.$reservation->product->name }}',
            id: '{{ $transaction_number }}'
        },
        interaction: {
            merchant: {
                name: 'TORX',
                address: {
                    line1: '9 Aristoc Road',
                    line2: 'Glen Waverley VIC 3150'
                },
                /*email  : 'order@yourMerchantEmailAddress.com',
                phone  : '+1 123 456 789 012',*/
            },
            locale        : 'en_US',
        },
        session: {
            id: '{{ $transaction_session }}'
        },
    });
    setTimeout(function(){location.href="{{ url('/games/expire') }}"} , 600000);
</script>