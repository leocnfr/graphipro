<style>
    .cat{
        width:1000px; margin:20px 0 auto;  color:#333; font-size:20px;  position:relative
    }
    .list{
        width: 1000px;
        margin: 0px auto;
    }
    .product-item
    {
        margin:10px 0px 0px 23px;
        text-align: center;
        float: left;
        cursor: pointer;
    }
    .product-item>img
    {
        display: block;
    }
    .product-item >span.name{
        font-size:14px;
    }
    .product-item >span.ex,.product-item >span.ht{
        font-size:12px;
    }
    .product-item >span.price{
        font-size:18px;
        color: #29ABE2;
    }
    .product-item >span.ex{
     color:#999
    }

    .product-item-info > img
    {
        display: inline-block;
        float: left;
    }
    .command-div
    {
        width: 140px;
        height: 140px;
        position:absolute;
        display: none;
        background: rgba(0,0,0,0.6);
        cursor: pointer;
        top: 10px;
        text-align: center;
    }
    .product-table
    {
        position: relative;float: left
    }
    .list:nth-child(n+3)
    {
        display: none;
    }
</style>
<div class="cat" style=" width:1000px; margin:20px 0 auto;  color:#333; font-size:20px;  position:relative">
    @foreach($products->chunk(6) as $items)
    <div class="list">
        @foreach($items as $key=>$item)
            <div class="product-table">
                <div class="product-item">
                    <center>
                    <img src="/storage/uploads/{{$item->productimg}}" alt="" width="140" height="140" class="product-item-img">
                    <div class="command-div">
                        <a href="{{url('/product/'.str_slug($item->name))}}" style="font-size: 12px;color: white;top: 50%;position: relative;padding: 3px;border: 1px solid white">Commande</a>
                    </div>
                    <span class="name">{{$item->name}}</span> <br>
                    <span class="ex">{{$item->minCount($item->id)}} ex à partir de</span>
                    <span class="price">{{$item->minPrice($item->id)}}€</span>
                    <span class="ht">HT</span>
                    </center>
                </div>

            </div>
        @endforeach
    </div>
    @endforeach
</div>
<script>
    $('.product-item-img').hover(function () {
        $(this).next().show();
    },function () {
        $(this).next().hide();
    });
    $('.command-div').hover(function () {
        $(this).show();
    },function () {
        $(this).hide();
    });

</script>

