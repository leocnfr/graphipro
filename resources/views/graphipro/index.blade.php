@extends('graphipro.template')
@section('content')
<div style="width:100%; height:350px; background:url(/images/bg.png)">

    <!--img-->
    <div class="content">
        <div class="slider" id="slider">
            <ul class="sliderbox">
                <li>
                    <a href="#"><img src="/images/1.jpg" ></a>
                </li>
                <li>
                    <a href="#"><img src="/images/2.jpg" ></a>
                </li>

            </ul>
            <ul class="slidernav"></ul>
        </div>
    </div>
    <!--img-->
</div>
<div style=" width:1000px; margin:0 auto;">
    <div style="font-size:25px; color:#FFF; padding:5px; background-color:#29ABE2; width:990px; margin-top:20px; position:relative; "><img src="/images/cat.png" height="20" /> CATEGORIES
        <div id="show-product" style="float:right; margin-right:15px; border:thin ridge #FFF; padding:5px; color:#FFF; cursor:pointer; font-size:15px; border-radius:3px;">Tous</div>
    </div>
</div>
@endsection