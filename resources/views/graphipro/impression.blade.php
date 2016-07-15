@extends('graphipro.template')
@section('content')





    <style>
        .x_size{max-width:1000px;margin:auto;	min-width:330px;}
        #container{
            margin-top:10px;
            width:1000px;
        }
        #contents, section{width: 100%;  }
        .content{width: 100%; }

        @media screen and (min-width:419px) and (max-width:800px){

            #container{margin-top:90px;}
            #contents, section{width: 100%; float: none; }
        }
        @media screen and (max-width:418px){

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
    </style>



    <div id="container" class="x_size">

        <style>
            .white{color:white;font-weight:bolder;}
            .table{
                border:0px;
                padding:0px;
                background-color:gray;
                height:50px;
            }
            .bolder{font-weight:bolder;}
            .whitef{font-color:white;}
            .red{background-color:red;color:white;border:none;font-weight:bold;}
            .yellow{background-color:yellow;color:black;border:none;}
            fieldset{border:1px solid silver;padding:5px;min-width:450px;width:100%}
        </style>

        <div id=contents>


            <div class="content">

                <span style="color:#29ABE2; font-size:24px; margin-left:-40px;">Avoir une idée du prix final ?</span>
                <div class="h1_sub">Délai : 1 à 2 jours selon la quantité (dans la journée possible)</div>


                <fieldset>

                    <form name=form1 action="cart.php?protype=impression" method="post" >
                        <button>Submit</button>
                        <table width=100% cellpadding=0 cellspacing=0>

                            <td valign=top>
                                <b>Format</b> :<br>
                                <input type=radio name=format class=format value=a6r id=a6r onclick=imp_unite() > A6 Recto (14.8x10.5cm)<br>
                                <input type=radio name=format class=format value=a6rv id=a6rv onclick=imp_unite() > A6 Recto-verso<br>
                                <input type=radio name=format class=format value=dlr id=dlr onclick=imp_unite() > DL Recto (21x10cm)<br>
                                <input type=radio name=format class=format value=dlrv id=dlrv onclick=imp_unite() > DL Recto-verso<br>
                                <input type=radio name=format class=format value=a5r id=a5r onclick=imp_unite() > A5 Recto (21x14.8cm)<br>
                                <input type=radio name=format class=format value=a5rv id=a5rv onclick=imp_unite() > A5 Recto-verso<br>
                                <input type=radio name=format class=format value=a4r id=a4r onclick=imp_unite() checked=checked> A4 Recto (21x29.7cm)<br>
                                <input type=radio name=format class=format value=a4rv id=a4rv onclick=imp_unite() > A4 Recto-Verso<br>
                                <input type=radio name=format class=format value=a3r id=a3r onclick=imp_unite() > A3 Recto (29.7x42cm)<br>
                                <input type=radio name=format class=format value=a3rv id=a3rv onclick=imp_unite() > A3 Recto-Verso
                                <style>.w1{width:1px;background:silver}</style>

                            <td><b>Grammage de papier</b> : </br>
                                <input type=radio name=gramme class=gramme value=80 id=80 onclick=imp_unite()  > 80g offset<br>
                                <input type=radio name=gramme class=gramme value=81 id=81 onclick=imp_unite()  checked=checked > 80g Recyclé (blanc ou couleur) <br>
                                <input type=radio name=gramme class=gramme value=100 id=100 onclick=imp_unite()  checked=checked > 100g Recyclé<br>
                                <input type=radio name=gramme class=gramme value=135 id=135 onclick=imp_unite()  checked=checked > 135g <br>
                                <input type=radio name=gramme class=gramme value=170 id=170 onclick=imp_unite() > 170g<br>
                                <input type=radio name=gramme class="gramme 200" value=200 id=200 onclick=imp_unite() > 200g<br>
                                <input type=radio name=gramme class="gramme 200" value=300 id=300 onclick=imp_unite() > 300g<br>
                                <input type=radio name=gramme class="gramme 200" value=adhesif id=adhesif onclick=imp_unite() > Adhésif Vélin 80g<br>
                                <input type=radio name=gramme class=gramme value=toile250 id=toile250 onclick=imp_unite() > Opale toilé 250g
                                <br>
                                <input type=radio name=gramme class=gramme value=chromo250 id=chromo250 onclick=imp_unite() > Chromolux 250g<br>
                                <input type=radio name=gramme class=gramme value=300metal id=metal300 onclick=imp_unite() > Métallique 300g (Or, Argent)
                        </table>

                        <div id="pellicul" style="display:none;border:1px solid silver;padding:5px;background:yellow">
                            Pelliculage :
                            <input type=radio name=pellicul_rv_option  class="pellicul"  value=0  checked   onclick="imp_unite()">non
                            <input type=radio name=pellicul_rv_option  class="pellicul"  value="pellicul_r" onclick="imp_unite()">Recto
                            <input type=radio name=pellicul_rv_option  class="pellicul"  value="pellicul_rv" onclick="imp_unite()" >Recto/Verso
						<span id="pellicul_choice" style="display=none">
						<input type=radio name=pellicul_type  class="pellicul"  value="pellicul_brillant" checked onclick="imp_unite()">Brillant
						<input type=radio name=pellicul_type  class="pellicul"  value="pellicul_mat" onclick="imp_unite()">Mat
						</span>
                        </div>

                        <table style="border-collapse:collapse;">
                            <tr>
                                <td class=bolder>Quantité :
                                <td colspan=3><input type=text name=qty id=qty onkeypress="return uniquenum()" onkeyup=imp_unite() maxlength=5 size=10> x <input type=text name=qty2 id=qty2 onkeypress="return uniquenum()" onkeyup=imp_unite() maxlength=5 size=10 value=1> cahier(s) ou block(s)

                            <tr  class="bolder" bgcolor="silver"><td>Poids : <td colspan=2><input type=text name=poid id=poid readonly size=12> kg
                            <tr  bgcolor="#C1E8F7" class="bolder"><td>Tarif total : <td colspan=2><input type=text name=ht id=ht readonly size=12> € HT
                            <tr  bgcolor="#C1E8F7" class="bolder"><td><td colspan=2> <input type=text name=ttc id=ttc readonly size=12> € TTC
                        </table>


                        <div style="border:1px solid gray; width:100%">

                            <style>
                                .folding{text-align:center;}
                                .folding td{border:0px solid silver;}
                            </style>

                            <table class=folding align=center cellspacing=0px width=100%>
                                <tr><td colspan=7 bgcolor="#29ABE2" style="color:#FFF">Option : pliage ou rainage : < 200 ex. = 10€, < 500 ex. = 20€, < 1000 ex. = 30€,  au-delà = 40€
                                <tr>
                                    <td>
                                        <br><br><br><br><br><br>
                                        <input type=radio class=folding name=folding value=0 checked=checked  onclick=imp_unite()><br>
                                        sans pli
                                    <td>
                                        <img src="/img/folding_single.jpg"><br>
                                        <input type=radio class=folding name=folding value=simple  onclick=imp_unite()><br>
                                        simple
                                    <td>
                                        <img src="/img/folding_letter.jpg"><br>
                                        <input type=radio class=folding name=folding value=letter  onclick=imp_unite()><br>
                                        roulé
                                    <td>
                                        <img src="/img/folding_zigzag.jpg"><br>
                                        <input type=radio class=folding name=folding value=zigzag  onclick=imp_unite()><br>
                                        accordéon
                                    <td>
                                        <img src="/img/folding_double.jpg"><br>
                                        <input type=radio class=folding name=folding value=double  onclick=imp_unite()><br>
                                        économique
                                    <td>
                                        <img src="/img/folding_out.jpg"><br>
                                        <input type=radio class=folding name=folding value=decale  onclick=imp_unite()><br>
                                        accordéon décalé
                                    <td>
                                        <img src="/img/folding_gate.jpg"><br>
                                        <input type=radio class=folding name=folding value=gate  onclick=imp_unite()><br>
                                        fenêtre

                                <tr><td colspan=7 bgcolor="#29ABE2" style="color:#FFF">Option : Dos-Carré-Collé (prix/piece): < 5 ex. = 5€, < 10 ex. = 4€, < 50 ex. = 3€, < 100 ex. = 2€,  au-delà de 100ex. = 1€
                                <tr><td colspan=7>

                                        <style>.faco{float:left;margin-right:1px; margin-left:1px}</style>

                                        <div class=faco><br><br><br>
                                            <input type=radio class=reliure name=reliure  value=0 onclick=imp_unite() checked><br>
                                            pas de reliure
                                        </div>

                                        <div class=faco>
                                            <img src="/img/faco/f_cahier.jpg" height="80px"><br>
                                            <input type=radio class=reliure name=reliure value=cahier  onclick=imp_unite()><br>
                                            Piqûre à cheval (service offert)
                                        </div>

                                        <div class=faco>
                                            <img src="/img/faco/f_dos.jpg" height="80px"><br>
                                            <input type=radio class=reliure name=reliure value=dos_livre  onclick=imp_unite()><br>
                                            Dos-Carré-Collé (livre)
                                        </div>

                                        <div class=faco>
                                            <img src="/img/faco/f_dos_rabat.jpg" height="80px"><br>
                                            <input type=radio class=reliure name=reliure value=dos_rabat  onclick=imp_unite()><br>
                                            Dos-Carré-Collé a. rabat
                                        </div>

                                        <div class=faco  style="display:none">
                                            <img src="/img/faco/f_dos_thermo.jpg" height="80px"><br>
                                            <input type=radio class=reliure name=reliure value=dos_thermo  onclick=imp_unite()><br>
                                            Dos-Carré-Collé Thermo
                                        </div>

                                        <div class=faco style="display:none">
                                            <img src="/img/faco/f_metal.jpg" height="80px"><br>
                                            <input type=radio class=reliure name=reliure value=dos_metal  onclick=imp_unite()><br>
                                            Anneau Métal
                                        </div>

                                        <div class=faco>
                                            <img src="/img/faco/f_plastique.jpg" height="80px"><br>
                                            <input type=radio class=reliure name=reliure value=dos_plastique  onclick=imp_unite()><br>
                                            Anneau Plastique
                                        </div>


                            </table>
                        </div>

                    </form>
                </fieldset>



                <script>
                    imp_unite();
                    function imp_unite(){
                        var f = $(".format:checked").val()
                        var gr = $(".gramme:checked").val()
                        var fold = $(".folding:checked").val()
                        var reli = $(".reliure:checked").val()
                        var q = $("#qty").val();
                        var q2 = $("#qty2").val();
                        var p = $('#poid').val();
                        var k = [1,  5,   10,   20,  30,   40,  50,   60,  70,    80,   90,   100,    150,    200,   300,  400,  500,   600,  700,  800,  900,  1000,  1500, 2000,  2500, 3000,  10000, 10000000];
                        var v = [1,  0.9, 0.8, 0.7,  0.6, 0.5, 0.45, 0.4, 0.39, 0.38, 0.36, 0.322, 0.321, 0.311, 0.28, 0.25, 0.236, 0.21, 0.19, 0.18, 0.17, 0.152, 0.14, 0.137, 0.13,  0.122, 0.12 ];
                        var v_length = v.length;
                        var pellicul_val = $(".pellicul:checked").val();

                        if(!q)$("#qty").val("1");//$('#ht').val(0);$('#ttc').val(0);$('#poid').val(0);} //default value

                        // grammage de papier
                        if(gr==80)pp=0.01;
                        else if(gr==81)pp=0.0135;
                        else if(gr==100)pp=0.017;
                        else if(gr==135)pp=0.02;
                        else if(gr==170)pp=0.03;
                        else if(gr==200)pp=0.04;
                        else if(gr==300)pp=0.06;
                        else if(gr=='adhesif')pp=0.06;
                        else if(gr=='toile250')pp=0.3;
                        else if(gr=='chromo250')pp=0.3;
                        else if(gr=='300metal')pp=1;

                        // quantite impression

                        var q3=(q*q2);

                        for(i=0; i<v_length; i++){
                            // cacul de prix / par format
                            if(q3>=k[i] && q3<k[i+1]){
                                htv=(v[i]*q3)+(pp*q);
                                if(f=='a6r')htv=htv*0.4;
                                else if(f=='a6rv')htv=htv*0.55;
                                else if(f=='dlr')htv=htv*0.5;
                                else if(f=='dlrv')htv=htv*0.7;
                                else if(f=='a5r')htv=htv*0.75;
                                else if(f=='a5rv')htv=htv*0.98;
                                else if(f=='a4r')htv=htv*1; //기준가
                                else if(f=='a4rv')htv=htv*1.3;
                                else if(f=='a3r')htv=htv*1.5;
                                else if(f=='a3rv')htv=htv*2;

                                // ajout de pelliculage
                                var pellicul_price = 0, pellicul_base=0;
                                if($(".gramme").filter(".200").eq(0).attr("checked")||$(".gramme").filter(".200").eq(1).attr("checked")||$(".gramme").filter(".200").eq(2).attr("checked")){
                                    $("#pellicul").show();
                                    if( f=='a6r' || f=='a6rv' )pellicul_base=0.03;
                                    else if( f=='dlr' || f=='dlrv' )pellicul_base=0.04;
                                    else if( f=='a5r' || f=='a5rv' )pellicul_base=0.05;
                                    else if( f=='a4r' || f=='a4rv' )pellicul_base=0.1; //기준가
                                    else if( f=='a3r' || f=='a3rv' )pellicul_base=0.2;
                                    if($("input[name=pellicul_rv_option]:checked").val()=="pellicul_rv")pellicul_price = (q3*(0.1*2))+10;
                                    else pellicul_price = (q3*0.1)+10;
                                    if(pellicul_val != 0) {
                                        htv += pellicul_price;
                                        $("#pellicul_choice").show();
                                    }else $("#pellicul_choice").hide();
                                }else{
                                    $("input[name=pellicul_rv_option]").eq(0).attr("checked",true);
                                    $("#pellicul").hide();
                                    pellicul_price = 0;
                                }

                                // ajout de pliage
                                if(fold!=0){
                                    if(q<=200)htv+=10;
                                    else if(q<=500)htv+=20;
                                    else if(q<=1000)htv+=30;
                                    else htv +=40;
                                }
                                if(q2=='')q2=1;
                                if(reli!=0 && reli!='cahier'){
                                    if(q2<=5)htv+=(q2*5);
                                    else if(q2<=10)htv+=(q2*4);
                                    else if(q2<=50)htv+=(q2*3);
                                    else if(q2<=100)htv+=(q2*2);
                                    else htv +=(q2*1);
                                }

                                htv=htv.toFixed(4);
                                htv=(htv*1).toFixed(3);
                                htv=(htv*1).toFixed(2);
                                $('#ht').val(htv);

                                ttcv=htv*1.2;
                                ttcv=ttcv.toFixed(4);
                                ttcv=(ttcv*1).toFixed(3);
                                ttcv=(ttcv*1).toFixed(2);
                                $('#ttc').val(ttcv)
                            }

                        }

                        // cacul de poid //
                        if(f=='a6r' || f=='a6rv')pv=((10*15*gr*q)/10000000);
                        if(f=='a5r' || f=='a5rv')pv=((21*14.85*gr*q)/10000000);
                        if(f=='dlr' || f=='dlrv')pv=((21*10*gr*q)/10000000);
                        if(f=='a4r' || f=='a4rv')pv=((21*29.7*gr*q)/10000000);
                        if(f=='a3r' || f=='a3rv')pv=((42*29.7*gr*q)/10000000);
                        pv=pv.toFixed(6);
                        pv=(pv*1).toFixed(5);
                        pv=(pv*1).toFixed(4);
                        pv=(pv*1).toFixed(3);
                        $('#poid').val(pv)
                    }
                    /*
                     80g = 0.01 / 0.005
                     135g = 0.04 / 0.02
                     170g = 0.06 / 0.03
                     200g = 0.07
                     300g = 0.11 / 0.06
                     adhesif = 0.11
                     opal = 0.5
                     chromolux = 0.3
                     Metallique = 1

                     if(gr==100)pp=0.01;
                     if(gr==135)pp=0.02;
                     if(gr==170)pp=0.03;
                     if(gr==200)pp=0.04;
                     if(gr==300)pp=0.06;
                     if(gr=='adhesif')pp=0.06;
                     if(gr=='toile250')pp=0.5;
                     if(gr=='chromo250')pp=0.3;
                     if(gr=='300metal')pp=1;
                     */
                </script>

            </div content>
        </div contents>
    </div ids=container>


    </table>

    </div>

@endsection