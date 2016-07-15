@extends('graphipro.template')
@section('content')
    <style>
        .x_size{max-width:1000px;margin:auto;	min-width:330px;}
        #container{
            margin-top:60px;
            width:1000px;
        }
        #contents, section{width:100% }
        .content_head {width:100%; text-align:center; background:yellow; margin: 0px; border: 1px solid white;margin-left:10px;border:1px solid silver }
        .content{width: 100%; padding-left: 10px; }

        @media screen and (min-width:419px) and (max-width:800px){
            header{width:100%;}
            nav{display:none}
            #nav_setter{display:inline;}
            #container{margin-top:90px;}
            #contents, section{width: 100%; float: none; }
        }
        @media screen and (max-width:418px){
            header{width:100%;}
            nav{width:100%;display:none}
            #nav_setter{display:inline;}
            #container{margin-top:90px;}
            div .fb-like-box{display:none}
            #contents, section{width: 100%; float: none; }
        }
        /*galaxy note2 720x1280/358x639*/

        .logs {
            background-color:rgb(21,77,108);
            margin:0px;
            padding:10px;
        //height:120px;
        //margin-bottom:2px;
        }
        .a{border:1px solid black;width: 20%}
        html{margin:auto;}

        sup{font-size: 7pt;}
        a {
            color:    #2255aa;
            text-decoration:   none;
            cursor:pointer;
        }
        img{ border:0px;margin:0px; }
        h1{color:#29ABE2; font-size:16px; border:0px;}//line-height:0px
                                                                     h4{margin:0px}
        u {color:#2255aa;}

        .grey{color:#666666;}
        .blue{color:#0068B1;}
        .center{ text-align:center; }
        .fleft{ float:left; }
        .border{border:1px solid black;}
        .border-b{border-bottom:1px solid gray;}
        .border-t{border-top:1px solid gray;}
        .white{background:white}

        #ms_menu{width: 100%; }
        #ms_menu a{display: block;  width: 200px; background-color: purple;color: white;text-align: center;border-right: 1px solid white;}

    </style>



    <div id="container" class="x_size">
        <style>
            .white{color:white;font-weight:bolder}
            .table1{
                margin:0px;
                width:100%;
                border:0px;
                background-color:white;
            }
            .table1 td{
                padding:5px;
                background:#e6e6e6;
            }
            .div1{
                width:98%;
                margin:5px;
            }
            .bolder{font-weight:bolder;}
            .whitef{font-color:white;}
            .#29ABE2{background-color:#29ABE2;color:white;border:none;font-weight:bold;}
            .yellow{background-color:yellow;color:black;border:none;}

        </style>

        <div id=contents>

            <div class=content_head>
                <div style="background:#29ABE2;"><center ><h1 style="color:white;margin:0px;">PHOTOCOPIE</h1></center></div>
                <div style="background:#e6e6e6;"><br />
                    - Papier 80g - 250g, délai 24-48heure,<br />
                    - Format A4 - A3 Recto ou Recto/Verso<br />
                    - D’après documents papier ou fichiers informatiques (USB ou par e-mail)<br />
                    - Agrandissement et réduction de vos originaux<br />
                    - <font color="#29ABE2">Le brochage (en cahier) est offert</font><br /><br />
                </div>
            </div content_head>


            <div class="content">

                <center><span style="color:#29ABE2; font-size:24px;">Avoir une idée du prix final ?</span></center>
                <table class=table1>
                    <form id="cartform" name=forms action="cart.php?protype=photocopy" method="post">
                        <tr>
                            <td><b>Format</b> :
                            <td>
                                <input type=radio name=format class=format value=a4r id=a4r onclick=copie_serie() checked=checked> A4 Recto
                                <input type=radio name=format class=format value=a4rv id=a4rv onclick=copie_serie() > A4 Recto-Verso
                                <input type=radio name=format class=format value=a3r id=a3r onclick=copie_serie() > A3 Recto
                                <input type=radio name=format class=format value=a3rv id=a3rv onclick=copie_serie() > A3 Recto-Verso
                            </td>
                        <tr>
                            <td><b>Couleur</b> :
                            <td>
                                <input type=radio name=couleur class=couleur value=nb onclick=copie_serie() checked=checked> Noir
                                <input type=radio name=couleur class=couleur value=4c onclick=copie_serie()> Couleurs
                            </td>
                        </tr>
                        <tr>
                            <td><b>Papier</b> :
                            <td><select name=papier id=papier onchange=copie_serie()>
                                    <option class=papier value=80 selected=selected> 80g
                                    <option class=papier value=cb135> 135g Brillant (+0.02 euros)
                                    <option class=papier value=cb170> 170g Brillant (+0.03)
                                    <option class=papier value=cb200> 200g Brillant ou Mat (+0.04)
                                    <option class=papier value=cb250> 250g Brillant ou Mat (+0.05)
                                    <option class=papier value=mat300> 300g Mat (+0.06)
                                    <option class=papier value=cb300> 300g Brillant (+0.06)
                                    <option class=papier value=adhesif> Adhésif Vélin 80g (+0.06)
                                    <option class=papier value=toile250> Opale toilé 250g (+0.05)
                                    <option class=papier value=chromo250> Chromolux 250g (+0.03)
                                    <option class=papier value=metal300> Métallique 300g (Or, Argent) (+1)
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class=bolder>Quantité : </td>
                            <td colspan=2>
                                <input name=pgs id=pgs onkeypress="return uniquenum()" onkeyup=copie_serie() maxlength=5> page(s) x
                                <input  name=qty id=qty onkeypress="return uniquenum()" onkeyup=copie_serie() maxlength=5 value=1> block(s) ou cahier(s)
                            </td>
                        </tr>
                        <tr>
                            <td class=bolder>Façonnage (option) : </td>
                            <td colspan=2>
                                <input type=radio name=reli class=relis onclick=copie_serie() checked=checked> Non
                                <input type=radio name=reli class=relis onclick=copie_serie() value=pique > Piqûre à cheval (offert)
                                <input type=radio name=reli class=relis onclick=copie_serie() value=spiraleplastique > Reliure Spirale (Plastique)
                                <!--
                                <input type=radio name=reli class=relis onclick=copie_serie() value=spiralemetal > Reliure Spirale (Métallique)-->

                        </tr>
                        <tr class="bolder"><td>Tarif total : <td><input type=text name=ht id=ht readonly> € TTC
                        <tr class="bolder"><td><td> <input type=text name=ttc id=ttc readonly> € HT</tr>

                </table>
                <center> <div id="btn-submit" style="padding:8px; background-color:#29ABE2; width:100px; border-radius:3px; font-size:18px; margin-top:15px; color:#FFF;cursor: pointer;">

                        Commandez

                    </div></center>
                </form>

                <center><h1>Photocopie Noir & Blanc</h1></center>

                <table class=table1>

                    <tr><td>Quantité <td>A4 Recto <td>A4 R./V. <td>A3 Recto <td>A3 R./V.
                    <tr><td>1 - 99 <td>0.08 <td>0.16 <td>0.16 <td>0.32
                    <tr><td>100 - 249 <td>0.07 <td>0.14 <td>0.14 <td>0.28
                    <tr><td>250 - 499 <td>0.06 <td>0.12 <td>0.12 <td>0.24
                    <tr><td>500 - 4999 <td>0.04 <td>0.08 <td>0.08 <td>0.16
                    <tr><td>5000 - 9999 <td>0.03 <td>0.06 <td>0.06 <td>0.12
                    <tr><td>10000 +  <td>0.025 <td>0.05 <td>0.05 <td>0.10
                        </td></tr></table>

                <center><h1>Photocopie Couleur</h1></center>
                <table class=table1> <!--칼라카피-->
                    <tr><td colspan=5 >Prix TTC / 80 grs
                    <tr><td>Quantité <td>A4 Recto <td>A4 R./V. <td>A3 Recto <td>A3 R./V.
                    <tr><td>1 - 99  <td>0,30 <td>0,60 <td>0,60 <td>1,20
                    <tr><td>100 - 249 <td>0,28 <td>0,56 <td>0,56 <td>1,12
                    <tr><td>250 - 499 <td>0.25 <td>0,50 <td>0,50 <td>1,00
                    <tr><td>500 - 999 <td>0.20 <td>0,40 <td>0,80 <td>0,80
                    <tr><td>1000 +  <td>0.17 <td>0,34 <td>0,34 <td>0,68
                        </td></tr></table>

                <!--
                <center><h1>Reliure Spirale (métallique)</h1></center>
                <table class=table1>
                <tr><td>Quantité <td>1 - 10 ex. <td>11 - 25 <td>26 - 100 <td>101 - 200<td>201 +
                <tr><td>1 - 25  <td>1,99 <td>1,67 <td>1,59 <td>1,00 <td>0,80
                <tr><td>26 - 50  <td>2,25 <td>1,99 <td>1,70 <td>1,30 <td>0,90
                <tr><td>51 - 100 <td>2,50 <td>2,17 <td>1,90 <td>1,69 <td>1,00
                <tr><td>101 - 150 <td>3.30 <td>2,80 <td>2,34 <td>1,95 <td>1,50
                <tr><td>151 - 200 <td>3.97 <td>3,36 <td>2,93 <td>2,50 <td>1,99
                <tr><td>201 - 280  <td>4.60 <td>3,99 <td>3,76 <td>2,93 <td>2,29
                </td></tr></table>
                -->


                <script>
                    function copie_serie(){
                        with(document.forms){
                            var f = $(".format:checked").val()
                            var p = $('#pgs').val();
                            var q = $('#qty').val();
                            var q_total = q*p; // (전체페이지 합산)

                            if($('.couleur:checked').val()=='nb'){
                                var key =   [1, 100, 250, 500, 1000, 5000, 10000, 100000];
                                var value = [0.08, 0.07, 0.06, 0.05, 0.04, 0.03, 0.025];
                            }
                            if($('.couleur:checked').val()=='4c'){
                                var key =   [1,    100,  250,  500,   1000, 100000];
                                var value = [0.3,  0.28, 0.25, 0.2,   0.17 ];
                            }

                            if($('.relis:checked').val()=='spiraleplastique'){
                                var spiral_q  = [1,     10,    25,    100,  200, 10000000];
                                var moin_25 = [1.99, 1.67, 1.59, 1.00, 0.80];
                                var moin_50 = [2.25, 1.99, 1.70, 1.30, 0.90];
                                var moin_100=[2.50, 2.17, 1.90, 1.69, 1.00];
                                var moin_150=[3.30, 2.80, 2.34, 1.95, 1.50];
                                var moin_200=[3.97, 3.36, 2.93, 2.50, 1.99];
                                var moin_280=[4.60, 3.99, 3.76, 2.93, 2.29];
                            }
                            //	if($('.relis:checked').val()=='spiralemetal'){
                            //	}

                            if(!p || p==0){$('#ttc').val(0);}
                            if(!q || q==0){q=1;$('#qty').val(1);}


                            if($('.papier:selected').val()=='80')pp=0;
                            if($('.papier:selected').val()=='cb135')pp=0.02;
                            if($('.papier:selected').val()=='cb170')pp=0.03;
                            if($('.papier:selected').val()=='cb200')pp=0.04;
                            if($('.papier:selected').val()=='cb250')pp=0.05;
                            if($('.papier:selected').val()=='cb300')pp=0.06;
                            if($('.papier:selected').val()=='mat300')pp=0.06;
                            if($('.papier:selected').val()=='adhesif')pp=0.06;
                            if($('.papier:selected').val()=='toile250')pp=0.5;
                            if($('.papier:selected').val()=='chromo250')pp=0.3;
                            if($('.papier:selected').val()=='metal300')pp=1;

                            for(i=0; i<value.length; i++){
                                if(q_total>=key[i] && q_total<key[i+1]){
                                    if(f=='a4r')ttcv=(value[i]*q_total)+(pp*q_total);
                                    if(f=='a4rv' || f=='a3r')ttcv=(value[i]*2*q_total)+(pp*2*q_total);
                                    if(f=='a3rv')ttcv=(value[i]*4*q_total)+(pp*4*q_total);


                                    ttcv=ttcv.toFixed(4);
                                    ttcv=(ttcv*1).toFixed(3);
                                    ttcv=(ttcv*1).toFixed(2);
                                    $('#ttc').val(ttcv);
                                    $('#ht').val((ttcv*1.2).toFixed(2));
                                }

                            }

                        }
                    }

                </script>

            </div content>
        </div contents>
    </div ids=container>


    </table>

    </div>
    <script>
        $('#btn-submit').click(function () {
            $('#cartform').submit();
        })
    </script>
@endsection