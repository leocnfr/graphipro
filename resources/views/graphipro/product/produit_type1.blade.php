<style>
    .price
    {
        background: #F2F2F2;
        cursor: pointer;
    }
    .not-allow
    {
        cursor: not-allowed;
    }
    .choosed
    {
     background-color: #29ABE2;
    }
</style>
<table width="1000" border="0">
    <div id="loading" style="display: block">
        @include('graphipro.loading')
    </div>
    <tr>
        <form action="{{url('/panier')}}" method="post" id="panier-form" enctype="multipart/form-data">
            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
            <input type="hidden" id="price" name="price">
            <input type="hidden" id="day" name="day">
            <input type="hidden" id="ex" name="ex">
        <td valign="top" width="450">
            <div style="font-size:20px; color:#29ABE2; margin-top:20px;">1. Choisir les options d'impression</div>
            <br/>
            <div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2; line-height:20px;color:#29ABE2">
                Format: <br>
                <input id="name" value="" type="hidden"/>
                <select id="formate" style="width:220px;" name="formate">
                    @inject('formate','App\Format')
                    @foreach($formats as $format)
                        <option value="{{$format}}">{{$formate->showOne($format)->format}}</option>
                    @endforeach
                </select>
                <br/>
                <span>Papier:</span>
                <br/>
                <select id="papier" style="width:220px;" name="papier">
                </select>
                <br/>


                <span>Imprimer:</span><br>

                <select id="imprimer" style="width:220px;" name="imprimer">
                    <option value="1">Rect</option>
                    <option value="2">Rect et verso</option>
                </select>
                <div id="pel" style="display: none">
                    <span>Pelliculage:</span>
                    <br/>
                    <select id="pelliculage" style="width:220px;" name="pelliculage" required>
                    </select>
                </div>
                @include('graphipro.desigen_price')
            </div>

            @include('graphipro.product.livraison')


        </td>
        <td valign="top" style="padding-left:30px">
            <div style="width:600px; margin-top:15px; float:left; ">

                <div style="font-size:20px; color:#29ABE2; ">3. Choisir un délais</div>
                <br/>

                <table width="460" border="0" style="margin-top:10px; margin-left:42px; ">
                    <tr>

                        <td align="right">
                            <div style="border:thin ridge #29ABE2; border-radius:3px; padding:10px; font-size:13px; width:125px; height:20px; position:relative; color:#666">
                                <div style="position:absolute; width:147px; height:20px; background-color:#29ABE2; top:-18px; left:-1px;"></div>
                                <center><span id="day1"></span><br/>
                            </div>
                        </td>
                        <td align="right">
                            <div style="border:thin ridge #29ABE2; border-radius:3px; padding:10px; font-size:13px; width:125px; height:20px; position:relative;  color:#666">
                                <div style="position:absolute; width:147px; height:20px; background-color:#29ABE2; top:-18px; left:-1px;"></div>
                                <center><span id="day2"></span><br/>
                            </div>
                        </td>
                        <td align="right">
                            <div style="border:thin ridge #29ABE2; border-radius:3px; padding:10px; font-size:13px; width:125px; height:20px; position:relative;   color:#666">
                                <div style="position:absolute; width:147px; height:20px; background-color:#29ABE2; top:-18px; left:-1px;"></div>
                                <center><span id="day3"></span><br/>
                            </div>
                        </td>
                    </tr>
                </table>
                <table id="table" width="500" border="0" style=" color:#666 ">
                    <tbody id="result">

                    </tbody>
                </table>
            </div>
        </td>
    </tr>
    </form>
</table>
<script type="text/javascript">
    var proid=<?php echo $product->id?>;
    jQuery(document).ajaxStart(function(){
        $('#loading').show();
        console.log('start');
    }).ajaxStop(function () {
        $('#loading').hide();
        console.log('stop');

    });

</script>
<script src="/js/pro1.js"></script>