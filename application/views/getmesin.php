<div class="container-xl">
    <div class="card p-1">
        <div class="card-body p-1">
            <div class="row mt-1">
                <input type="text" id="formname" class="hilang" name="formname" value="<?= $formname ?>">
                <label class="col-3 col-form-label">No Mesin</label>
                <div class="col">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control font-kecil" id="textcarimesin" placeholder="Cari data.." value="">
                        <button class="btn btn-success font-kecil " id="btncarimesin" type="button">Cari !</button>
                        <button class="btn btn-danger font-kecil hilang" id="btnhapusmesin" type="button">Hapus !</button>
                    </div>
                    <!-- <small class="form-hint mt-0 text-azure ms-1" id="kodeproduk"></small>
                    <input type="text" class="hilang" name="idproduk" id="idproduk" value=""> -->
                </div>
                <hr class="m-0">
                <div style="min-height: 350px;">
                    <div class="row mt-1 hilang" id="divcarimesin">
                        <div class="col">
                            <table id="tabelnya" class="table table-hover table-bordered cell-border mt-0" style="width: 100% !important; border-collapse: collapse;"> <!-- table order-column table-hover table-bordered cell-border -->
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Mesin</th>
                                        <th>Spesifikasi</th>
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
                </div>
            </div>
            <hr class="m-0">
            <div class="text-end mt-1">
                <button href="#" class="btn btn-sm btn-primary font-kecil" id="keluarform" data-bs-dismiss="modal">Batal / Keluar</button>
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
    $(document).on('keyup','#textcarimesin',function(){
        clearTimeout(idleTimer);
        idleTimer = setTimeout(caribarang(), maxIdleTime);
    });
    function caribarang(){
        var kata = $("#textcarimesin").val();
        if(kata.trim()!=''){
            // alert('XX');
            $("#divcarimesin").addClass('hilang');
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url + "rpm/getdatamesin",
                data: {
                    isi: kata
                },
                success: function (data) {
                    if(data.jml != 0){
                        $("#divcarimesin").removeClass('hilang');
                        $("#body-table-prodhik").html(data.data).show();
                    }else{
                        alert('Data tidak ditemukan');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        }else{
            $("#divcarimesin").addClass('hilang');
        }
    }
    $(document).on('click','#pilihmesin',function(){
        var tis = $(this).attr('rel');
        var rel2 = $(this).attr('rel2');
        var rel3 = $(this).attr('rel3');
        $("#mach_no").val(rel2);
        $("#ketmesin").val(rel3);
        var formname = $("#formname").val();
        if(formname==''){
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url + "rpm/addsession",
                data: {
                    msn: rel2,
                    shift: $("#shiftkerja").val(),
                    tgl: $("#tgl").val(),
                    grp: $("#grupkerja").val()
                },
                success: function (data) {
                    // $("#keluarform").click();
                    window.location.href = base_url + 'rpm';
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        }else if(formname=='potjala'){
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url + "potjala/addsession",
                data: {
                    msn: rel2,
                    shift: $("#shiftkerja").val(),
                    tgl: $("#tgl").val()
                },
                success: function (data) {
                    // $("#keluarform").click();
                    window.location.href = base_url + 'potjala';
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        }else{
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url + "cekjala/addsession",
                data: {
                    msn: rel2,
                    shift: $("#shiftkerja").val(),
                    tgl: $("#tgl").val()
                },
                success: function (data) {
                    // $("#keluarform").click();
                    window.location.href = base_url + 'cekjala';
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        }
    });
</script>