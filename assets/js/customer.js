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
        url: base_url + "customer/addsession",
        data: {
            tipe: isi,
            page: $("#perpage-customer").val(),
            text: $("#textcaricustomer").val()
        },
        success: function (data) {
            // alert(data);
            window.location.href = base_url+'customer';
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            kode = thrownError;
        },
    });
});

$("#perpage-customer").on('change',function(){
    $("#select-tipe").change();
});

$("#btncaricustomer").click(function(){
    $("#select-tipe").change();
})

$('#textcaricustomer').on('keypress', function(e) {
    if (e.which == 13) {
		$("#btncaricustomer").click();
    }
});