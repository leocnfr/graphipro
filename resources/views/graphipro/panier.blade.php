@extends('graphipro.template')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div style=" width:1000px; margin:20px auto;  min-height:350px;  ">

        <div style="font-size:25px; color:#29ABE2; float:left; width:690px; "> MON PANIER<br/>
            <span style="color:#666; font-size:14px;">Vérification de la commande sélectionné</span><br/><br/>
            <img src="/images/panier1.png"/>
            <form action="{{url('/payment')}}" method="post" enctype="multipart/form-data" id="payment">
                {!! csrf_field() !!}
                @foreach($carts as $cart)
                    <div style="width:690px; padding:10px; position:relative; border:thin ridge #29ABE2; border-radius:3px; font-size:14px; color:#666; height:100px; margin-top:20px;">
                        <div style="position:absolute; right:10px; top:10px;cursor:pointer;">
                                <img src="/images/ferme.png" alt="" data-rawid="{{$cart->__raw_id}}" class="del">
                        </div>
                        <img src="/storage/uploads/{{$cart->img}}" style="float:left; height:100px;"/>
                        <div style="float:left; width:200px; margin-left:10px; color:#999; height:100px; border-right:thin ridge #F2F2F2; padding-right:15px">

                            <span style="font-size:20px; color:#29ABE2;">{{$cart->name}}</span><br/>
                            @if($cart->id==25)
                                {{$cart->larger}}cm*{{$cart->hauter}}cm/{{$cart->materiels}}/{{$cart->ex}}ex
                            @elseif(in_array($cart->id,array(17,19,18)))
                                {{$cart->size}}
                            @else
                                {{$cart->format}}/{{$cart->papier}}/{{$cart->imprimer}}/{{$cart->pelliculage}}
                            @endif
                        </div>
                        <div style="float:left;  margin-left:25px;">

                            <span>Délai {{$cart->day}}</span>
                            <br/>
                            Quantité: {{$cart->ex}}ex<br/>
                            Prix: <span style="font-size:18px; color:#29ABE2;">{{$cart->price}}</span> TTC <br>

                            @if($cart->design_price==0)
                                Ficher fournir par client <br>
                                {{$cart->filename}}
                            @else
                                Creation:{{$cart->design_price}}
                            @endif
                        </div>
                    </div>
            @endforeach
            <!--- car1 --->
            </form>

            <!--- 1 --->
        </div>

        <div style="font-size:18px; color:#29ABE2; float:right; margin-top:20px; margin-right:45px; position:relative; padding:10px; border:thin ridge #29ABE2; border-radius:3px;min-width: 145.36px">
            {{$count}}article(s):<br/>

            <span style="font-size:35px;">{{$total_price}}</span> TTC
            <br/>
            @if($total_price>0)
                <div id="valide"
                     style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; float:left;cursor:pointer; ">
                    Valider
                    @else
                        <div id=""
                             style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; float:left;cursor:not-allowed; ">
                            Valider
                            @endif
                        </div>
                </div>
                <a href="{{url('/')}}">
                    <div
                            style="float:right; margin-right:45px; margin-top:20px; font-size:18px; padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF;">
                        Continuer mes achats
                    </div>
                </a>
        </div>
        {{--<form action="/postpayment" method="POST">--}}
        {{--{!! csrf_field() !!}--}}
        {{--<script--}}
        {{--src="https://checkout.stripe.com/checkout.js" class="stripe-button"--}}
        {{--data-key="pk_live_aRBNdmVCTJAv5JhuZZEvvBIU"--}}
        {{--data-amount="{{$total_price}}"--}}
        {{--data-name="Graphipro"--}}
        {{--data-description="Widget"--}}
        {{--data-image="{{url('/images/logo1.png')}}"--}}
        {{--data-email="{{Auth::user()->email}}"--}}
        {{--data-locale="auto"--}}
        {{--data-zip-code="true"--}}
        {{--data-currency="eur"--}}
        {{-->--}}
        {{--</script>--}}
        {{--</form>--}}
        <script src="https://checkout.stripe.com/checkout.js"></script>
        @if (Session::has('sweet_alert.alert'))
            <script>
                swal({!! Session::get('sweet_alert.alert') !!});
            </script>
        @endif
        <script>

            var handler = StripeCheckout.configure({
                key: 'pk_test_YYzdZX6viYDzv08OInmBXL7F',
                locale: 'auto',
                token: function (token) {
                    // You can access the token ID with `token.id`.
                    // Get the token ID to your server-side code for use.
                    token.id;
                }
            });
            $("#valide").on("click", function () {
                var amount = parseInt(<?php echo $total_price?>);
                handler.open({
                    image: '/images/logo1.png',
                    name: 'Graphipro',
                    description: '2 widgets',
                    amount: amount
                });
            });
            $(".del").click(function () {
                    var rawid=$(this).attr("data-rawid");
                    deleteOrder(rawid);
            });
            function deleteOrder(rawid) {
                swal({
                    title: "Are you sure?",
                    text: "Are you sure that you want to delete this order?",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonText: "Yes, delete it!",
                    confirmButtonColor: "#ec6c62"
                }, function() {
                  window.location.href="/panier/"+rawid;
                });
            }
        </script>

@endsection