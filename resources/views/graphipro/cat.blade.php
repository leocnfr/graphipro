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

    }
</style>
<div class="cat" style=" width:1000px; margin:20px 0 auto;  color:#333; font-size:20px;  position:relative">
    @foreach($products->chunk(6) as $items)
    <div class="list">
        @foreach($items as $item)
        <div class="product-item">
            <img src="/storage/uploads/{{$item->procutimg}}" alt="" width="140" height="140">
            <span class="name">{{$item->name}}</span> <br>
            <span class="ex">100ex à partir de </span>
            <span class="price">10€</span>
            <span class="ht">HT</span>
        </div>
        @endforeach
    </div>
    @endforeach
</div>


