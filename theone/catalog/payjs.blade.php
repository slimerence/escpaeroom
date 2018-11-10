<script src="https://paymentgateway.commbank.com.au/checkout/version/48/checkout.js"
        data-error="errorCallback"
        data-cancel="cancelCallback"
        data-complete="{{ url('') }}">
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
            description: 'Ordered goods',
            id: '1234567'
        },
        interaction: {
            merchant: {
                name: 'TORX',
                address: {
                    line1: '200 Sample St',
                    line2: '1234 Example Town'
                }
            }
        }
    });
</script>