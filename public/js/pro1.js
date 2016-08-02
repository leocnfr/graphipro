/**
 * Created by YANTAO on 16/7/4.
 */
function isIE(){ //ie?
    if (window.navigator.userAgent.toLowerCase().indexOf("msie")>=1)
        return true;
    else
        return false;
}

if(!isIE()){ //firefox innerText define
    HTMLElement.prototype.__defineGetter__(     "innerText",
        function(){
            var anyString = "";
            var childS = this.childNodes;
            for(var i=0; i<childS.length; i++) {
                if(childS[i].nodeType==1)
                    anyString += childS[i].tagName=="BR" ? '\n' : childS[i].innerText;
                else if(childS[i].nodeType==3)
                    anyString += childS[i].nodeValue;
            }
            return anyString;
        }
    );
    HTMLElement.prototype.__defineSetter__(     "innerText",
        function(sText){
            this.textContent=sText;
        }
    );
}
function getPapier(proid) {
    var format=$('#formate').val();
    $.ajax({
        type: "get",
        url: "/papier",
        data: {
            format : format,
            proid : proid
        },
        success: function (res) {
            $('#papier').html(res);
            getImprimer(proid);
        }
    });

}
function getImprimer(proid) {
    var format=$('#formate').val();
    var papier=$('#papier').val();
    $.ajax({
        type:"get",
        url: "/imprimer",
        data:{
            format : format,
            proid : proid,
            papier:papier,
        },
        success:function (res) {
            $('#imprimer').html(res);
            getPell(proid);
        }
    })
}
function getPell(proid) {
    var format=$('#formate').val();
    var papier=$('#papier').val();
    var imprimer=$('#imprimer').val();
    $.ajax({
        type: "get",
        url: "/pelliculage",
        data: {
            format : format,
            proid : proid,
            papier:papier,
            imprimer:imprimer
        },
        success: function (res) {
            if (res!='notshow')
            {
                $('#pelliculage').html(res);
                $('#pel').show();
            }else {
                $('#pel').hide();
            }
            getPrice(proid);
        }
    });
}

function getPrice(proid) {
    var format=$('#formate').val();
    var papier=$('#papier').val();
    var imprimer=$('#imprimer').val();
    var pelliculage=$('#pelliculage').val();
    $.ajax({
        type: "get",
        url: "/price",
        dataType: "json",
        data: {
            format : format,
            proid : proid,
            papier:papier,
            imprimer:imprimer,
            pelliculage:pelliculage
        },
        success: function (res) {
            $('#day1').html(res.times.time1);
            $('#day2').html(res.times.time2);
            $('#day3').html(res.times.time3);
            var html='';
            $.each(res.prices,function (key,val) {
                html+='<tr>';
                html+='<td height="30" width="35" align="right" class="count">';
                html+=val.count+'ex';
                html+='</td>';
                if (val.price1==0)
                {
                    html+='<td align="center" class="price not-allow ">';
                }else {
                    html+='<td align="center" class="price  ">';
                }
                html+=val.price1==0?'':val.price1;
                html+='</td>';
                if (val.price2==0)
                {
                    html+='<td align="center" class="price not-allow ">';
                }else {
                    html+='<td align="center" class="price  ">';
                }                html+=val.price2==0?'':val.price2;
                html+='</td>';
                if (val.price3==0)
                {
                    html+='<td align="center" class="price not-allow ">';
                }else {
                    html+='<td align="center" class="price  ">';
                }                html+=val.price3==0?'':val.price3;
                html+='</td>';
                html+='</tr>';
            });
            $('#result').html(html);

            $(".price").on('click',function(event){
                if (isNaN(parseInt(event.target.innerText)))
                {
                    return false;
                }else
                {
                    showPrice(event);
                }
            });
        }
    });
}

$('#formate').change(function () {
    getPapier(proid);
});
$('#papier').change(function () {
    getImprimer(proid);
});
$('#imprimer').change(function () {
    getPell(proid)
});
$('#pelliculage').change(function () {
    getPrice(proid);
});

getPapier(proid);

function showPrice(event) {
    $(".choosed").each(function(){
        $(".choosed").removeClass('choosed');
    });
    $(event.target).toggleClass("choosed");
    var price = (parseInt(event.target.innerText)*1.2).toFixed(2);
    $("#showprice").html(price);
    $("#price").val(price);
    var tdSeq = $(event.target).parent().find("td").index($(event.target)[0]);
    var trSeq = $(event.target).parent().parent().find("tr").index($(event.target).parent()[0]);
    ex=$(event.target).parent().find("td:first-child").text();
    day=$("#day"+tdSeq).text();
    $('#ex').val(parseInt(ex));
    $('#day').val(day);
}

