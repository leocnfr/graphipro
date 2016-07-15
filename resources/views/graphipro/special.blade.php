<table width="500" border="0" style="padding-left: 40px;padding-top: 30px">
    <tr>
        <td valign="top" width="450">
            <div style="font-size:20px; color:#29ABE2; margin-top:20px;">1. Choisir les options d'impression</div><br />
            <div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2; line-height:35px; color:#29ABE2">
                Formate:
                <select name="formate" id="formate" v-model="selected">
                    @foreach($product->hasSpec as $spec)
                        <option value="{{$spec->price}}">{{$spec->size}}</option>
                    @endforeach
                </select>
                <br/>
                <span>Quantité:</span>
                <input size="10" maxlength="10" id="quantity" type="number" min="1" value="1" v-model="quantity"/> EX
                <br/>
               @include('graphipro.desigen_price')
                <br/>
            </div>
            <div style="font-size:20px; color:#29ABE2; margin-top:20px;">2. Option de livraison</div><br />
            <div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2;">
                Choix le moyen de livraison:
                <select name="jumpMenu" id="jumpMenu" style="width:220px;">
                    <option>Récupérer au bureau Graphipro</option>
                    <option>Livraison chez vous J+3</option>
                    <option>Livraison chez vous par UPS J+2</option>
                </select>
            </div>
        </td>
    </tr>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.js"></script>
<script>
   new Vue({
      el:'body',
       data:{
           quantity:1

       },
       created(){
           this.getPrice()
       },
       methods:{
           getPrice:function () {
                var f_price=$('#formate').val();
                this.price=(this.quantity*f_price*1.2).toFixed(2)
           }
       }
   });
</script>