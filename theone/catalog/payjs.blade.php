<script src="https://paymentgateway.commbank.com.au/checkout/version/48/checkout.js"
        data-error="errorCallback"
        data-cancel="cancelCallback">
</script>
<script type="text/javascript">
    function errorCallback(error) {
        console.log(JSON.stringify(error));
    }
    function cancelCallback() {
        console.log('Payment cancelled');
    }

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
                name: 'The One Room Escape',
                address: {
                    line1: '9 Aristoc Road',
                    line2: 'Glen Waverley VIC 3150'
                }
            }
        }
    });
</script>