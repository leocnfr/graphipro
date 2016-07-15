<table width="500" border="0" style="padding-left: 40px;padding-top: 30px">
    <form action="{{url('/panier')}}" method="post" id="panier-form" enctype="multipart/form-data">
        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
        <input type="hidden" id="price" name="price" >
        <input type="hidden" name="formate" id="text_formate">
    <tr>
        <td valign="top" width="450">
            <div style="font-size:20px; color:#29ABE2; margin-top:20px;">1. Choisir les options d'impression</div><br />
            <div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2; line-height:35px; color:#29ABE2">
                Formate:
                <select  id="formate" >
                    @foreach($product->hasSpec as $spec)
                        <option value="{{$spec->price}}" >{{$spec->size}}</option>
                    @endforeach
                </select>
                <br/>
                <span>Quantité:</span>
                <input size="10" maxlength="10" id="quantity" type="number" min="1" value="1" v-model="quantity" name="ex"/> EX
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
    </form>
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
                var price=$('#price');
                var text=$('#price:option:selected').text();
               this.price=(this.quantity*f_price*1.2).toFixed(2)
                price.val(this.price);
               $('#text_formate').val(text);
           }
       }
   });
   var quantity=$('#quantity').val();
   var showprice=$('#showprice');
   var formate=$('#formate').val();
   var price=$('#price');
    $('#formate').change(function () {
        formate=$('#formate').val();
        showprice.html((quantity*formate*1.2).toFixed());
        price.val((quantity*formate*1.2).toFixed())
        var text=$('#price:option:selected').text();
        $('#text_formate').val(text);

    });
    $('#quantity').change(function () {
        quantity=$('#quantity').val();
        showprice.html((quantity*formate*1.2).toFixed())
        price.val((quantity*formate*1.2).toFixed())

    });
</script>