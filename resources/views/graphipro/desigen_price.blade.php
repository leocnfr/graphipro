<span>Création:</span>
<br>
<select id="design_price" name="jumpMenu" id="jumpMenu" style="width:220px;">
    <option value="0">Fournir par client</option>
    <option value="{{$product->design_price}}">+{{$product->design_price}}</option>
</select>
<br/>
Ficher fournir par client
<input type="file" name="file" id="uploadfile">
<script>
    $('#design_price').change(function () {
        if(!$('#design_price').val()==0)
        {
            $('#uploadfile').hide();
        }else {
            $('#uploadfile').show();

        }
        $('#s_design_price').val($('#design_price').val());
    })
</script>