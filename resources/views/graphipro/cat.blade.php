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
        width: 140px;
        margin:10px 0px 0px 23px;
        text-align: center;
        float: left;
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
    .product-item-info
    {
        position: absolute;
        display: none;
        z-index: 99;
        width: 380px;
        height: 210px;
        padding: 10px;
        border: thin ridge rgb(41, 171, 226);
        background-color: rgb(255, 255, 255)
    }
    .product-item-info > img
    {
        display: inline-block;
        float: left;
    }
    .product-info{
            float: right;
    }
</style>
<div class="cat" style=" width:1000px; margin:20px 0 auto;  color:#333; font-size:20px;  position:relative">
    @foreach($products->chunk(6) as $items)
    <div class="list">
        @foreach($items as $item)
            <div style="position: relative;float: left">
            <div class="product-item">
                <img src="/storage/uploads/{{$item->productimg}}" alt="" width="140" height="140">
                <span class="name">{{$item->name}}</span> <br>
                <span class="ex">100ex à partir de </span>
                <span class="price">10€</span>
                <span class="ht">HT</span>
            </div>
            <div class="product-item-info" >
                <img src="/storage/uploads/{{$item->productimg}}" alt="" width="200" height="200">
                <div class="product-info">
                    {{$item->name}}
                    @foreach($item->hasPro as $pro)
                        <span style="font-size:12px; color:#999">{{$pro->count}}
                            à partir de <span style="font-size:18px; color:#29ABE2">{{$pro->price}}</span>
                        </span>

                    @endforeach
                </div>
            </div>
            </div>
        @endforeach
    </div>
    @endforeach
</div>
<script>
    $('.product-item').hover(function () {
        $(this).next().show();
    },function () {
        $(this).next().hide();
    });
    $('.product-item-info').hover(function () {
        $(this).show();
    },function () {
        $(this).hide();
    })
</script>

