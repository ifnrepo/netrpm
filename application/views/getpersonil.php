<div class="container-xl">
    <div class="card p-1">
        <div class="card-body p-1">
            <div class="row mt-1">
                <input type="text" id="formname" class="hilang" name="formname" value="<?= $formname ?>">
                <label class="col-3 col-form-label">Cari Karyawan </label>
                <div class="col">
                    <input type="text" class="hilang" name="isimode" id="isimode" value="<?= $mode ?>">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control font-kecil" id="textcaripersonil" placeholder="Cari data.." value="">
                        <button class="btn btn-success font-kecil " id="btncaripersonil" type="button">Cari !</button>
                        <button class="btn btn-danger font-kecil hilang" id="btnhapuspersonil" type="button">Hapus !</button>
                    </div>
                    <!-- <small class="form-hint mt-0 text-azure ms-1" id="kodeproduk"></small>
                    <input type="text" class="hilang" name="idproduk" id="idproduk" value=""> -->
                </div>
                <hr class="m-1">
                <div style="min-height: 350px;">
                    <div class="row mt-1 hilang" id="divcaripersonil" style="min-height: 150px;">
                        <div class="col">
                            <table id="tabelnya" class="table table-hover table-bordered cell-border mt-0" style="width: 100% !important; border-collapse: collapse;"> <!-- table order-column table-hover table-bordered cell-border -->
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Group</th>
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
    $(document).on('keyup','#textcaripersonil',function(){
        clearTimeout(idleTimer);
        idleTimer = setTimeout(caribarang(), maxIdleTime);
    });
    function caribarang(){
        var kata = $("#textcaripersonil").val();
        var carinya = "rpm/getdatapersonil";
        if($("#formname").val()=='potjala'){
            carinya = "potjala/getdatapersonil";
        }
        if(kata.trim()!=''){
            // alert('XX');
            $("#divcaripersonil").addClass('hilang');
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url + carinya,
                data: {
                    isi: kata
                },
                success: function (data) {
                    if(data.jml != 0){
                        $("#divcaripersonil").removeClass('hilang');
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
            $("#divcaripersonil").addClass('hilang');
        }
    }
    $(document).on('click','#pilihpersonil',function(){
        var urladd = "rpm/addpersonil";
        var link = "rpm";
        var tis = $(this).attr('rel');
        var rel2 = $(this).attr('rel2');
        var rel3 = $(this).attr('rel3');
        $("#mach_no").val(rel2);
        $("#ketmesin").val(rel3);
        if($("#formname").val()=='potjala'){
            urladd = "potjala/addpersonil";
            link = "potjala";
        }
        if($("#formname").val()=='cekjala'){
            urladd = "cekjala/addpersonil";
            link = "cekjala";
        }
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + urladd,
            data: {
                msn: rel2,
                mode: $("#isimode").val()
            },
            success: function (data) {
                // $("#keluarform").click();
                window.location.href = base_url + link;
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            },
        });
    });
</script>