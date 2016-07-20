@extends('layouts.app')

@section('content')
    <form action="" method="POST">
        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_YYzdZX6viYDzv08OInmBXL7F"
                data-amount="999"
                data-name="Graphipro"
                data-description="Widget"
                data-image="/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-zip-code="true"
                data-currency="eur">
        </script>
    </form>
@endsection
