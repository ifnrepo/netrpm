$(document).ready(function(){
    // alert('XXXX');
});
$("#select-tipe").on('change',function(){
    var isi = $(this).val();
    if(isi==''){
        $("#btntambahdata").addClass('disabled');
    }else{
        $("#btntambahdata").removeClass('disabled');
    }
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "produk/addsession",
        data: {
            tipe: isi,
        },
        success: function (data) {
            // alert(data);
            window.location.href = base_url+'produk';
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            kode = thrownError;
        },
    });
});

$("#perpage-produk").on('change',function(){
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "produk/addsession",
        data: {
            page: $(this).val() ,
        },
        success: function (data) {
            // alert(data);
            window.location.href = base_url+'produk';
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            kode = thrownError;
        },
    });
});

$("#btncariproduk").click(function(){
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "produk/addsession",
        data: {
            text: $("#textcariproduk").val() ,
        },
        success: function (data) {
            // alert(data);
            window.location.href = base_url+'produk';
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            kode = thrownError;
        },
    });
})

$('#textcariproduk').on('keypress', function(e) {
    if (e.which == 13) {
		$("#btncariproduk").click();
    }
});