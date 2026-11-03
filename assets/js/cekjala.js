$(document).ready(function(){
    var url = window.location.href;
	var pisah = url.split("/");
	// alert(pisah[5]);
	if (pisah[2] == "localhost") {
		if (pisah[5] == "editrpm") {
			const piker = new TomSelect("#rusak-tags",{
                create: true,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                closeAfterSelect: true
            });
            // if($("#baru").val()==''){
            //     $("#tandalot").click();
            // }
		}else{
            const picker = new Litepicker({
                element: $('.tgl')[0], // Extract the raw DOM element from jQuery object
                // singleMode: false,
                numberOfMonths: 1,
                numberOfColumns: 1,
                format: 'DD-MM-YYYY',
                buttonText: {
                        previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                            nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                        },
            });
        }
	} else {
        if (pisah[5] == "editrpm") {
            const piker = new TomSelect("#rusak-tags",{
                create: true,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                closeAfterSelect: true
            });
            // if($("#baru").val()==''){
            //     $("#tandalot").click();
            // }
		}else{
            const picker = new Litepicker({
                element: $('.tgl')[0], // Extract the raw DOM element from jQuery object
                // singleMode: false,
                numberOfMonths: 1,
                numberOfColumns: 1,
                format: 'DD-MM-YYYY',
                buttonText: {
                        previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                            nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                        },
            });
        }
	}

    // $("#tandalot").click();
});

// $("#reseteditdata").click(function(){
//     window.location.reload();
// })

// $("#tgl").on('blur',function(){
//     // alert('XXX');
//     $("#cekcek").click();
// })
$("#cekcek").click(function(){
    $(this).html('Loading..');
    if($("#mach_no").val()==''){
        pesan('Mesin harus dipilih terlebih dahulu','info');
        $("#cekpot").html('Apply');
        return false;
    }
    if($("#shiftkerja").val()==''){
        pesan('Shift Kerja harus dipilih terlebih dahulu','info');
        return false;
    }
    if(cekTanggal($("#tgl").val())=='0'){
        pesan('Tanggal harus lebih kecil dari tanggal sekarang','info');
        $("#cekpot").html('Apply');
        return false;
    }
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "cekjala/addsession",
        data: {
            msn: $("#mach_no").val(),
            shift: $("#shiftkerja").val(),
            tgl: $("#tgl").val(),   
        },
        success: function (data) {
            // alert(data);
            window.location.href = base_url+'cekjala';
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            kode = thrownError;
        },
    });
})

$('#caricek').on('keypress', function(e) {
    if (e.which == 13) {
		$("#butcaricek").click();
    }
});
$("#butcaricek").on('click',function(){
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "cekjala/caricek",
        data: {
            kata: $("#caricek").val(),
        },
        success: function (data) {
            // alert(data);
            window.location.href = base_url+'cekjala';
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            kode = thrownError;
        },
    });
});
$("#buttonrepcek").on('click',function(){
    $.ajax({
        dataType: "json",
        type: "POST",
        url: base_url + "cekjala/repaddsession",
        data: {
            tgl: $("#tanggalrepcek").val(),
            msn: $("#msncek").val(),
        },
        success: function (data) {
            // alert(data);
            window.location.href = base_url+'cekjala/repcek';
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            kode = thrownError;
        },
    });
});
// $("#tandalot").click(function(){
//     $("#loadlot").removeClass('hilang');
//     if($('#tandalot').is(':checked')){
//         // alert('Ceklis'); 
//         setTimeout(() => {
//             if($("#po").val()==''){
//                 $('#tandalot').attr('checked',false); 
//                 pesan('Pilih PO / Instruksi terlebih dahulu !','error');
//             }else{
//                 $.ajax({
//                     dataType: "json",
//                     type: "POST",
//                     url: base_url + "rpm/getnomorlot",
//                     data: {
//                         po: $("#po").val(),
//                         item: $("#item").val(),
//                         dis: $("#dis").val(),
//                         ins: $("#insno").val(),
//                     },
//                     success: function (data) {
//                         // alert(data);
//                         $("#kolomnomorlot").removeClass('hilang');
//                         $("#nomor_lot").html(data.data).show();
//                         $("#nomor_lot").val(data.lotnya);
//                         $("#loadlot").addClass('hilang');
//                         // window.location.href = base_url+'hikiai';
//                     },
//                     error: function (xhr, ajaxOptions, thrownError) {
//                         console.log(xhr.status);
//                         console.log(thrownError);
//                         kode = thrownError;
//                     },
//                 });
//             }
//         }, 300);
        
//     }else{
//         $("#kolomnomorlot").val('');
//         $("#nomor_lot").val('');
//         $("#kolomnomorlot").addClass('hilang');
//         $("#loadlot").addClass('hilang');   
//         // alert('Tak Ceklis');    
//     }
// })
// $("#gantipo").click(function(){
//     $('#tandalot').attr('checked',false); 
//     $("#kolomnomorlot").addClass('hilang');
// })

// $("#simpanrpm").click(function(){
//     if($("#po").val()==''){
//         pesan('PO Harus di isi !','info');
//         return false;
//     }
//     $("#formeditrpm").submit();
// })
