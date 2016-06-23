<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Graphipro-imprimerie en ligne</title>
    <script src="http://www.greensock.com/js/src/TweenMax.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script src="/js/js.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script type="text/javascript" src="/js/power-slider.js"></script>

</head>
<body>
@include('graphipro.head')
@yield('content')
@include('graphipro.foot')
<script>
    $(function(){
        $("#slider").powerSlider({handle:"fadeTo"});
        //$("#text").powerSlider();
        //$("#img").powerSlider({picNum:4,handle:"hide"});
        $(".code h3 span").each(function(i){
            $(this).click(function(){
                $(this).addClass("active").siblings().removeClass("active");
                $(".code pre").eq(i).show().siblings("pre").hide();
            })
        })
    });
</script>
</body>
</html>