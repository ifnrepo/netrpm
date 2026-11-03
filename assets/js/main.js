$(document).ready(function(){

});

$("#tempat").on('change',function(){
    $("#tmbperiode").click();
})

$("#tmbperiode").click(function(){
    if($("#thnperiode").val()==''){
        pesan('Tahun periode harus di isi !');
        return false;
    }
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "main/addsession",
        data: {
            bln: $("#bulperiode").val(),
            thn: $("#thnperiode").val(),
            lok: $("#tempat").val()
        },
        success: function (data) {
            // alert(data);
            window.location.href = base_url+'main';
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        },
    });
})

$("#viewrpm").on('click',function(){
    $(this).html('Loading ...');
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "main/setmonitoring",
        data: {
            tempat: $("#tempatx").val(),
            grp: $("#grupx").val(),
            shift: $("#shiftx").val(),
            mesin: $("#mesinx").val(),
        },
        success: function (data) {
            window.location.href = base_url+'main#rpmtahunan';
            window.location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        },
    });
})
