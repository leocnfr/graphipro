@extends('graphipro.template')
@section('content')
    <style>
        .disable{
            cursor: not-allowed;
        }
    </style>
<div style="width: 100%">
    <div style="width:1000px;margin:0px auto; margin-top:20px; color:#333">
        <a href="{{url('/')}}" style="color:#666">Accueil</a> > <span id="pro_name">{{$product->name}}</span><br />
        <div style="margin-top:20px; color:#29ABE2; font-size:30px;">{{$product->name}}</div>
        <div style="float:left; margin-top:20px; width:250px; height:250px; overflow:hidden; border:thin ridge #29ABE2; background-color:#FFF;"><center><img id="proimg" src="/storage/uploads/{{$product->productimg}}" width="250"/></center></div>
        <div style="float:left; margin-left:40px; margin-top:30px; font-size:30px; color:#29ABE2;">

        </div>

        @if($product->id==25)
            <div style="font-size:18px; color:#29ABE2; float:right; margin-top:20px; margin-right:45px; position:relative; padding:10px; border:thin ridge #29ABE2; border-radius:3px;">
                Prix total:<br />

                    <span style="font-size:35px;" id="showprice">@{{price}}€</span> TTC <br /><br />
                    <button style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; float:left; " id="panier" :class="price>0?'able':'disable'">Ajouter au panier</button>
            </div>
            @include('graphipro.product_type2')
            @elseif(in_array($product->id,array(17,19,18)))
            <div style="font-size:18px; color:#29ABE2; float:right; margin-top:20px; margin-right:45px; position:relative; padding:10px; border:thin ridge #29ABE2; border-radius:3px;">
                Prix total:<br />
                {{--<form action="{{url('/panier')}}" method="post">--}}
                    {{--{!! csrf_field() !!}--}}
                    {{--<input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">--}}
                    {{--<input type="hidden" id="price" name="price">--}}
                    {{--<input type="hidden" id="s_design_price" name="design_price">--}}
                    <span style="font-size:35px;" id="showprice" >@{{ price }}€</span> TTC <br /><br />
                    <button style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; float:left; " id="panier">Ajouter au panier</button>
                {{--</form>--}}
            </div>
            @include('graphipro.special')
        @else
            <div style="font-size:18px; color:#29ABE2; float:right; margin-top:20px; margin-right:45px; position:relative; padding:10px; border:thin ridge #29ABE2; border-radius:3px;">
                Prix total:<br />
                {{--<form action="{{url('/panier')}}" method="post">--}}
                    {{--{!! csrf_field() !!}--}}

                    {{--<input type="hidden" id="s-format" name="format">--}}
                    {{--<input type="hidden" id="s-papier" name="papier">--}}
                    {{--<input type="hidden" id="s-imprimer" name="imprimer">--}}
                    {{--<input type="hidden" id="s-pelliculage" name="pelliculage">--}}
                    {{--<input type="hidden" id="s_design_price" name="design_price">--}}
                    <span style="font-size:35px;" id="showprice" >0€</span> TTC <br /><br />
                    <button style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; float:left; " id="panier">Ajouter au panier</button>
                {{--</form>--}}
            </div>
            @include('graphipro.produit_type1')
        @endif

    </div>

</div>
@if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::get('sweet_alert.alert') !!});
    </script>
@endif
<script>
    $('.disable').click(function () {
    return false;
    });
    $('.able').click(function () {
        $('#pro-form').submit();
    });
    $('#panier').click(function (e) {
        if ($('#price').val()==0)
        {
            e.preventDefault();
        }else {
            $('#panier-form').submit();
        }
    })

</script>
@endsection