/**
 * Created by YANTAO on 16/7/4.
 */

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
            getPrice(proid);
        }
    });

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
                html+='<td align="center" class="price '+val.price1==0?'not-allow':'' +'">';
                html+=val.price1==0?'':val.price1;
                html+='</td>';
                html+='<td align="center" class="price  ">';
                html+=val.price2==0?'':val.price2;
                html+='</td>';
                html+='<td align="center" class="price">';
                html+=val.price3==0?'':val.price3;
                html+='</td>';
                html+='</tr>';
            })
            $('#result').html(html);
        }
    });
}

$('#formate').change(function () {
    getPapier(proid);
});
$('#papier').change(function () {
    getPell(proid);
});
$('#imprimer').change(function () {
    getPell(proid)
})
$('#pelliculage').change(function () {
    getPrice(proid);

});
getPapier(proid);
getPell(proid);
