<div class="container-xl">
    <div class="card p-1">
        <div class="card-body p-1">
            <div class="row mt-1">
                <div class="row hilang" id="formcarinya">
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
                </div>
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
                    <div style="min-height: 20px;" id="kolomposatu" class="">
                        <input type="text" id="po" name="po" value="<?= $data['po'] ?>" class="hilang">
                        <input type="text" id="item" name="item" value="<?= $data['item'] ?>" class="hilang">
                        <input type="text" id="dis" name="dis" value="<?= $data['dis'] ?>" class="hilang">
                        <input type="text" id="insno" name="insno" value="<?= $data['insno'] ?>" class="hilang">
                        <table class="table table-hover m-0">
                            <tbody class="table-tbody">
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td class="font-bold"><?= tglmysql($data['tgl']) ?></td>
                                </tr>
                                <tr>
                                    <td>Operator</td>
                                    <td>:</td>
                                    <?php $datapersonil1 = $data['noinduk_cek']=='' ? '' : trim(datauser($data['noinduk_cek'])).' ('.datauser($data['noinduk_cek'],'noinduk').')'; ?>
                                    <td class="font-bold"><?= $datapersonil1 ?></td>
                                </tr>
                                <tr>
                                    <td>Shift</td>
                                    <td>:</td>
                                    <td class="font-bold"><?= namashift(getjamkerjanet($data['id_waktu'],'psm')) ?></td>
                                </tr>
                                <tr>
                                    <td>PO</td>
                                    <td>:</td>
                                    <td class="font-bold" id="klas-po"><?= viewsku($data['po'],$data['item'],$data['dis']) ?></td>
                                </tr>
                                <tr>
                                    <td>Insno</td>
                                    <td>:</td>
                                    <td class="font-bold" id="klas-insno"><?= $data['insno'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="my-1 row" id="kolomidwaktu">
                            <label class="col-3 col-form-label">Jam Cek Jala</label>
                            <div class="col-sm-9 col">
                                <select name="id_waktu" id="id_waktu" class="form-control form-select" disabled>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach($jamkerja->result_array() as $jmk): ?>
                                        <option value="<?= $jmk['id'] ?>" <?php if($data['id_waktu']==$jmk['id']){ echo "selected"; } ?>><?= $jmk['waktu'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="my-1 row" id="kolomlotcek">
                            <label class="col-3 col-form-label">Lot Cek</label>
                            <div class="col-sm-9 col">
                                <input type="text" class="form-control font-kecil text-black inputangka" name="lotcek" id="lotcek" placeholder="Lot Cek" value="<?= $data['lotcek'] ?>">
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="my-1 row" id="kolombenang">
                            <label class="col-sm-3 col col-form-label">Ikatan</label>
                            <div class="col-sm-3 col">
                                <input type="text" class="form-control font-kecil text-black" name="ikatandef" id="ikatandef" placeholder="Spek Benang" value="" disabled>
                            </div>
                            <div class="col-sm-3 pb-1 text-end">
                                <a href="#" class="btn btn-smx font-kecil btn-okk <?php if($data['cek_ikatan']=='1'){echo "bg-success"; } ?>" id="btn-ok-ik">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check m-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>
                                </a> | 
                                <a href="#" class="btn btn-smx font-kecil btn-ngg <?php if($data['cek_ikatan']=='2'){echo "bg-danger"; } ?>" id="btn-ng-ik">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x m-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                </a> 
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="my-1 row" id="kolombenang">
                            <label class="col-sm-3 col col-form-label">Spek Benang</label>
                            <div class="col-sm-3 col">
                                <input type="text" class="form-control font-kecil text-black" name="benangdef" id="benangdef" placeholder="Spek Benang" value="" disabled>
                            </div>
                            <div class="col-sm-3 pb-1 text-end">
                                <a href="#" class="btn btn-smx font-kecil btn-okk <?php if($data['cek_benang']=='1'){echo "bg-success"; } ?>" id="btn-ok-bg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check m-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>
                                </a> | 
                                <a href="#" class="btn btn-smx font-kecil btn-ngg <?php if($data['cek_benang']=='2'){echo "bg-danger"; } ?>" id="btn-ng-bg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x m-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                </a> 
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="my-1 row" id="kolomkakesu">
                            <label class="col-sm-3 col col-form-label">Kakesu</label>
                            <div class="col-sm-3 col">
                                <input type="text" class="form-control font-kecil text-black text-end" name="kakesudef" id="kakesudef" placeholder="Jumlah Kakesu" value="" disabled>
                            </div>
                            <div class="col-sm-3 pb-1 text-end">
                                <a href="#" class="btn btn-smx font-kecil btn-okk <?php if($data['cek_kakesu']=='1'){echo "bg-success"; } ?>" id="btn-ok-kakesu">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check m-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>
                                </a> | 
                                <a href="#" class="btn btn-smx font-kecil btn-ngg <?php if($data['cek_kakesu']=='2'){echo "bg-danger"; } ?>" id="btn-ng-kakesu">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x m-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                </a> 
                            </div>
                            <div class="col-sm-3 col">
                                <input type="text" class="form-control font-kecil text-end inputangka" name="kakesu" id="kakesu" placeholder="Jumlah Kakesu " value="<?= rupiah($data['kakesu'],2) ?>">
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="my-1 row" id="kolommeai">
                            <label class="col-sm-3 col col-form-label">Meai</label>
                            <div class="col-sm-3 col">
                                <input type="text" class="form-control font-kecil text-black text-end mb-0" name="meaidef" id="meaidef" placeholder="Nilai Meai" value="" disabled>
                                <span class="font-10 text-red m-0">Cara Pengukuran Lihat Instruksi</span>
                            </div>
                            <div class="col-sm-3 pb-1 text-end">
                                <a href="#" class="btn btn-smx font-kecil btn-okk <?php if($data['cek_meai']=='1'){echo "bg-success"; } ?>" id="btn-ok-meai">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check m-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>
                                </a> | 
                                <a href="#" class="btn btn-smx font-kecil btn-ngg <?php if($data['cek_meai']=='2'){echo "bg-danger"; } ?>" id="btn-ng-meai">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x m-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                </a> 
                            </div>
                            <div class="col-sm-3 col">
                                <input type="text" class="form-control font-kecil text-end inputangka" name="meai" id="meai" placeholder="Nilai Meai" value="<?= rupiah($data['meai'],2) ?>">
                            </div>
                        </div>
                        <div class="my-1 row" id="kolommeai">
                            <!-- <label class="col-sm-3 col col-form-label"></label> -->
                            <div class="col pb-1">
                                <table id="tabelnya" class="table table-hover table-bordered cell-border mt-0 mb-0" style="width: 100% !important; border-collapse: collapse;"> <!-- table order-column table-hover table-bordered cell-border -->
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jalur</th>
                                            <th>Hasil Pengukuran</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody" id="body-table-prodhik" style="font-size: 13px !important; width: 100% !important;">
                                        <tr>
                                            <td class="text-center">#1</td>
                                            <td class="font-kecil"><input type="text" class="form-control font-kecil text-end inputangka" name="jalur1" id="jalur1" placeholder="Jalur" value="<?= rupiah($data['jalur1']) ?>"></td>
                                            <td class="font-kecil"><input type="text" class="form-control font-kecil text-end inputangka" name="ukur1" id="ukur1" placeholder="Nilai Ukur" value="<?= rupiah($data['ukur1'],2) ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">#2</td>
                                            <td class="font-kecil"><input type="text" class="form-control font-kecil text-end inputangka" name="jalur2" id="jalur2" placeholder="Jalur" value="<?= rupiah($data['jalur2']) ?>"></td>
                                            <td class="font-kecil"><input type="text" class="form-control font-kecil text-end inputangka" name="ukur2" id="ukur2" placeholder="Nilai Ukur" value="<?= rupiah($data['ukur2'],2) ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">#3</td>
                                            <td class="font-kecil"><input type="text" class="form-control font-kecil text-end inputangka" name="jalur3" id="jalur3" placeholder="Jalur" value="<?= rupiah($data['jalur3']) ?>"></td>
                                            <td class="font-kecil"><input type="text" class="form-control font-kecil text-end inputangka" name="ukur3" id="ukur3" placeholder="Nilai Ukur" value="<?= rupiah($data['ukur3'],2) ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">#4</td>
                                            <td class="font-kecil"><input type="text" class="form-control font-kecil text-end inputangka" name="jalur4" id="jalur4" placeholder="Jalur" value="<?= rupiah($data['jalur4']) ?>"></td>
                                            <td class="font-kecil"><input type="text" class="form-control font-kecil text-end inputangka" name="ukur4" id="ukur4" placeholder="Nilai Ukur" value="<?= rupiah($data['ukur4'],2) ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">#5</td>
                                            <td class="font-kecil"><input type="text" class="form-control font-kecil text-end inputangka" name="jalur5" id="jalur5" placeholder="Jalur" value="<?= rupiah($data['jalur5']) ?>"></td>
                                            <td class="font-kecil"><input type="text" class="form-control font-kecil text-end inputangka" name="ukur5" id="ukur5" placeholder="Nilai Ukur" value="<?= rupiah($data['ukur5'],2) ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><a href="#" class="btn btn-success form-control btn-flat font-kecil refmeai">Refresh Meai</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="my-1 row" id="kolomket">
                            <label class="col-3 col-form-label">Keterangan</label>
                            <div class="col">
                                <textarea name="ketcek" id="ketcek" class="form-control font-kecil" rows="4"><?= $data['ketcek'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div style="min-height: 10px;">
                        <div id="reader" style=""></div>
                    </div>
                </div>
            </div>
            <hr class="m-0">
            <div class="text-end mt-1">
                <?php if($mode=='edit'): ?>
                    <button href="#" class="btn btn-sm btn-info font-kecil" id="simpanform">Update</button>
                <?php endif; ?>
                <button href="#" class="btn btn-sm btn-primary font-kecil" id="keluarform" data-bs-dismiss="modal">Batal / Keluar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".inputangka").on("change click keyup input paste", function (event) {
            $(this).val(function (index, value) {
                return value
                    .replace(/(?!\.)\D/g, "")
                    .replace(/(?<=\..*)\./g, "")
                    .replace(/(?<=\.\d\d\d\d\d\d\d).*/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                    .replace(/(?<=\..*)\,/g, "");
            });
        });
        if($("#po").val() != ''){
            caridetailins();
        }
    })
    let idleTimer;
    const maxIdleTime = 1500;
    let html5QrcodeScanner = null;
    $(document).off('keyup').on('keyup','#textcaripo',function(){
        var isi = $(this).val();
        if(isi.length > 3){
            $("#btncaripo").html('Loading ..');
            clearTimeout(idleTimer);
            idleTimer = setTimeout(caripo(), maxIdleTime);
        }else{
            $("#divcaripo").addClass('hilang');
        }
    });
    $("#btncaripo").off('click').on('click',function(){
        var isi = $('#textcaripo').val();
        if(isi.length > 3){
            $("#btncaripo").html('Loading ..');
            // clearTimeout(idleTimer);
            // idleTimer = setTimeout(caripo(), maxIdleTime);
            caripo();
        }else{
            $("#divcaripo").addClass('hilang');
            pesan('Minimal 3 Digit !','info');
        }
    })
    function caripo(){
        var kata = $("#textcaripo").val();
        if(kata.trim()!=''){
            // alert('XX');
            $("#divcaripo").addClass('hilang');
            $.ajax({
                dataType: "json",
                type: "POST",
                url: base_url + "cekjala/getdatapoinsno",
                data: {
                    isi: kata
                },
                success: function (data) {
                    if(data.jml != 0){
                        $("#divcaripo").removeClass('hilang');
                        if(data.jml==1){
                            $("#kolomposatu").removeClass('hilang');
                            var po = data.data.rel;
                            var item = data.data.rel2;
                            var dis = data.data.rel3;
                            var ins = data.data.rel4;
                            var xdis = dis > 0 ? ' dis '+dis : '';
                            var sku = po.trim()+'#'+item.trim()+xdis;
                            $("#klas-po").html(sku);
                            $("#klas-insno").html(ins);
                            $("#po").val(po);
                            $("#item").val(item);
                            $("#dis").val(dis);
                            $("#insno").val(ins);
                            $("#simpanform").removeClass('hilang');
                            $("#divcaripo").addClass('hilang');
                            $("#formcarinya").addClass('hilang');
                            if($("#po").val() != ''){
                                caridetailins();
                            }
                        }else{
                            $("#body-table-prodhik").html(data.data).show();
                        }
                    }else{
                        $("#divcaripo").addClass('hilang');
                        alert('PO atau Instruksi ini tidak ditemukan !');
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
    $(document).off('click').on('click','#pilihpo',function(){
        var po = $(this).attr('rel');
        var item = $(this).attr('rel2');
        var dis = $(this).attr('rel3');
        var ins = $(this).attr('rel4');
        var xdis = dis > 0 ? ' dis '+dis : '';
        var sku = po.trim()+'#'+item.trim()+xdis;
        $("#klas-po").html(sku);
        $("#klas-insno").html(ins);
        $("#po").val(po);
        $("#item").val(item);
        $("#dis").val(dis);
        $("#insno").val(ins);
        $("#kolomposatu").removeClass('hilang');
        $("#simpanform").removeClass('hilang');
        $("#divcaripo").addClass('hilang');
        $("#formcarinya").addClass('hilang');
        if($("#po").val() != ''){
            caridetailins();
        }
        // $("#keluarform").click();
    });

    function caridetailins(){
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + "cekjala/getdetailinst",
            data: {
                po : $("#po").val(),
                item : $("#item").val(),
                dis : $("#dis").val(),
                insno : $("#insno").val()
            },
            success: function (data) {
                var kaksu = data[0].kakesu;
                $("#kakesudef").val(kaksu);
                $("#meaidef").val(data[0].meai+' '+data[0].st_meai);
                $("#benangdef").val(data[0].jenis);
                $("#ikatandef").val(data[0].knot);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            },
        });
    }

    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        console.log(`Scan result: ${decodedText}`, decodedResult);
        $("#textcaripo").val(decodedText);
        // html5QrcodeScanner.clear();
        $("#btnendscanpo").click();
        if($("#textcaripo").val() != ''){
            caripo();
        }
    }

    $("#btnscanpo").click(function(){
        $("#btncaripo").addClass('hilang');
        $("#btnscanpo").addClass('hilang');
        $("#kolomposatu").addClass('hilang');
        $("#btnendscanpo").removeClass('hilang');
        $("#textcaripo").val('');
        caripo();
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
    
    $("#simpanform").click(function(){
        if($("#po").val()==''){
            pesan('PO harus dipilih dulu !','info');
            return false;
        }
        if($("#id_waktu").val()==''){
            pesan('Jam Pengecekan harus dipilih !','info');
            return false;
        }
        var cekikatan = 0;
        var cekbenang = 0;
        var cekkakesu = 0;
        var cekmeai = 0;
        if($("#btn-ok-ik").hasClass('bg-success')){
            var cekikatan = 1;
        }
        if($("#btn-ng-ik").hasClass('bg-danger')){
            var cekikatan = 2;
        }
        if($("#btn-ok-bg").hasClass('bg-success')){
            var cekbenang = 1;
        }
        if($("#btn-ng-bg").hasClass('bg-danger')){
            var cekbenang = 2;
        }
        if($("#btn-ok-kakesu").hasClass('bg-success')){
            var cekkakesu = 1;
        }
        if($("#btn-ng-kakesu").hasClass('bg-danger')){
            var cekkakesu = 2;
        }
        if($("#btn-ok-meai").hasClass('bg-success')){
            var cekmeai = 1;
        }
        if($("#btn-ng-meai").hasClass('bg-danger')){
            var cekmeai = 2;
        }
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + "cekjala/simpandata",
            data: {
                po : $("#po").val(),
                item : $("#item").val(),
                dis : $("#dis").val(),
                insno : $("#insno").val(),
                wkt : $("#id_waktu").val(),
                cek_benang: cekbenang,
                cek_kakesu: cekkakesu,
                cek_meai: cekmeai,
                cek_ikatan: cekikatan,
                kakesu: $("#kakesu").val(),
                meai: $("#meai").val(),
                lotcek: $("#lotcek").val(),
                ketcek: $("#ketcek").val(),
                jalur1: $("#jalur1").val(),
                jalur2: $("#jalur2").val(),
                jalur3: $("#jalur3").val(),
                jalur4: $("#jalur4").val(),
                jalur5: $("#jalur5").val(),
                ukur1: $("#ukur1").val(),
                ukur2: $("#ukur2").val(),
                ukur3: $("#ukur3").val(),
                ukur4: $("#ukur4").val(),
                ukur5: $("#ukur5").val()
            },
            success: function (data) {
                window.location.href = base_url+'cekjala';
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            },
        });
    });
    $(document).on('click','.btn-okk',function(){
        var spektmb = $(this).prop('id');
        var baru = spektmb.replaceAll('ok','ng');
        $("#"+baru).removeClass('bg-danger');
        $("#"+spektmb).addClass('bg-success');
    });
    $(document).on('click','.btn-ngg',function(){
        var spektmb = $(this).prop('id');
        var baru = spektmb.replaceAll('ng','ok');
        $("#"+baru).removeClass('bg-success');
        $("#"+spektmb).addClass('bg-danger');
    });
    $(document).on('click','.refmeai',function(){
        var jumlah = 0;
        var bagi = 0;
        for (let x = 1; x < 6; x++) {
            var cek = $("#ukur"+x).val();
            var nilai = 0;
            if(cek.trim() != '-'){
                bagi += 1;
                var nilai = parseFloat($("#ukur"+x).val());
            }
            jumlah += nilai;
        }
        if(jumlah!=0){
            $("#meai").val((jumlah/bagi).toFixed(2));
        }else{
            $("#meai").val('0');
        }
    })
</script>