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
        }
    });

}
$('#formate').change(function () {
    getPapier(proid);
});
getPapier(proid);