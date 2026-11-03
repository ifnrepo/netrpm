<div class="container-xl">
    <div class="card p-1">
        <div class="card-body p-1">
            <div class="row mt-1">
                <label class="col-3 col-form-label">Cari</label>
                <div class="col">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control font-kecil text-uppercase" id="textcaripo" placeholder="Cari PO/Insno.." value="">
                        <button class="btn btn-success font-kecil " id="btncaripo" type="button">Cari !</button>
                        <button class="btn btn-danger font-kecil hilang" id="btnhapuspo" type="button">Hapus !</button>
                        <button class="btn btn-orange font-kecil" id="btnscanpo" type="button">Scan</button>
                        <button class="btn btn-danger font-kecil hilang" id="btnendscanpo" type="button">End Scan</button>
                    </div>
                    <!-- <small class="form-hint mt-0 text-azure ms-1" id="kodeproduk"></small>
                    <input type="text" class="hilang" name="idproduk" id="idproduk" value=""> -->
                </div>
                <hr class="m-1">
                <div style="min-height: 350px;">
                    <div class="row mt-1 hilang" id="divcaripo" style="min-height: 150px;">
                        <div class="col">
                            <table id="tabelnya" class="table table-hover table-bordered cell-border mt-0" style="width: 100% !important; border-collapse: collapse;"> <!-- table order-column table-hover table-bordered cell-border -->
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>SKU</th>
                                        <th>Insno</th>
                                        <th>Specific</th>
                                        <th>Act</th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody" id="body-table-prodhik" style="font-size: 13px !important; width: 100% !important;">
                                    <tr>
                                        <td>#1</td>
                                        <td class="font-kecil">KI-6632#1</td>
                                        <td class="font-kecil text-teal">FS 9210</td>
                                        <td class="font-kecil">W/K 0.40MM  -   70MMSQ -  57MD x  100MTR</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-success p-0 btn-flat font-kecil">Pilih</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="min-height: 150px;">
                        <div id="reader" style=""></div>
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
    let html5QrcodeScanner = null;
    $(document).on('keyup','#textcaripo',function(){
        var isi = $(this).val();
        if(isi.length > 3){
            $("#btncaripo").html('Loading ..');
            clearTimeout(idleTimer);
            idleTimer = setTimeout(caripo(), maxIdleTime);
        }else{
            $("#divcaripo").addClass('hilang');
        }
    });
    function caripo(){
        var kata = $("#textcaripo").val();
        if(kata.trim()!=''){
            // alert('XX');
            $("#divcaripo").addClass('hilang');
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url + "rpm/getdatapoinsno",
                data: {
                    isi: kata
                },
                success: function (data) {
                    if(data.jml != 0){
                        $("#divcaripo").removeClass('hilang');
                        $("#body-table-prodhik").html(data.data).show();
                    }else{
                        alert('Data tidak ditemukan');
                    }
                    $("#btncaripo").html('Cari !');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        }else{
            $("#divcaripo").addClass('hilang');
        }
    }
    $(document).on('click','#pilihpo',function(){
        var po = $(this).attr('rel');
        var item = $(this).attr('rel2');
        var dis = $(this).attr('rel3');
        var ins = $(this).attr('rel4');
        var xdis = dis > 0 ? ' dis '+dis : '';
        var sku = po.trim()+'#'+item.trim()+xdis;
        $("#xpoe").val(sku);
        $("#po").val(po);
        $("#item").val(item);
        $("#dis").val(dis);
        $("#insno").val(ins);
        $("#keluarform").click();
    });
    function onScanSuccess(decodedText, decodedResult) {
    // Handle on success condition with the decoded text or result.
    console.log(`Scan result: ${decodedText}`, decodedResult);
    }

    $("#btnscanpo").click(function(){
        $("#btncaripo").addClass('hilang');
        $("#btnscanpo").addClass('hilang');
        $("#btnendscanpo").removeClass('hilang');
        html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    });

    $("#btnendscanpo").click(function(){
        if (html5QrcodeScanner) {
            html5QrcodeScanner.clear().then(() => {
                html5QrcodeScanner = null;
                // document.getElementById('qr-reader-results').innerText = "";
                console.log("Scanner successfully cleared and camera stream stopped.");
            }).catch(err => {
                console.error("Failed to clear html5QrcodeScanner cleanly: ", err);
            });
        }
        $("#btncaripo").removeClass('hilang');
        $("#btnscanpo").removeClass('hilang');
        $("#btnendscanpo").addClass('hilang');
    });
</script>