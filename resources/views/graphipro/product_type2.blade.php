<table width="1000" border="0" v-cloak id="content">

    <tr>
        <td valign="top" width="450">
            <div style="font-size:20px; color:#29ABE2; margin-top:20px;">1. Choisir les options d'impression</div><br />
            <div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2; line-height:35px; color:#29ABE2">

                Larger: <input style="width:72px" type="number" id="larger"  maxlength="10" v-model="larger" min="0" />cm x Hauter: <input  id="hauter"  size="10" maxlength="10" v-model="hauter" type="number" min="0" style="width: 72px" />cm = <input name="" type="text" size="5" maxlength="5" readonly="readonly" id="m2"  v-model="m2" style="width: 60px"/> M2
                <br/>
                <span>Matériels:</span>

                <select  id="materiels" style="width:220px;"  v-model="materiels">
                    <option v-for="option in options" v-bind:value="{price:option.value,text:option.text}">
                        @{{option.text}}
                    </option>
                </select>
                <br/>
                <span>Quantité:</span> <input size="10" maxlength="10" id="quantity" v-model="quantity" number/> EX

                <br/>

                <span>Création:</span>

                <select id="creation" name="jumpMenu" id="jumpMenu" style="width:220px;">
                    <option value="0">Fournir par client</option>
                    <option value="{{$product->design_price}}">+{{$product->design_price}}</option>
                </select>
                <br/>
            </div>
            <div v-if="m2<10">
                <div style="font-size:20px; color:#29ABE2; margin-top:20px;">2.Delais</div><br />
                <div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2;">
                    Choix le moyen de livraison:
                    <select name="delais" id="delais" style="width:220px;">
                        <option value="normal">Normal</option>
                        <option value="24h">24h</option>
                    </select>
                </div>
            </div>

            <div style="font-size:20px; color:#29ABE2; margin-top:20px;">
                <span v-if="m2<10">3.Option de livraison</span>
            </div><br />
            <div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2;">
                Choix le moyen de livraison:
                <select name="jumpMenu" id="jumpMenu" style="width:220px;">
                    <option>Récupérer au bureau Graphipro</option>
                    <option>Livraison chez vous J+3</option>
                    <option>Livraison chez vous par UPS J+2</option>
                </select>

            </div>


        </td>
        <td valign="top" style="padding-left:30px">
            <div style="width:600px; margin-top:15px; float:left; ">
                <div style="font-size:20px; color:#29ABE2; margin-top:20px;">Prix d'impression (par mètre carré)</div><br />
                <table width="550" border="1" style="border-collapse: collapse">
                    <tr>
                        <td align="center">Matériels</td>
                        <td align="center">Prix (ht)</td>
                    </tr>
                    <tr>
                        <td>Adhésif blanc Brillant</td>
                        <td align="center">15€</td>

                    </tr>
                    <tr>
                        <td>Adhésif blanc Mat</td>
                        <td align="center">15€</td>
                    </tr>
                    <tr>
                        <td>Adhésif microperforés (Extérieur)</td>
                        <td align="center">35€</td>
                    </tr>
                    <tr>
                        <td>Adhésif microperforés (Intérieur)</td>
                        <td align="center">45€</td>
                    </tr>
                    <tr>
                        <td>Adhésif transparent</td>
                        <td align="center">25€</td>
                    </tr>
                    <tr>
                        <td>Backlite</td>
                        <td align="center">35€</td>
                    </tr>
                    <tr>
                        <td>Vitrophanie pour caisson</td>
                        <td align="center">25€</td>
                    </tr>
                    <tr>
                        <td>Bâche 550g</td>
                        <td align="center">25€</td>
                    </tr>
                    <tr>
                        <td>Tissu</td>
                        <td align="center">29€</td>
                    </tr>
                    <tr>
                        <td>Films stastique</td>
                        <td align="center">35€</td>
                    </tr>
                    <tr>
                        <td>Films dépoli argenté</td>
                        <td align="center">35€</td>
                    </tr>
                    <tr>
                        <td>Toile canvas 480 microns</td>
                        <td align="center">39€</td>
                    </tr>
                    <tr>
                        <td>Papier satiné 150g</td>
                        <td align="center">15€</td>
                    </tr>
                    <tr>
                        <td>Papier photo satiné 200g</td>
                        <td align="center">25€</td>
                    </tr>
                    <tr>
                        <td>PVC 150g</td>
                        <td align="center">35€</td>
                    </tr>
                    <tr>
                        <td>Tyvek jaune fluo indéchirable 130g</td>
                        <td align="center">20€</td>
                    </tr>
                </table>
            </div>
        </td>

    </tr>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.js"></script>
<script>
    var vm =new Vue({
        el:'body',
        data:{
            larger:'',
            hauter:'',
            quantity:'',
            materiels:{
                price:15,
                text:'Adhésif blanc Brillant'
            },
            options:[
                {'text':'Adhésif blanc Brillant',value:15},
                {'text':'Adhésif blanc Mat',value:15},
                {'text':'Adhésif microperforés (Extérieur)',value:35},
                {'text':'Adhésif microperforés (Intérieur)',value:45},
                {'text':'Adhésif transparent',value:25},
                {'text':'Backlite',value:35},
                {'text':'Vitrophanie pour caisson',value:25},
                {'text':'Bâche 550g',value:25},
                {'text':'Tissu',value:29},
                {'text':'Films stastique',value:35},
                {'text':'Films dépoli argenté',value:35},
                {'text':'Toile canvas 480 microns',value:39},
                {'text':'Papier satiné 150g',value:15},
                {'text':'Papier photo satiné 200g',value:25},
                {'text':'PVC 150g',value:35},
                {'text':'Tyvek jaune fluo indéchirable 130g',value:20}
            ]
        },
        computed:{
            m2: function () {
                return (this.larger*this.hauter/10000).toFixed(2);
            },
            price: function () {
                if (this.m2<=0.3){
                    return (0.5*this.quantity*parseInt(this.materiels.price)*1.2).toFixed(2);
                }else {
                    return (this.quantity*this.m2*parseInt(this.materiels.price)*1.2).toFixed(2);
                }
            }
        }


    });

    vm.$watch('larger', function (val) {
        $('#s-larger').val(val);
    });
    vm.$watch('hauter', function (val) {
        $('#s-hauter').val(val);
    });
</script>