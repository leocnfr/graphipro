<span>Création:</span>
<br>
<select id="design_price" name="jumpMenu" id="jumpMenu" style="width:220px;">
    <option value="0">Fournir par client</option>
    <option value="{{$product->design_price}}">+{{$product->design_price}}</option>
</select>
<br/>
<div  id="uploadfile">
    Ficher fournir par client
    <input type="file" name="file" required>
</div>

<script>
    $('#design_price').change(function () {
        if($('#design_price').val()==0)
        {
            $('#uploadfile').css("visibility", "visible");
        }else {
            $('#uploadfile').css("visibility", "hidden");
        }
        $('#s_design_price').val($('#design_price').val());
    })
</script>