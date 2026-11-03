<div class="container-xl">
    <div class="card p-1">
        <div class="card-body p-1">
            <div id="addjaring" class="">
                <input type="text" class="hilang" name="iddethik" id="iddethik" value="<?= $data['id'] ?>">
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Nama Produk</label>
                    <div class="col">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control font-kecil" id="textcariproduk" placeholder="Cari data.." value="<?= $data['spesifikasi'] ?>">
                            <button class="btn btn-success font-kecil hilang" id="btncariproduk" type="button">Cari !</button>
                            <button class="btn btn-danger font-kecil" id="btnhapusproduk" type="button">Hapus !</button>
                        </div>
                        <small class="form-hint mt-0 text-azure ms-1" id="kodeproduk"><?= $data['nama_kategori'] ?></small>
                        <input type="text" class="hilang" name="idproduk" id="idproduk" value="<?= $data['id_produk'] ?>">
                    </div>
                </div>
                <div class="row mt-1 hilang" id="divcariproduk">
                    <div class="col">
                        <table id="tabelnya" class="table table-hover table-bordered cell-border mt-0" style="width: 100% !important; border-collapse: collapse;"> <!-- table order-column table-hover table-bordered cell-border -->
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Supplier</th>
                                    <th>Alamat</th>
                                    <th>Act</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody" id="body-table-prodhik" style="font-size: 13px !important; width: 100% !important;">
                                <tr>
                                    <td>#1</td>
                                    <td class="font-kecil line-11"><span class="text-pink font-10">CSS1234568</span><br>Nama Supplier</td>
                                    <td class="font-kecil">Alamat Supplier</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-success p-0 btn-flat font-kecil">Pilih</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Pcs</label>
                    <div class="col">
                       <input type="text" name="pcs" id="pcs" value="<?= rupiah($data['pcs'],0) ?>" class="form-control font-kecil inputangka text-end">
                    </div>
                </div>
                
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Kgs</label>
                    <div class="col">
                       <input type="text" name="kgs" id="kgs" value="<?= rupiah($data['kgs'],2) ?>" class="form-control font-kecil inputangka text-end">
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Satuan</label>
                    <div class="col">
                       <select name="satuan" id="satuan" class="form-control font-kecil">
                        <option value="">-- Pilih Satuan --</option>
                        <?php foreach($satuan->result_array() as $sat): $selek = $data['id_satuan']==$sat['id'] ? 'selected' : ''; ?>
                            <option value="<?= $sat['id'] ?>" <?= $selek ?>><?= $sat['kodesatuan'].'-'.$sat['namasatuan'] ?></option>
                        <?php endforeach; ?>
                       </select>
                    </div>
                </div>
                <div class="row my-1">
                    <label class="col-3 col-form-label">Keterangan</label>
                    <div class="col">
                        <textarea name="keterangan" id="keterangan" class="form-control font-kecil"><?= $data['keterangan'] ?></textarea>
                    </div>
                </div>
                <hr class="m-0">
                <div class="text-center mt-1">
                    <a href="#" class="btn btn-sm btn-success font-kecil" id="updatehikiaidetail"><span class="text-black">Simpan</span></a>
                    <a href="#" class="btn btn-sm btn-danger font-kecil" data-bs-dismiss="modal">Batal</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // $(document).ready(function(){
        // new TomSelect("#color",{
        //     allowEmptyOption: true
        // });
    // })
    let idleTimer;
    const maxIdleTime = 500;
    $(document).on('keyup','#textcariproduk',function(){
        clearTimeout(idleTimer);
        idleTimer = setTimeout(caribarang(), maxIdleTime);
    })
    function caribarang(){
        var kata = $("#textcariproduk").val();
        if(kata.trim()!=''){
            $("#divcariproduk").addClass('hilang');
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url + "hikiai/getdataproduk",
                data: {
                    isi: kata
                },
                success: function (data) {
                    // alert(data);
                    // window.location.href = base_url+'produk';
                    if(data.jml != 0){
                        $("#divcariproduk").removeClass('hilang');
                        $("#body-table-prodhik").html(data.data).show();
                    }else{
                        alert('Data tidak ditemukan');
                    }
                    // $("#ukuran-benang").html(data.hasil).show();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        }else{
            $("#divcariproduk").addClass('hilang');
        }
    }
    $(document).on('click','#pilihproduk',function(){
        var tis = $(this).attr('rel');
        var rel2 = $(this).attr('rel2');
        var rel3 = $(this).attr('rel3');
        $("#idproduk").val(tis);
        $("#textcariproduk").val(rel2);
        $("#kodeproduk").html(rel3);
        $("#btncariproduk").addClass('hilang');
        $("#btnhapusproduk").removeClass('hilang');
        $("#divcariproduk").addClass('hilang');
    })
    $("#btnhapusproduk").click(function(){
        $("#idproduk").val('');
        $("#textcariproduk").val('');
        $("#kodeproduk").html('');
        $("#btncariproduk").addClass('hilang');
        $("#btnhapusproduk").addClass('hilang');
        $("#textcariproduk").focus();
    })
    $("#updatehikiaidetail").click(function(){
        if($("#idproduk").val()==''){
            alert('Produk harus di isi !');
            return false;
        }
        if($("#pcs").val()=='' || $("#pcs").val()=='0' || $("#pcs").val()=='-'){
            alert('Jumlah PCS harus di isi !');
            return false;
        }
        if($("#kgs").val()=='' || $("#kgs").val()=='0' || $("#kgs").val()=='-'){
            alert('Jumlah KGS harus di isi !');
            return false;
        }
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + "hikiai/updatedetailhikiai",
            data: {
                id:$("#iddethik").val(),
                idprod: $("#idproduk").val(),
                pcs: $("#pcs").val(),
                kgs: $("#kgs").val(),
                kete: $("#keterangan").val(),
                sat: $("#satuan").val()
            },
            success: function (data) {
                alert('Berhasil disimpan !');
                window.location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            },
        });
    })

    //  End Query
    // $("#textcariproduk").change(function(){
    //     console.log($(this).val());
    //     // setTimeout(() => {
    //     //     alert('Cari');
    //     // }, 500);
    // })
    $("#btncaricustomer").click(function(){
        $("#textcariproduk").addClass('hilang');
        var str = $("#textcaricustomer").val();
        var lebar = str.trim().length;
        var kata = str.trim();
        if(lebar < 4){
            alert('Minimal 4 huruf dalam pencarian kata !');
        }else{
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url + "hikiai/getdatacustomer",
                data: {
                    isi: kata
                },
                success: function (data) {
                    // alert(data);
                    // window.location.href = base_url+'produk';
                    if(data.jml != 0){
                        $("#divcaricustomer").removeClass('hilang');
                        $("#body-table-cust").html(data.data).show();
                    }else{
                        alert('Data tidak ditemukan');
                    }
                    // $("#ukuran-benang").html(data.hasil).show();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        }
    })
    $('#textcaricustomer').on('keypress', function(e) {
        if (e.which == 13) {
            $("#btncaricustomer").click();
        }
    });
    $(document).on('click','#pilihcustomer',function(){
        var tis = $(this).attr('rel');
        var rel2 = $(this).attr('rel2');
        var rel3 = $(this).attr('rel3');
        $("#idcustomer").val(tis);
        $("#textcaricustomer").val(rel2);
        $("#alamatcustomer").html(rel3);
        $("#btncaricustomer").addClass('hilang');
        $("#btnhapuscustomer").removeClass('hilang');
        $("#divcaricustomer").addClass('hilang');
    })
    $("#simpanhikiaihead").click(function(){
        if($("#kode").val()==''){
            alert('Kode Hikiai Harus di isi !');
            return false;
        }
        alert('XX');
        if($("#nomor").val()==''){
            alert('Nomor Hikiai Harus di isi !');
            return false;
        }
        if($("#tgl_hikiai").val()==''){
            alert('Tanggal Hikiai Harus di isi !');
            return false;
        }
        if($("#idcustomer").val()==''){
            alert('Customer Harus di isi !');
            return false;
        }
        if($("#kepada").val()==''){
            alert('Kepada Harus di isi !');
            return false;
        }
        if($("#perihal").val()==''){
            alert('Perihal Harus di isi !');
            return false;
        }
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + "hikiai/simpanhikiai",
            data: {
                exdo: $("#select-tipe").val(),
                kode: $("#kode").val(),
                nomor: $("#nomor").val(),
                tgl: $("#tgl_hikiai").val(),
                idc: $("#idcustomer").val(),
                peri: $("#perihal").val(),
                kepa: $("#kepada").val(),
                kete: $("#keterangan").val()
            },
            success: function (data) {
                window.location.href = base_url+'hikiai';
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
    $(".inputangka").on("change click keyup input paste", function (event) {
        $(this).val(function (index, value) {
            return value
                .replace(/(?!\.)\D/g, "")
                .replace(/(?<=\..*)\./g, "")
                .replace(/(?<=\.\d\d).*/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
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