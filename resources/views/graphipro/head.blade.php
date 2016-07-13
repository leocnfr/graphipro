@inject('product','App\Products')
<style>
    #top-des {
        height: 20px;
        font-size: 12px;
        color: #999;
        background-color: #E6E6E6;
        width: 100%
    }

    #top-des-text {
        width: 1000px;
        margin: 0 auto;
        display: block;
    }

    #top2 {
        height: 100px;
        width: 100%;
        background-color: #F2F2F2;
        float: left;
    }

    .menu1 {
        float: left;
        font-size: 17px;
        line-height: 18px;
        height: 55px;
        position: relative
    }
</style>
<div id="top-des">
    <span id="top-des-text">
        Imprimeur Paris, impression pas cher, flyers, bâches - Votre imprimeur discount parisien
    </span>
</div>
<div id="top2">
    <div style="width:1000px; margin:0 auto;">
        <a href="{{url('/')}}"><img src="/images/logo1.png" height="100" style=" float:left"> </a>
        <div style=" float:left; margin-left:20px; padding-top:12px; position:relative">
            <img src="/images/headt4.png" style=" position:absolute; top:48px; left:167px; z-index:10; "/>
            <img id="head11" src="/images/headt1.png" style="position:absolute; left:39px; top:24px; visibility:hidden">
            <img id="head33" src="/images/headt3.png"
                 style="position:absolute; left:167px; top:24px; visibility:hidden">
            <img id="head22" src="/images/headt2.png"
                 style="position:absolute; left:212px; top:24px; visibility:hidden">
            <img src="/images/color.png">
        </div>
        <div style="float:right;">
            <center>
                <span style="color:#29ABE2; font-size:20px;">Service Client</span><br>

                <div style="padding:5px; background-color:#29ABE2; color:#FFF; font-size:20px; border-radius:10px;">0146
                    70 00 63
                </div>
                <div style="font-size:16px; color:#999; line-height:18px; ">Du lundi au vendredi<br>de 9h30 à 18h30
                </div>
            </center>
        </div>
        <!-- <img src="images/service.png" height="100" style="float:right;"> -->
    </div>
