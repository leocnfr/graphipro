@extends('graphipro.template')
@section('content')
    <div style=" width:1000px; margin:20px auto;  min-height:350px;  ">

    <div style="font-size:25px; color:#29ABE2; float:left; width:690px; "> MON PANIER<br/>
        <span style="color:#666; font-size:14px;">Vérification de la commande sélectionné</span><br/><br/>
        <img src="/images/panier1.png"/>
        <form action="{{url('/checkout')}}" method="post" enctype="multipart/form-data" id="payment">
            @foreach($carts as $cart)
            <div style="width:690px; padding:10px; position:relative; border:thin ridge #29ABE2; border-radius:3px; font-size:14px; color:#666; height:100px; margin-top:20px;" >
                <div style="position:absolute; right:10px; top:10px;cursor:pointer;">
                    <a href="{{url('/panier/'.$cart->__raw_id)}}"><img src="/images/ferme.png" alt=""></a>
                </div>
                <img src="/storage/uploads/{{$cart->img}}" style="float:left; height:100px;"/>

                <div style="float:left; width:200px; margin-left:10px; color:#999; height:100px; border-right:thin ridge #F2F2F2; padding-right:15px">

                    <span style="font-size:20px; color:#29ABE2;">{{$cart->name}}</span><br/>
                    @if($cart->id==25)
                        {{$cart->larger}}cm*{{$cart->hauter}}cm/{{$cart->materiels}}/{{$cart->ex}}ex
                    @elseif(in_array($cart->id,array(17,19,18)))
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
                        <input type="file" name="files[]">
                        @else
                        {{$total_price=$total_price+$cart->desing_price}}
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
            <div id="valide" style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; float:left;cursor:pointer; ">Valider
                @else
                    <div id="" style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; float:left;cursor:not-allowed; ">Valider
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
    <script>
        $('#valide').click(function () {
            $('#payment').submit();
        })
    </script>
@endsection