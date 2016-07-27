@extends('graphipro.template')
@section('content')
    <div style="width:100%">
        <div style="width:1000px;margin:0px auto; margin-top:20px; color:#333">

            <a href="{{url('/')}}" style="color:#666">Accueil</a> > <span id="pro_name">Promotion: {{$pro->product->name}}</span><br />
            <div style="margin-top:20px; color:#29ABE2; font-size:30px;">Promotion: {{$pro->product->name}}</div>
            <div style="float:left; margin-top:20px; width:250px; height:250px; overflow:hidden; border:thin ridge #29ABE2; background-color:#FFF;"><center><img id="proimg" src="/storage/uploads/{{$pro->product->productimg}}" width="250"/></center></div>

            <div style="font-size:18px; color:#29ABE2; float:right; margin-top:20px; margin-right:45px; position:relative; padding:10px; border:thin ridge #29ABE2; border-radius:3px;">
                Prix total:<br />
			<span style="font-size:35px;" id="showprice">
				{{$pro->pro_price*1.2}}
			</span>€ TTC <br /><br />
                <form action="{{url('/panier')}}" method="post" id="panier-form" enctype="multipart/form-data">
                    <input type="hidden" value="promotion" name="promotion">
                    <input type="hidden" value="{{$pro->id}}" name="id">
                <button style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; float:left; " id="panier">Ajouter au panier</button>
                </form>
            </div>
            <table width="500" border="0" style="padding-left: 40px;padding-top: 30px">
                <tr>
                    <td valign="top" width="450">
                        <!--					<div style="font-size:20px; color:#29ABE2; margin-top:20px;">1. Choisir les options d'impression</div><br />-->
                        <div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2; line-height:35px; color:#000; font-size:18px;">
                            {!! $pro->des !!}
                        </div>
                       @include('graphipro.product.livraison')
                    </td>
                </tr>
            </table>
            <div style="font-size:25px; color:#FFF; padding:5px; background-color:#29ABE2; width:990px; margin-top:20px; float:left; position:relative;  "><img src="/images/cat.png" height="20" /> INFOS PLUS
            </div>
            <div style="width:1000px; margin-top:20px;">
                <div style="padding:10px; margin-top:20px; width:225px; border-radius:3px; background-color:#F2F2F2; float:left; height:225px;">
                    <span style="color:#29ABE2; font-size:18px;">Format:</span><br />

                    Normal: 85x55mm<br />(2mm de fond perdu)<br />
                    Carte double: 170x55mm rainage au milieux<br />(2mm de fond perdu)
                </div>
                <div style="padding:10px; width:225px; border-radius:3px; background-color:#F2F2F2; margin-left:5px; margin-top:20px; height:225px; float:left"><span style="color:#29ABE2; font-size:18px;">
        Papier:</span><br />

                    Standard: 350g couche mat / 300g offset <br />
                    Spéciale: 250g opale toilé / 250g paper perle / papier doré ou argenté
                </div>
                <div style="padding:10px; width:225px; border-radius:3px; background-color:#F2F2F2; margin-left:5px; margin-top:20px; height:225px; float:left"><span style="color:#29ABE2; font-size:18px;">
        Délais:</span><br />

                    Moins de 1000ex - inférieur de 24h (week-end non compris)<br />
                    1500ex à 10000ex - 3 à 5 jours
                </div>

                <div style="padding:10px; width:225px; border-radius:3px; background-color:#F2F2F2; margin-left:5px; margin-top:20px; height:225px; float:left"><span style="color:#29ABE2; font-size:18px;">
        Livraison:</span><br />1. Récupérer directement au bureau de Graphipro<br />- 5 rue baudin, 94200 Ivry sur seine<br />
                    2. Livraison par conoposte à partir de 10€<br />
                    3. Livraison par UPS (2 jours, express)</div>
            </div>
        </div>
    </div>

    @if (Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
    @endif
@endsection