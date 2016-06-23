@extends('graphipro.template')
@section('content')
<div style="width: 100%">
    <div style="width:1000px;margin:0px auto; margin-top:20px; color:#333">
        <a href="index.php" style="color:#666">Accueil</a> > <span id="pro_name">Cart de visit</span><br />
        <div style="margin-top:20px; color:#29ABE2; font-size:30px;">Cart de visit</div>
        <div style="float:left; margin-top:20px; width:250px; height:250px; overflow:hidden; border:thin ridge #29ABE2; background-color:#FFF;"><center><img id="proimg" src="/images/carte-visite.jpg" width="250"/></center></div>
        <div style="float:left; margin-left:40px; margin-top:30px; font-size:30px; color:#29ABE2;">

        </div>
        <div style="font-size:18px; color:#29ABE2; float:right; margin-top:20px; margin-right:45px; position:relative; padding:10px; border:thin ridge #29ABE2; border-radius:3px;">
            Prix total:<br />
			<span style="font-size:35px;" id="showprice" >

			</span> TTC <br /><br />
            <input style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; float:left; " type="submit" id="panier" value="Ajouter au panier" />
        </div>
        @if($product->type_id==2)
            @include('graphipro.product_type2')
        @else
            @include('graphipro.produit_type1')
        @endif
    </div>

</div>
@endsection