</div>
<div id="jump" style="width:100%;  height:55px; background-image:url(/images/bar.png);clear: left">
    <div style="width:1000px; margin:0 auto;clear: both">
        <div class="menu1">
            <a class="aa" href="#" onmouseover="$(this).next().show()" onmouseout="$(this).next().hide()">
                <center>Tous nos<br> produits <img src="/images/fleche.png"></center>
            </a>
            <div class="headmenu" onmouseover="$(this).show()" onmouseout="$(this).hide()">
                <!--deco -->
                <div style="position:absolute; height:10px; width:100%;  background-color:#29ABE2; top:-10px; left:0; ">
                    <div style="position:absolute; top:-6px; left:60px;"><img src="/images/fleche1.png"/></div>
                </div>
                <!--deco -->
                <div class="noregle" style="float:left;">
                    <img src="/images/fleche2.png"/> <span style="font-size:20px; color:#29ABE2">Carte</span><br/>

                    <div style="margin-left:14px;">
                        <!--                  Carte      -->
                        @foreach($product->showByCat(22) as $item)
                            <a href="{{url('/product/'.$item->id)}}" style="">
                                <li>{{$item->name}}</li>
                            </a>
                        @endforeach


                    </div>
                    <br/>

                    <img src="/images/fleche2.png"/> <span style="font-size:20px; color:#29ABE2">Papeterie</span><br/>

                    <div style="margin-left:14px;">
                        @foreach($product->showByCat(25) as $item)
                            <a href="{{url('/product/'.$item->id)}}" style="">
                                <li>{{$item->name}}</li>
                            </a>
                        @endforeach

                    </div>
                    <br/>


                </div>
                <div class="noregle" style="float:left; margin-left:20px;">
                    <img src="/images/fleche2.png"/> <span style="font-size:20px; color:#29ABE2">Impression</span><br/>

                    <div style="margin-left:14px;">
                        @foreach($product->showByCat(28) as $item)
                            <a href="{{url('/product/'.$item->id)}}" style="">
                                <li>{{$item->name}}</li>
                            </a>
                        @endforeach
                    </div>
                    <br/>

                    <img src="images/fleche2.png"/> <span style="font-size:20px; color:#29ABE2">Grand format</span><br/>

                    <div style="margin-left:14px;">
                        @foreach($product->showByCat(24) as $item)
                            <a href="{{url('/product/'.$item->id)}}" style="">
                                <li>{{$item->name}}</li>
                            </a>
                        @endforeach
                    </div>
                    <br/>

                    <img src="/images/fleche2.png"/> <span
                            style="font-size:20px; color:#29ABE2">Impression publicitaire </span><br/>

                    <div style="margin-left:14px;">
                        @foreach($product->showByCat(23) as $item)
                            <a href="{{url('/product/'.$item->id)}}" style="">
                                <li>{{$item->name}}</li>
                            </a>
                        @endforeach
                    </div>
                    <br/>


                </div>
                <div class="noregle" style="float:left; margin-left:20px;">
                    <img src="/images/fleche2.png"/> <span style="font-size:20px; color:#29ABE2">Gastronomie & Sac publicité</span><br/>

                    <div style="margin-left:14px;">
                        @foreach($product->showByCat(27) as $item)
                            <a href="{{url('/product/'.$item->id)}}" style="">
                                <li>{{$item->name}}</li>
                            </a>
                        @endforeach
                    </div>
                    <br/>
                    <img src="/images/fleche2.png"/> <span
                            style="font-size:20px; color:#29ABE2">Stands & Présentoirs </span><br/>

                    <div style="margin-left:14px;">
                        @foreach($product->showByCat(26) as $item)
                            <a href="{{url('/product/'.$item->id)}}" style="">
                                <li>{{$item->name}}</li>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div style="float:right; margin-left:20px;">
                    <img src="/images/pub1.jpg" width="300"/>
                </div>
            </div>

        </div>
        <div class="menu1">
            <a class="aa" href="#" onmouseover="$(this).next().show()" onmouseout="$(this).next().hide()">
                <center>Carte &<br> Papeterie <img src="/images/fleche.png"></center>
            </a>
            <div class="headmenu1" onmouseover="$(this).show()" onmouseout="$(this).hide()">
                <!--deco -->
                <div style="position:absolute; height:10px; width:100%;  background-color:#29ABE2; top:-10px; left:0; ">
                    <div style="position:absolute; top:-6px; left:190px;"><img src="/images/fleche1.png"/></div>
                </div>
                <!--deco -->
                <div class="noregle" style="float:left; width:350px;">
                    <div style="float:left;">
                        <img src="/images/fleche2.png"/> <span style="font-size:20px; color:#29ABE2">Carte</span><br/>

                        <div style="margin-left:14px;">
                            @foreach($product->showByCat(22) as $item)
                                <a href="{{url('/product/'.$item->id)}}" style="">
                                    <li>{{$item->name}}</li>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div style="float:left; margin-left:20px;">
                        <img src="/images/fleche2.png"/> <span
                                style="font-size:20px; color:#29ABE2">Papeterie</span><br/>

                        <div style="margin-left:14px;">
                            @foreach($product->showByCat(25) as $item)
                                <a href="{{url('/product/'.$item->id)}}" style="">
                                    <li>{{$item->name}}</li>
                                </a>
                            @endforeach
                        </div>
                        <br/>
                    </div>
                    <div style="border-top:thin ridge #999; padding-top:10px; width:350px; font-size:12px; float:left ">
                        Nous nous engageons avec vous à confectionner les objets incontournables qui vous permettront de
                        vous faire connaître
                    </div>
                </div>

                <div style="float:right;">
                    <img src="images/pub1.jpg" width="370"/>
                </div>
            </div>

        </div>
        <div class="menu1">
            <a class="aa" href="#" onmouseover="$(this).next().show()" onmouseout="$(this).next().hide()">
                <center>Impression & <br> Grand format <img src="/images/fleche.png"></center>
            </a>
            <div class="headmenu2" onmouseover="$(this).show()" onmouseout="$(this).hide()">
                <!--deco -->
                <div style="position:absolute; height:10px; width:100%;  background-color:#29ABE2; top:-10px; left:0; ">
                    <div style="position:absolute; top:-6px; left:320px;"><img src="images/fleche1.png"/></div>
                </div>
                <!--deco -->
                <div class="noregle" style="float:left; width:350px;">
                    <img src="/images/fleche2.png"/> <span style="font-size:20px; color:#29ABE2">Impression</span><br/>

                    <div style="margin-left:14px;">
                        @foreach($product->showByCat(23) as $item)
                            <a href="{{url('/product/'.$item->id)}}" style="">
                                <li>{{$item->name}}</li>
                            </a>
                        @endforeach
                    </div>
                    <br/>

                    <img src="/images/fleche2.png"/> <span style="font-size:20px; color:#29ABE2">Grand format</span><br/>

                    <div style="margin-left:14px; padding-bottom:10px;"><a href="#" style="">
                            @foreach($product->showByCat(24) as $item)
                                <a href="{{url('/product/'.$item->id)}}" style="">
                                    <li>{{$item->name}}</li>
                                </a>
                        @endforeach
                    </div>
                    <br/>

                    <div style="font-size:12px; border-top:thin ridge #999; padding-top:10px; width:350px; ">
                        Gestion de l’impression de l’ensemble de vos supports de communication : tous les formats sur
                        tout type de grammage<br/><br/>
                        *Autocollant: autocollant (brillant ou mat), caisson adhésif, dépoli argenté<br/>
                        **Bache: bache m1, bache 550g<br/>
                        ***Autre support: caisson, toile, stastique, film transparent, papier, papier photo, papier dos
                        bleu
                    </div>

                </div>

                <div style="float:right;">
                    <img src="/images/pub2.jpg" width="370"/>
                </div>
            </div>

        </div>
        <div class="menu1">
            <a class="aa" href="#" onmouseover="$(this).next().show()" onmouseout="$(this).next().hide()">
                <center>Gastronomie & <br>Sac publicité <img src="/images/fleche.png"></center>
            </a>
            <div class="headmenu3" onmouseover="$(this).show()" onmouseout="$(this).hide()">
                <!--deco -->
                <div style="position:absolute; height:10px; width:100%;  background-color:#29ABE2; top:-10px; left:0; ">
                    <div style="position:absolute; top:-6px; left:450px;"><img src="/images/fleche1.png"/></div>
                </div>
                <!--deco -->
                <div class="noregle" style="float:left;">
                    <img src="/images/fleche2.png"/> <span style="font-size:20px; color:#29ABE2">Gastronomie & Sac publicité</span><br/>

                    <div style="margin-left:14px;">
                        @foreach($product->showByCat(27) as $item)
                            <a href="{{url('/product/'.$item->id)}}" style="">
                                <li>{{$item->name}}</li>
                            </a>
                        @endforeach
                    </div>
                    <br/>

                    <div style="font-size:12px; border-top:thin ridge #999; padding-top:10px; width:350px; ">
                        Notre équipe concentre son énergie afin de mettre en lumière la réalisation graphique des
                        produits de votre restaurant
                    </div>

                </div>

                <div style="float:right;">
                    <img src="/images/pub3.jpg" width="370"/>
                </div>
            </div>

        </div>
        <div class="menu1">
            <a class="aa" href="#" onmouseover="$(this).next().show()" onmouseout="$(this).next().hide()">
                <center>Impression publicitaire <img src="/images/fleche.png"></center>
            </a>
            <div class="headmenu4" onmouseover="$(this).show()" onmouseout="$(this).hide()">
                <!--deco -->
                <div style="position:absolute; height:10px; width:100%;  background-color:#29ABE2; top:-10px; left:0; ">
                    <div style="position:absolute; top:-6px; left:580px;"><img src="/images/fleche1.png"/></div>
                </div>
                <!--deco -->
                <div class="noregle" style="float:left;">
                    <img src="/images/fleche2.png"/> <span
                            style="font-size:20px; color:#29ABE2">Impression publicitaire </span><br/>

                    <div style="margin-left:14px;">
                        @foreach($product->showByCat(23) as $item)
                            <a href="{{url('/product/'.$item->id)}}" style="">
                                <li>{{$item->name}}</li>
                            </a>
                        @endforeach
                    </div>
                    <br/>

                    <div style="font-size:12px; border-top:thin ridge #999; padding-top:10px; width:350px; ">
                        Nous mettons toute notre expérience pour donner du « mordant » à votre communication
                    </div>
                </div>

                <div style="float:right;">
                    <img src="/images/pub5.jpg" width="370"/>
                </div>
            </div>

        </div>
        <div class="menu1">
            <a class="aa" href="#" onmouseover="$(this).next().show()" onmouseout="$(this).next().hide()">
                <center>Stands & <br>Présentoirs <img src="/images/fleche.png"></center>
            </a>
            <div class="headmenu5" onmouseover="$(this).show()" onmouseout="$(this).hide()">
                <!--deco -->
                <div style="position:absolute; height:10px; width:100%;  background-color:#29ABE2; top:-10px; left:0; ">
                    <div style="position:absolute; top:-6px; left:710px;"><img src="/images/fleche1.png"/></div>
                </div>
                <!--deco -->
                <div class="noregle" style="float:left;">
                    <img src="/images/fleche2.png"/> <span
                            style="font-size:20px; color:#29ABE2">Stands & Présentoirs </span><br/>

                    <div style="margin-left:14px;">
                        @foreach($product->showByCat(26) as $item)
                            <a href="{{url('/product/'.$item->id)}}" style="">
                                <li>{{$item->name}}</li>
                            </a>
                        @endforeach
                    </div>
                    <br/>

                    <div style="font-size:12px; border-top:thin ridge #999; padding-top:10px; width:350px; ">
                        L’Agence est à vos côtés pour l’ensemble de l’organisation, coordination et conception de votre
                        événement
                    </div>
                </div>

                <div style="float:right;">
                    <img src="/images/pub4.jpg" width="370"/>
                </div>
            </div>

        </div>
        <div style="float:right;  border-radius:0 0 8px 8px; background-color:#29ABE2; height:45px; color:#FFF; padding:5px;">
            <a href="{{url('/panier')}}" style="color:#FFF;">
                <img src="/images/pannier.png" height="40" style="float:left;">

                <div style="float:left; margin-left:5px;"><span style="font-size:18px;">MON PANIER</span><br>
                   <span id="head-item">
                       {{$count}}
                   </span>
                    article(s)
                    <span id="head-price">
                        {{$total_price}}
                    </span> €
                </div>
            </a>
        </div>
        @if (Auth::guard('web')->check())
            <a href="{{url('/compte')}}"
               style="padding:5px; float:right; border-radius:0 0 8px 8px; background-color:#29ABE2; height:45px; font-size:16px; color:#FFF; margin-right:10px;">
                <center><img src="/images/login.png">Espace-Client</center>
            </a>
        @else
            <a href="{{url('/login')}}"
               style="padding:5px; float:right; border-radius:0 0 8px 8px; background-color:#29ABE2; height:45px; font-size:16px; color:#FFF; margin-right:10px;">
                <center><img src="/images/login.png">Login</center>
            </a>
        @endif
    </div>
</div>
<script src="http://www.greensock.com/js/src/TweenMax.min.js" type="text/javascript"></script>
<script src="/js/js.js"></script>