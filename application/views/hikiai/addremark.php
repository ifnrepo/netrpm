<div class="container-xl">
    <div class="card p-1">
        <div class="card-body p-1">
            <input type="text" id="idremark" class="hilang" value="<?= $idrem ?>">
            <input type="text" id="idhik" class="hilang" value="<?= $idhik  ?>">
            <div id="addjaring" class="">
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Noted</label>
                    <div class="col">
                       <input type="text" name="teks" id="teks" class="form-control font-kecil text-uppercase" value="<?= $data['teks1'] ?>">
                    </div>
                </div>
                <div class="row my-1">
                    <label class="col-3 col-form-label">Remark</label>
                    <div class="col">
                        <textarea name="remark" id="remark" class="form-control font-kecil" rows="8"><?= $data['isi1'] ?></textarea>
                    </div>
                </div>
                <hr class="m-0">
                <div class="text-center mt-1">
                    <a href="#" class="btn btn-sm btn-success font-kecil" id="simpanremark"><span class="text-black">Simpan</span></a>
                    <a href="#" class="btn btn-sm btn-danger font-kecil" data-bs-dismiss="modal">Batal</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#simpanremark").click(function(){
        // if($("#teks").val()==''){
        //     alert('Noted harus di isi !');
        //     $("#teks").focus();
        //     return false;
        // }    
        // if($("#remark").val()==''){
        //     alert('Remark Harus di isi !');
        //     $("#remark").focus();
        //     return false;
        // }
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + "hikiai/simpanremarkhikiai",
            data: {
                idhik: $("#idhik").val(),
                idrem: $("#idremark").val(),
                rem: $("#teks").val(),
                teks: $("#remark").val(),
            },
            success: function (data) {
                window.location.href = base_url+'hikiai/edithikiai/'+$("#idhik").val();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            },
        });
    })
    // setTimeout(() => {
    //     if($("#jnnet").val()==1){
    //         $("#titlenet h3").html('JARING');
    //         $("#addother").addClass('hilang');
    //         $("#addjaring").removeClass('hilang');
    //         generatekode();
    //     }else{
    //         $("#titlenet h3").html('OTHER');
    //         $("#addother").removeClass('hilang');
    //         $("#addjaring").addClass('hilang');
    //         generatekodeoth();
    //     }
    // }, 300);
    // $("#knot-tipe").change(function(){
    //     generatekode();
    // })
    // $("#jenis-benang").change(function(){
    //     $.ajax({
    //         dataType: "json",
    //         type: "POST",
    //         url: base_url + "produk/getukuranbenang",
    //         data: {
    //             tipe: $(this).val(),
    //             isi: ''
    //         },
    //         success: function (data) {
    //             // alert(data);
    //             // window.location.href = base_url+'produk';
    //             $("#ukuran-benang").html(data.hasil).show();
    //         },
    //         error: function (xhr, ajaxOptions, thrownError) {
    //             console.log(xhr.status);
    //             console.log(thrownError);
    //         },
    //     });
    //     $("#ukuran-benang").val('');
    //     if($(this).val() != ''){
    //         $("#ukuran-benang").attr('disabled',false);
    //     }else{
    //         $("#ukuran-benang").attr('disabled',true);
    //     }
    //     generatekode();
    // })
    // $("#jenis-benang-oth").change(function(){
    //     $.ajax({
    //         dataType: "json",
    //         type: "POST",
    //         url: base_url + "produk/getukuranbenang",
    //         data: {
    //             tipe: $(this).val(),
    //         },
    //         success: function (data) {
    //             // alert(data);
    //             // window.location.href = base_url+'produk';
    //             $("#ukuran-benang-oth").html(data.hasil).show();
    //         },
    //         error: function (xhr, ajaxOptions, thrownError) {
    //             console.log(xhr.status);
    //             console.log(thrownError);
    //         },
    //     });
    //     $("#ukuran-benang-oth").val('');
    //     if($(this).val() != ''){
    //         $("#ukuran-benang-oth").attr('disabled',false);
    //     }else{
    //         $("#ukuran-benang-oth").attr('disabled',true);
    //     }
    //     generatekodeoth();
    // })
    // $("#ukuran-benang").change(function(){
    //     generatekode();
    // })
    // $("#ukuran-benang-oth").change(function(){
    //     generatekodeoth();
    // })
    // $("#meai").on('blur',function(){
    //     generatekode();
    // })
    // $("#sat-meai").change(function(){
    //     generatekode();
    // })
    // $("#md").on('blur',function(){
    //     generatekode();
    // })
    // $("#length").on('blur',function(){
    //     generatekode();
    // })
    // $("#sat-length").change(function(){
    //     generatekode();
    // })
    // $("#color").change(function(){
    //     generatekode();
    // })
    // $("#color-oth").change(function(){
    //     generatekodeoth();
    // })
    // $("#ways").change(function(){
    //     generatekode();
    // })
    // $("#prod-oth").on('blur',function(){
    //     generatekodeoth();
    // })
    // $("#tipe-oth").on('blur',function(){
    //     generatekodeoth();
    // })
    // $("#package-oth").on('blur',function(){
    //     generatekodeoth();
    // })
    // $("#ukuran-oth").on('blur',function(){
    //     generatekodeoth();
    // })
    // function generatekode(){
    //     var knot = '';
    //     var jnb = '';
    //     var ukr = '';
    //     var me = ''; var stme='';
    //     var md = ''; var len = ''; var stlen = '';
    //     var col = ''; var ways = '';
    //     var asal = $("#jnnet").val()==1 ? 'NET' : 'OTH';
    //     if($("#knot-tipe").val()!=''){
    //         knot = $("#knot-tipe").val();
    //     }
    //     if($("#jenis-benang").val()!=''){
    //         jnb = $("#jenis-benang").val();
    //     }
    //     if($("#ukuran-benang").val()!=''){
    //         var strukr = $("#ukuran-benang").val();
    //         ukr = strukr.replaceAll(' ','')+'-';
    //     }
    //     if($("#meai").val()!=''){
    //         var strmeai = $("#meai").val();
    //         me = strmeai.replaceAll(',','');
    //     }
    //     if($("#sat-meai").val()!=''){
    //         var strsatme = $("#sat-meai").val();
    //         stme = strsatme.toUpperCase();
    //     }
    //     if($("#md").val()!=''){
    //         var strmd = $("#md").val();
    //         md = strmd.replaceAll(',','')+'MD';
    //     }
    //     if($("#length").val()!=''){
    //         strlength = $("#length").val();
    //         len = strlength.replaceAll(',','');
    //     }
    //     if($("#sat-length").val()!=''){
    //         strsatlen = $("#sat-length").val();
    //         stlen = strsatlen.toUpperCase();
    //     }
    //     if($("#color").val()!=''){
    //         stcol = $("#color").val();
    //         col = stcol.replaceAll(' ','')
    //     }
    //     if($("#ways").val()!=''){
    //         ways = '-'+$("#ways").val();
    //     }
    //     var jadi = asal+knot+jnb+ukr+me+stme+md+len+stlen+ways+col;
    //     $("#kodenet h3").html(jadi);
    //     generatekodenet();
    // }
    // function generatekodeoth(){
    //     var knot = '';
    //     var jnb = '';
    //     var ukr = '';
    //     var me = ''; var stme='';
    //     var md = ''; var len = ''; var stlen = '';
    //     var col = ''; var ways = '';
    //     var oth = '';
    //     var asal = $("#jnnet").val()==1 ? 'NET' : 'OTH';
    //     var isiselect = $('#select-tipe option:selected').text();
    //     var prod = $("#kodeoth").val()=='' ? isiselect : $("#kodeoth").val();
    //     $("#prod-oth").val(isiselect);
    //     if($("#ukuran-oth").val()!=''){
    //         var strukr = $("#ukuran-oth").val();
    //         ukr = strukr.replaceAll(' ','').toUpperCase();
    //     }
    //     if($("#color-oth").val()!=''){
    //         stcol = '-'+$("#color-oth").val().trim();
    //         col = stcol.replaceAll(' ','');
    //     }
    //     if($("#tipe-oth").val()!=''){ 
    //         xme = '-'+$("#tipe-oth").val().trim().toUpperCase();
    //         me = xme.replaceAll(' ','');
    //     }
    //     if($("#package-oth").val()!=''){ 
    //         if($("#tipe-oth").val()==''){ 
    //             md = '-'+$("#package-oth").val().trim().toUpperCase();
    //         }else{
    //             md = $("#package-oth").val().trim().toUpperCase();
    //         }
    //     }
    //     if($("#prod-oth").val()!=''){
    //         var strprod = prod.replaceAll('._','');
    //         oth = strprod.replaceAll(' ','').toUpperCase();
    //     }
    //     var jadi = asal+oth+knot+jnb+ukr+me+stme+md+len+stlen+ways+col;
    //     $("#kodenet h3").html(jadi);
    //     generatekodeother();
    // }
    // $(".inputangka").on("change click keyup input paste", function (event) {
    //     $(this).val(function (index, value) {
    //         return value
    //             .replace(/(?!\.)\D/g, "")
    //             .replace(/(?<=\..*)\./g, "")
    //             .replace(/(?<=\.\d\d).*/g, "")
    //             .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    //     });
    // });
    // function generatekodenet(){
    //     var knot = '';
    //     var ukr = '';
    //     var meai = '';
    //     var stme = '';var tme = '';var tle = '';
    //     var md = '';
    //     var len = '';var strlen='';var lme = '';
    //     var col = '';var ways='';
    //     if($("#knot-tipe").val()!=''){
    //         knot = $("#knot-tipe option:selected").text();
    //     }
    //     if($("#ukuran-benang").val()!=''){
    //         var strukr = $("#ukuran-benang").val();
    //         ukr = strukr.replaceAll(' ','');
    //     }
    //     if($("#meai").val()!=''){
    //         var strmeai = $("#meai").val();
    //         meai = ' - '+strmeai.replaceAll(',','');
    //     }
    //     if($("#sat-meai").val()!=''){
    //         var strsatme = $("#sat-meai").val();
    //         stme = strsatme.toUpperCase();
    //         switch (stme) {
    //             // S,Q,M,I
    //             case 'S':
    //                 tme = 'MMSTR';
    //                 break;
    //             case 'Q':
    //                 tme = 'MMSQ';
    //                 break;
    //             case 'M':
    //                 tme = 'MM';
    //                 break;
    //             case 'I':
    //                 tme = '"';
    //                 break;
            
    //             default:
    //                 break;
    //         }
    //     }
    //     if($("#md").val()!=''){
    //         var strmd = $("#md").val();
    //         md = ' - '+strmd.replaceAll(',','')+'MD';
    //     }
    //     if($("#length").val()!=''){
    //         strlength = $("#length").val();
    //         len = ' X '+strlength.replaceAll(',','');
    //     }
    //     if($("#sat-length").val()!=''){
    //         strsatlen = $("#sat-length").val();
    //         strlen = strsatlen.toUpperCase();
    //         switch (strlen) {
    //             // M,Y,L
    //             case 'M':
    //                 tle = 'MTR';
    //                 break;
    //             case 'Y':
    //                 tle = 'YDS';
    //                 break;
    //             case 'L':
    //                 tle = 'ML';
    //                 break;
            
    //             default:
    //                 break;
    //         }
    //     }
    //     if($("#color").val()!=''){
    //         col = ' - '+$("#color").val();
    //     }
    //     if($("#ways").val()!=''){
    //         ways = ' '+$("#ways").val();
    //     }
    //     $("#speku").html(knot+' '+ukr+meai+tme+md+len+tle+col+ways);
    // }
    // function generatekodeother(){
    //     var knot = '';
    //     var jnb = '';
    //     var ukr = '';
    //     var me = ''; var stme='';
    //     var md = ''; var len = ''; var stlen = '';
    //     var col = ''; var ways = '';
    //     var oth = '';
    //     var asal = $("#jnnet").val()==1 ? 'NET' : 'OTH';
    //     var isiselect = $('#select-tipe option:selected').text();
    //     var prod = $("#kodeoth").val()=='' ? isiselect : $("#kodeoth").val();
    //     $("#prod-oth").val(isiselect);
    //     if($("#ukuran-oth").val()!=''){
    //         var strukr = $("#ukuran-oth").val();
    //         ukr = ' '+strukr.replaceAll(' ','').toUpperCase().trim();
    //     }
    //     if($("#tipe-oth").val()!=''){ 
    //         xme = $("#tipe-oth").val().trim().toUpperCase();
    //         me = ' ('+xme.replaceAll(' ','')+')';
    //     }
    //     if($("#package-oth").val()!=''){ 
    //          md = ' ('+$("#package-oth").val().trim().toUpperCase()+')';
    //     }
    //     if($("#color-oth").val()!=''){
    //         col = ' '+$("#color-oth").val().trim();
    //     }
    //     if($("#prod-oth").val()!=''){
    //         var strprod = prod.replaceAll('._','');
    //         oth = strprod.replaceAll(' ','').toUpperCase();
    //     }
    //     var jadi = prod+ukr+me+md+col;
    //     $("#speku").html(jadi);
    // }
    // $("#simpannet").click(function(){
    //     if($("#knot-tipe").val()==''){
    //         alert('Ikatan jaring harus di isi !');
    //         return false;
    //     }
    //     if($("#ukuran-benang").val()=='' || $("#ukuran-benang").val()=='0'){
    //         alert('Ukuran Benang jaring harus di isi !');
    //         return false;
    //     }
    //     if($("#meai").val()=='' || $("#meai").val()=='0'){
    //         alert('Meai harus di isi !');
    //         return false;
    //     }
    //     if($("#md").val()=='' || $("#md").val()=='0'){
    //         alert('Mesh Deep harus di isi !');
    //         return false;
    //     }
    //     if($("#length").val()=='' || $("#length").val()=='0'){
    //         alert('Panjang jaring harus di isi !');
    //         return false;
    //     }
    //     if($("#sat-length").val()==''){
    //         alert('Satuan Panjang jaring harus di isi !');
    //         return false;
    //     }
    //     if($("#color").val()==''){
    //         alert('Warna harus di isi !');
    //         return false;
    //     }
    //     if($("#ways").val()==''){
    //         alert('Ways harus di isi !');
    //         return false;
    //     }
    //     $.ajax({
    //         dataType: "json",
    //         type: "POST",
    //         url: base_url + "produk/simpanjala",
    //         data: {
    //             ctgrid : $("#select-tipe").val(),
    //             kode: $("#kodenet h3").html(),
    //             knot: $("#knot-tipe").val(),
    //             jenben: $("#jenis-benang").val(),
    //             ukrben: $("#ukuran-benang").val(),
    //             meai: $("#meai").val(),
    //             stmeai: $("#sat-meai option:selected").html(),
    //             mesh: $("#md").val(),
    //             len: $("#length").val(),
    //             satlen: $("#sat-length option:selected").html(),
    //             color: $("#color").val(),
    //             ways: $("#ways").val(),
    //             ket: $("#keterangan").val(),
    //             spek: $("#speku").html()
    //         },
    //         success: function (data) {
    //             alert('Berhasil disimpan !');
    //             window.location.reload();
    //         },
    //         error: function (xhr, ajaxOptions, thrownError) {
    //             console.log(xhr.status);
    //             console.log(thrownError);
    //         },
    //     });
    // })
    // $("#simpanoth").click(function(){
    //     if($("#prod-oth").val()==''){
    //         alert('Produk harus di isi !');
    //         return false;
    //     }
    //     if($("#ukuran-oth").val()=='' || $("#ukuran-oth").val()=='0'){
    //         alert('Ukuran harus di isi !');
    //         return false;
    //     }
    //     if($("#color-oth").val()==''){
    //         alert('Warna harus di isi !');
    //         return false;
    //     }
    //     $.ajax({
    //         dataType: "json",
    //         type: "POST",
    //         url: base_url + "produk/simpanother",
    //         data: {
    //             ctgrid : $("#select-tipe").val(),
    //             kode: $("#kodenet h3").html(),
    //             produk: $("#prod-oth").val(),
    //             ukrben: $("#ukuran-oth").val(),
    //             tipe: $("#tipe-oth").val(),
    //             pack: $("#package-oth").val(),
    //             color: $("#color-oth").val(),
    //             ket: $("#keterangan-oth").val(),
    //             spek: $("#speku").html()
    //         },
    //         success: function (data) {
    //             alert('Berhasil disimpan !');
    //             window.location.reload();
    //         },
    //         error: function (xhr, ajaxOptions, thrownError) {
    //             console.log(xhr.status);
    //             console.log(thrownError);
    //             alert('Data Produk Sudah Ada !');
    //         },
    //     });
    // })
</script>