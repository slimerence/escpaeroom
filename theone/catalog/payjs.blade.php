<script src="https://paymentgateway.commbank.com.au/checkout/version/50/checkout.js"
        data-error="errorCallback"
        data-cancel="cancelCallback"
        data-complete="completeCallback"
        >
</script>
<script type="text/javascript">
    function errorCallback(error) {
        console.log(JSON.stringify(error));
    }
    function cancelCallback() {
        console.log('Payment cancelled');
    }
    function completeCallback(resultIndicator, sessionVersion) {
        console.log(resultIndicator);
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
                name: 'TORX',
                address: {
                    line1: '9 Aristoc Road',
                    line2: 'Glen Waverley VIC 3150'
                },
                /*email  : 'order@yourMerchantEmailAddress.com',
                phone  : '+1 123 456 789 012',*/
            },
            locale        : 'en_US',
        }
    });
</script>