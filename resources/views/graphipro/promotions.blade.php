@inject('pros','App\Pro')
@foreach($pros::all() as $pro)
<div style="float:left; border:thin ridge #29ABE2; width:180px; height:286px; padding:10px; margin-left:5px; color:#666" >
    <center><div style=" width:130px; height:130px; overflow:hidden; border-radius:99em;"> <img src="/storage/uploads/{{$pro->product->productimg}}" height="130" /></div><br />
        <span style="font-size:18px; color:#29ABE2">{{$pro->product->name}}</span><br />
        <span style="font-size:12px; color:#666"> {!! $pro->des !!}</span>
    </center>

    <center>
        <div style="padding:8px; background-color:#29ABE2; border-radius:3px; width:80px; margin-top:5px;">
            <a href="{{url('/promotion/'.$pro->id)}}" style="color:#FFF; text-decoration:none;; font-size:14px;"  type="button">Commandez</a>
        </div>
    </center>
</div>
@endforeach