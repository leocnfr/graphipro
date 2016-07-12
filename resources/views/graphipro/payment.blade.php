@extends('graphipro.template')
@section('content')
    <style>
        .container {
            width: 800px;
            margin: 0px auto;
            min-height: 400px;
            font-size: 1rem;
        }

        input {
            width: 100%;
            font-size: 16px;
        }
        .form-group
        {
            margin:10px 0px;
        }
        label {
            color: #000;
            margin-right: 15px;
        }
        #exp-y-group > label
        {
            display: inline-block;
            width: 60px;
        }
        select
        {
            width: 100px;
        }
        .alert{
            color: red;
        }
    </style>
    <div class="container">
        {!! Form::open(['url' => '/postpayment', 'data-parsley-validate', 'id' => 'payment-form']) !!}





        <div class="form-group" id="cc-group">
            {!! Form::label(null, 'Credit card number:') !!}
            {!! Form::text(null, null, [
                'class'                         => 'form-control',
                'required'                      => 'required',
                'data-stripe'                   => 'number',
                'data-parsley-type'             => 'number',
                'maxlength'                     => '16',
                'data-parsley-trigger'          => 'change focusout',
                'data-parsley-class-handler'    => '#cc-group'
                ]) !!}
        </div>

        <div class="form-group" id="ccv-group">
            {!! Form::label(null, 'Card Validation Code (3 or 4 digit number):') !!}
            {!! Form::text(null, null, [
                'class'                         => 'form-control',
                'required'                      => 'required',
                'data-stripe'                   => 'cvc',
                'data-parsley-type'             => 'number',
                'data-parsley-trigger'          => 'change focusout',
                'maxlength'                     => '4',
                'data-parsley-class-handler'    => '#ccv-group'
                ]) !!}
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group" id="exp-m-group">
                    {!! Form::label(null, 'Ex. Month') !!}
                    {!! Form::selectMonth(null, null, [
                        'class'                 => 'form-control',
                        'required'              => 'required',
                        'data-stripe'           => 'exp-month'
                    ], '%m') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" id="exp-y-group">
                    {!! Form::label(null, 'Ex. Year') !!}
                    {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, [
                        'class'             => 'form-control',
                        'required'          => 'required',
                        'data-stripe'       => 'exp-year'
                        ]) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit('Place order!', ['class' => 'btn btn-primary btn-order', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;']) !!}
        </div>

        <div class="row">
            <div class="col-md-12">
                <span class="payment-errors" style="color: red;margin-top:10px;"></span>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
    <script>
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
            errorClass: 'has-error',
            successClass: 'has-success'
        };
    </script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>

    <!-- Inlude Stripe.js -->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        // This identifies your website in the createToken call below
        Stripe.setPublishableKey('{!! env('STRIPE_PK') !!}');

        jQuery(function($) {
            $('#payment-form').submit(function(event) {
                var $form = $(this);

                // Before passing data to Stripe, trigger Parsley Client side validation
                $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
                    formInstance.submitEvent.preventDefault();
                    return false;
                });

                // Disable the submit button to prevent repeated clicks
                $form.find('#submitBtn').prop('disabled', true);

                Stripe.card.createToken($form, stripeResponseHandler);

                // Prevent the form from submitting with the default action
                return false;
            });
        });

        function stripeResponseHandler(status, response) {
            var $form = $('#payment-form');

            if (response.error) {
                // Show the errors on the form
                $form.find('.payment-errors').text(response.error.message);
                $form.find('.payment-errors').addClass('alert alert-danger');
                $form.find('#submitBtn').prop('disabled', false);
                $('#submitBtn').button('reset');
            } else {
                // response contains id and card, which contains additional card details
                var token = response.id;
                console.log(token);
                // Insert the token into the form so it gets submitted to the server
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                // and submit
                $form.get(0).submit();
            }
        }
    </script>
@endsection