@extends('graphipro.template')
@section('content')
<div style="width:100%; height:350px; background:url(/images/bg.png)">

    <!--img-->
    <div class="content">
        <div class="slider" id="slider">
            <ul class="sliderbox">
                <li>
                    <a href="#"><img src="/images/1.jpg" ></a>
                </li>
                <li>
                    <a href="#"><img src="/images/2.jpg" ></a>
                </li>

            </ul>
            <ul class="slidernav"></ul>
        </div>
    </div>
    <!--img-->
</div>
<div style=" width:1000px; margin:0 auto;">
    <div style="font-size:25px; color:#FFF; padding:5px; background-color:#29ABE2; width:990px; margin-top:20px; position:relative; "><img src="/images/cat.png" height="20" /> CATEGORIES
        <div id="show-product" style="float:right; margin-right:15px; border:thin ridge #FFF; padding:5px; color:#FFF; cursor:pointer; font-size:15px; border-radius:3px;">Tous</div>
    </div>
    @include('graphipro.cat')
<div style="float:left; width:626px;clear: both">
    <div style="font-size:25px; color:#FFF; padding:5px; background-color:#29ABE2; width:616px; margin-top:20px;"><img src="/images/promo.png" height="20" /> PROMOTIONS</div>
    @include('graphipro.promotions')
</div>
<div style="float:left; width:364px; margin-left:10px; color:#666;">
    <div style="font-size:25px; color:#FFF; padding:5px; background-color:#999; width:354px; margin-top:20px;"><img src="/images/point.png" height="20" /> NOS POINT FORTS</div>
    <!--1-->
    <div style="border:thin ridge #CCC; width:352px; height:57.5px; padding:5px;">
        <div style="float:left"><img src="/images/f1.png" /></div>
        <div style="float:left; margin-left:10px; width:280px;">
            <span style="color:#29ABE2; font-size:18px;">NOS TARIFS</span><br />
            Nous mettons tous nos moyens en oeuvre pour vous proposer des prix défiant toute concurence.
        </div>
    </div>
    <!--2-->
    <div style="border:thin ridge #CCC; width:352px; height:57.5px; padding:5px; margin-top:10px;">
        <div style="float:left"><img src="/images/f2.png" /></div>
        <div style="float:left; margin-left:10px; width:280px;">
            <span style="color:#29ABE2; font-size:18px;">NOS DELAIS</span><br />
            Nous sommes attentifs à chaque projet
            d'impression, dans des délais personnalisables.
        </div>
    </div>

    <!--3-->
    <div style="border:thin ridge #CCC; width:352px; height:57.5px; padding:5px; margin-top:10px;">
        <div style="float:left"><img src="/images/f3.png" /></div>
        <div style="float:left; margin-left:10px; width:280px;">
            <span style="color:#29ABE2; font-size:18px;">LA QUALITE</span><br />
            Tout nos travaux son réalisés avec du papier
            incluant des fibres de très grande qualité.
        </div>
    </div>

    <!--4-->
    <div style="border:thin ridge #CCC; width:352px; height:57.5px; padding:5px; margin-top:10px;">
        <div style="float:left"><img src="/images/f4.png" /></div>
        <div style="float:left; margin-left:10px; width:280px;">
            <span style="color:#29ABE2; font-size:18px;">CONSEILS</span><br />
            Tout est réfléchi avec soins par notre équipe concernant
            le choix des couleurs ainsi que leurs effets perçu.
        </div>
    </div>
</div>
<!-- crea-->
<div style="width:1000px; margin-top:20px; float:left; position:relative;">
    <div style="width:1000px; height:10px; top:0; left:0; background-color:#29ABE2"></div>
    <div style="float:left;">
        <img src="/images/graphiste/logo.jpg" />
    </div>
    <div style="float:left; margin-left:20px; width:700px; font-size:30px; color:#666; margin-top:50px;">
        GRAPHIPRO vous présente son studio de création pour prendre en charge votre projet de communication depuis la conception à l’impression.
    </div>
    <div style=" margin-top:20px; width:1000px; float:left; font-size:12px; color:#666">
        <div style="float:left; width:300px;"><center><img src="/images/graphiste/1.png" />
                <span style="font-size:25px;">MAÎTRISE DES LOGICIELS</span><br />
                Un travail éfficace, rapide et bien structuré <br />grâçe à la maîtrise de la suite Adobe <br />(ou) Maitrise de toute la suite Adobe!
            </center></div>
        <div style="float:left; width:300px; margin-left:50px;"><center><img src="/images/graphiste/2.png" />
                <span style="font-size:25px;">GRAPHISTES CRÉATIFS</span><br />
                Une équipe de graphistes experimenté est à votre<br /> écoute et vous apporte créativité, <br />talent et disponibilité.
            </center></div>
        <div style="float:left; width:300px; margin-left:50px;"><center><img src="/images/graphiste/3.png" />
                <span style="font-size:25px;">DÉVELOPPEURS WEB</span><br />
                Nos developpeurs et webdesingers vous accompagneront <br />pour la création de votre site web.
            </center></div>
    </div>

</div>
<!-- crea-->
</div>

@if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::get('sweet_alert.alert') !!});
    </script>
@endif
<script>
    $('#show-product').click(function () {
        $('.product-list').stop().slideDown();
        var scrollX=$(document).scrollTop();
        if (scrollX<424){
            $('body').animate({scrollTop:424}, '500')
        }
    })
</script>
@endsection