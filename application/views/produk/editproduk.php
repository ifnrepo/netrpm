<div class="container-xl">
    <div class="card p-1">
        <div class="card-body p-1">
            <div class="d-flex justify-content-between">
                <div id="titlenet"><h3>Jenis Jaring</h3></div>
                <div class="line-11">
                    <div id="kodenet" class="line-11"><h3 class="text-red m-0"></h3></div>
                    <div class="text-end font-kecil" id="speku">XXXX</div>
                </div>
                <!-- NETSMO0206IN15020YDSE-16TATE -->
            </div>
            <hr class="m-0">
            <input type="text" name="idproduk" id="idproduk" class="hilang" value="<?= $data['id'] ?>">
            <input type="text" name="katid" id="katid" class="hilang" value="<?= $data['kategori_id'] ?>">
            <input type="text" name="netkat" id="netkat" class="hilang" value="<?= $data['net'] ?>">
            <input type="text" name="kodoth" id="kodoth" class="hilang" value="<?= $data['kode_oth'] ?>">
            <div id="addjaring" class="hilang">
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Tipe</label>
                    <div class="col">
                        <select id="knot-tipe" name="knot-tipe" class="form-select form-control font-kecil">
                            <option value="">-- Knot Type --</option>
                            <option value="S" <?php if($data['knot']=='S'){ echo "selected"; } ?>>S/K</option>
                            <option value="W" <?php if($data['knot']=='W'){ echo "selected"; } ?>>W/K</option>
                            <option value="X" <?php if($data['knot']=='X'){ echo "selected"; } ?>>X/K</option>
                            <option value="Y" <?php if($data['knot']=='Y'){ echo "selected"; } ?>>Y/K</option>
                            <option value="Z" <?php if($data['knot']=='Z'){ echo "selected"; } ?>>Z/K</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Jenis/Ukuran Benang</label>
                    <div class="col">
                        <select id="jenis-benang" name="jenis-benang" class="form-select form-control font-kecil">
                            <option value="">-- Jenis Benang --</option>
                            <?php foreach($jns_benang->result_array() as $jnb): $selek = $data['jenis_benang']==$jnb['jnb'] ? 'selected' : ''; ?>
                                <option value="<?= $jnb['jnb'] ?>" <?= $selek ?>><?= $jnb['jnb'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" name="valbenang" id="valbenang" class="hilang" value="<?= $data['ukuran_benang'] ?>">
                        <select id="ukuran-benang" name="ukuran-benang" class="form-select form-control font-kecil" disabled>
                            <option value="">-- Ukuran Benang --</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Meai</label>
                    <div class="col">
                        <input type="text" name="meai" id="meai" value="<?= $data['meai'] ?>" class="form-control font-kecil text-end">
                    </div>
                    <div class="col">
                        <select id="sat-meai" name="sat-meai" class="form-select form-control font-kecil">
                            <option value="">-- Satuan Meai --</option>
                            <option value="S" <?php if($data['ukuran_meai']=='MMSTR'){ echo "selected"; } ?>>MMSTR</option>
                            <option value="Q" <?php if($data['ukuran_meai']=='MMSQ'){ echo "selected"; } ?>>MMSQ</option>
                            <option value="M" <?php if($data['ukuran_meai']=='MM'){ echo "selected"; } ?>>MM</option>
                            <option value="I" <?php if($data['ukuran_meai']=='INCH'){ echo "selected"; } ?>>INCH</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Mesh Deep (MD)</label>
                    <div class="col">
                        <input type="text" name="md" id="md" value="<?= $data['mesh'] ?>" class="form-control font-kecil inputangka text-end">
                    </div>
                    <div class="col">
                    
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Length</label>
                    <div class="col">
                        <input type="text" name="length" id="length" value="<?= $data['length'] ?>" class="form-control font-kecil inputangka text-end">
                    </div>
                    <div class="col">
                        <select id="sat-length" name="sat-length" class="form-select form-control font-kecil">
                            <option value="">-- Satuan Length --</option>
                            <option value="M" <?php if($data['st_length']=='MTR'){ echo "selected"; } ?>>MTR</option>
                            <option value="Y" <?php if($data['st_length']=='YDS'){ echo "selected"; } ?>>YDS</option>
                            <option value="L" <?php if($data['st_length']=='ML'){ echo "selected"; } ?>>ML</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Color</label>
                    <div class="col">
                        <select id="color" name="color" class="form-select font-kecil">
                            <option value="">-- Pilih Warna --</option>
                            <?php foreach($getcolor->result_array() as $clr): $selclr = trim($data['color'])==trim($clr['color']) ? 'selected' : ''; ?>
                                <option value="<?= $clr['color'] ?>" <?= $selclr ?>><?= $clr['color'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label class="col-3 col-form-label">Ways</label>
                            <div class="col">
                                <select id="ways" name="ways" class="form-select form-control font-kecil">
                                    <option value="">-- Ways --</option>
                                    <option value="YOKO" <?php if($data['ways']=='YOKO'){ echo "selected"; } ?>>Yoko</option>
                                    <option value="TATE" <?php if($data['ways']=='TATE'){ echo "selected"; } ?>>Tate</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Keterangan</label>
                    <div class="col">
                        <input type="text" name="keterangan" id="keterangan" value="<?= $data['keterangan'] ?>" class="form-control font-kecil">
                    </div>
                </div>
                <hr class="m-0">
                <div class="text-center mt-1">
                    <a href="#" class="btn btn-sm btn-success font-kecil" id="simpannet"><span class="text-black">Simpan & Generate ID</span></a>
                    <a href="#" class="btn btn-sm btn-danger font-kecil" data-bs-dismiss="modal">Batal</a>
                </div>
            </div>
            <div id="addother" class="hilang">
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Nama Produk</label>
                    <div class="col">
                        <input type="text" name="prod-oth" id="prod-oth" class="form-control font-kecil" value="<?= $data['produk'] ?>" readonly>
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Ukuran</label>
                    <div class="col">
                        <input type="text" name="ukuran-oth" id="ukuran-oth" value="<?= $data['ukuran_benang'] ?>" class="form-control font-kecil">
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Tipe</label>
                    <div class="col line-11">
                        <input type="text" name="tipe-oth" id="tipe-oth" class="form-control font-kecil mb-0" value="<?= $data['tipe_oth'] ?>">
                        <!-- <small class="form-hint mt-0">We'll never share your email with anyone else.</small> -->
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Packaging</label>
                    <div class="col line-11">
                        <input type="text" name="package-oth" id="package-oth" class="form-control font-kecil mb-0" value="<?= $data['package_oth'] ?>">
                        <!-- <small class="form-hint mt-0">We'll never share your email with anyone else.</small> -->
                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Color</label>
                    <div class="col">
                        <select id="color-oth" name="color-oth" class="form-select font-kecil">
                            <option value="">-- Pilih Warna --</option>
                            <?php foreach($getcolor->result_array() as $clr): $selclr = trim($data['color'])==trim($clr['color']) ? 'selected' : ''; ?>
                                <option value="<?= $clr['color'] ?>" <?= $selclr ?>><?= $clr['color'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">

                    </div>
                </div>
                <div class="row mt-1">
                    <label class="col-3 col-form-label">Keterangan</label>
                    <div class="col line-11">
                        <input type="text" name="keterangan-oth" id="keterangan-oth" class="form-control font-kecil mb-0" value="<?= $data['keterangan'] ?>">
                        <!-- <small class="form-hint mt-0">We'll never share your email with anyone else.</small> -->
                    </div>
                </div>
                <hr class="m-0">
                <div class="text-center mt-1">
                    <a href="#" class="btn btn-sm btn-success font-kecil" id="simpanoth" ><span class="text-black">Simpan & Generate ID</span></a>
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
    setTimeout(() => {
        if($("#netkat").val()==1){
            $("#titlenet h3").html('JARING');
            $("#addother").addClass('hilang');
            $("#addjaring").removeClass('hilang');
            $("#jenis-benang").change();
            setTimeout(() => {
                $("#ukuran-benang").change();
            }, 100);
            // generatekode();
        }else{
            $("#titlenet h3").html('OTHER');
            $("#addother").removeClass('hilang');
            $("#addjaring").addClass('hilang');
            generatekodeoth();
        }
    }, 200);
    $("#knot-tipe").change(function(){
        generatekode();
    })
    $("#jenis-benang").change(function(){
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + "produk/getukuranbenang",
            data: {
                tipe: $(this).val(),
                isi: $("#valbenang").val()
            },
            success: function (data) {
                // alert(data);
                // window.location.href = base_url+'produk';
                $("#ukuran-benang").html(data.hasil).show();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            },
        });
        $("#ukuran-benang").val('');
        if($(this).val() != ''){
            $("#ukuran-benang").attr('disabled',false);
        }else{
            $("#ukuran-benang").attr('disabled',true);
        }
        generatekode();
    })
    $("#jenis-benang-oth").change(function(){
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + "produk/getukuranbenang",
            data: {
                tipe: $(this).val(),
            },
            success: function (data) {
                // alert(data);
                // window.location.href = base_url+'produk';
                $("#ukuran-benang-oth").html(data.hasil).show();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            },
        });
        $("#ukuran-benang-oth").val('');
        if($(this).val() != ''){
            $("#ukuran-benang-oth").attr('disabled',false);
        }else{
            $("#ukuran-benang-oth").attr('disabled',true);
        }
        generatekodeoth();
    })
    $("#ukuran-benang").change(function(){
        generatekode();
    })
    $("#ukuran-benang-oth").change(function(){
        generatekodeoth();
    })
    $("#meai").on('blur',function(){
        generatekode();
    })
    $("#sat-meai").change(function(){
        generatekode();
    })
    $("#md").on('blur',function(){
        generatekode();
    })
    $("#length").on('blur',function(){
        generatekode();
    })
    $("#sat-length").change(function(){
        generatekode();
    })
    $("#color").change(function(){
        generatekode();
    })
    $("#color-oth").change(function(){
        generatekodeoth();
    })
    $("#ways").change(function(){
        generatekode();
    })
    $("#prod-oth").on('blur',function(){
        generatekodeoth();
    })
    $("#tipe-oth").on('blur',function(){
        generatekodeoth();
    })
    $("#package-oth").on('blur',function(){
        generatekodeoth();
    })
    $("#ukuran-oth").on('blur',function(){
        generatekodeoth();
    })
    function generatekode(){
        var knot = '';
        var jnb = '';
        var ukr = '';
        var me = ''; var stme='';
        var md = ''; var len = ''; var stlen = '';
        var col = ''; var ways = '';
        var asal = $("#netkat").val()==1 ? 'NET' : 'OTH';
        if($("#knot-tipe").val()!=''){
            knot = $("#knot-tipe").val();
        }
        if($("#jenis-benang").val()!=''){
            jnb = $("#jenis-benang").val();
        }
        if($("#ukuran-benang").val()!=''){
            var strukr = $("#ukuran-benang").val();
            ukr = strukr.replaceAll(' ','')+'-';
        }
        if($("#meai").val()!=''){
            var strmeai = $("#meai").val();
            me = strmeai.replaceAll(',','');
        }
        if($("#sat-meai").val()!=''){
            var strsatme = $("#sat-meai").val();
            stme = strsatme.toUpperCase();
        }
        if($("#md").val()!=''){
            var strmd = $("#md").val();
            md = strmd.replaceAll(',','')+'MD';
        }
        if($("#length").val()!=''){
            strlength = $("#length").val();
            len = strlength.replaceAll(',','');
        }
        if($("#sat-length").val()!=''){
            strsatlen = $("#sat-length").val();
            stlen = strsatlen.toUpperCase();
        }
        if($("#color").val()!=''){
            stcol = $("#color").val();
            col = stcol.replaceAll(' ','')
        }
        if($("#ways").val()!=''){
            ways = '-'+$("#ways").val();
        }
        var jadi = asal+knot+jnb+ukr+me+stme+md+len+stlen+ways+col;
        $("#kodenet h3").html(jadi);
        generatekodenet();
    }
    function generatekodeoth(){
        var knot = '';
        var jnb = '';
        var ukr = '';
        var me = ''; var stme='';
        var md = ''; var len = ''; var stlen = '';
        var col = ''; var ways = '';
        var oth = '';
        var asal = $("#netkat").val()==1 ? 'NET' : 'OTH';
        var isiselect = $('#select-tipe option:selected').text();
        var prod = $("#kodoth").val()=='' ? $("#prod-oth").val() : $("#kodoth").val();
        // $("#prod-oth").val(isiselect);
        if($("#ukuran-oth").val()!=''){
            var strukr = $("#ukuran-oth").val();
            ukr = strukr.replaceAll(' ','').toUpperCase();
        }
        if($("#color-oth").val()!=''){
            stcol = '-'+$("#color-oth").val().trim();
            col = stcol.replaceAll(' ','');
        }
        if($("#tipe-oth").val()!=''){ 
            xme = '-'+$("#tipe-oth").val().trim().toUpperCase();
            me = xme.replaceAll(' ','');
        }
        if($("#package-oth").val()!=''){ 
            if($("#tipe-oth").val()==''){ 
                md = '-'+$("#package-oth").val().trim().toUpperCase();
            }else{
                md = $("#package-oth").val().trim().toUpperCase();
            }
        }
        if($("#prod-oth").val()!=''){
            var strprod = prod.replaceAll('._','');
            oth = strprod.replaceAll(' ','').toUpperCase();
        }
        var jadi = asal+oth+knot+jnb+ukr+me+stme+md+len+stlen+ways+col;
        $("#kodenet h3").html(jadi);
        generatekodeother();
    }
    $(".inputangka").on("change click keyup input paste", function (event) {
        $(this).val(function (index, value) {
            return value
                .replace(/(?!\.)\D/g, "")
                .replace(/(?<=\..*)\./g, "")
                .replace(/(?<=\.\d\d).*/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
    function generatekodenet(){
        var knot = '';
        var ukr = '';
        var meai = '';
        var stme = '';var tme = '';var tle = '';
        var md = '';
        var len = '';var strlen='';var lme = '';
        var col = '';var ways='';
        if($("#knot-tipe").val()!=''){
            knot = $("#knot-tipe option:selected").text();
        }
        if($("#ukuran-benang").val()!=''){
            var strukr = $("#ukuran-benang").val();
            ukr = strukr.replaceAll(' ','');
        }
        if($("#meai").val()!=''){
            var strmeai = $("#meai").val();
            meai = ' - '+strmeai.replaceAll(',','');
        }
        if($("#sat-meai").val()!=''){
            var strsatme = $("#sat-meai").val();
            stme = strsatme.toUpperCase();
            switch (stme) {
                // S,Q,M,I
                case 'S':
                    tme = 'MMSTR';
                    break;
                case 'Q':
                    tme = 'MMSQ';
                    break;
                case 'M':
                    tme = 'MM';
                    break;
                case 'I':
                    tme = '"';
                    break;
            
                default:
                    break;
            }
        }
        if($("#md").val()!=''){
            var strmd = $("#md").val();
            md = ' - '+strmd.replaceAll(',','')+'MD';
        }
        if($("#length").val()!=''){
            strlength = $("#length").val();
            len = ' X '+strlength.replaceAll(',','');
        }
        if($("#sat-length").val()!=''){
            strsatlen = $("#sat-length").val();
            strlen = strsatlen.toUpperCase();
            switch (strlen) {
                // M,Y,L
                case 'M':
                    tle = 'MTR';
                    break;
                case 'Y':
                    tle = 'YDS';
                    break;
                case 'L':
                    tle = 'ML';
                    break;
            
                default:
                    break;
            }
        }
        if($("#color").val()!=''){
            col = ' - '+$("#color").val();
        }
        if($("#ways").val()!=''){
            ways = ' '+$("#ways").val();
        }
        $("#speku").html(knot+' '+ukr+meai+tme+md+len+tle+col+ways);
    }
    function generatekodeother(){
        var knot = '';
        var jnb = '';
        var ukr = '';
        var me = ''; var stme='';
        var md = ''; var len = ''; var stlen = '';
        var col = ''; var ways = '';
        var oth = '';
        var asal = $("#jnnet").val()==1 ? 'NET' : 'OTH';
        var isiselect = $('#select-tipe option:selected').text();
        // var prod = $("#kodoth").val();
        var prod = $("#kodoth").val()=='' ? $("#prod-oth").val() : $("#kodoth").val();
        // $("#prod-oth").val(isiselect);
        if($("#ukuran-oth").val()!=''){
            var strukr = $("#ukuran-oth").val();
            ukr = ' '+strukr.replaceAll(' ','').toUpperCase().trim();
        }
        if($("#tipe-oth").val()!=''){ 
            xme = $("#tipe-oth").val().trim().toUpperCase();
            me = ' ('+xme.replaceAll(' ','')+')';
        }
        if($("#package-oth").val()!=''){ 
             md = ' ('+$("#package-oth").val().trim().toUpperCase()+')';
        }
        if($("#color-oth").val()!=''){
            col = ' '+$("#color-oth").val().trim();
        }
        if($("#prod-oth").val()!=''){
            var strprod = prod.replaceAll('._','');
            oth = strprod.replaceAll(' ','').toUpperCase();
        }
        var jadi = prod+ukr+me+md+col;
        $("#speku").html(jadi);
    }
    $("#simpannet").click(function(){
        if($("#knot-tipe").val()==''){
            alert('Ikatan jaring harus di isi !');
            return false;
        }
        if($("#ukuran-benang").val()=='' || $("#ukuran-benang").val()=='0'){
            alert('Ukuran Benang jaring harus di isi !');
            return false;
        }
        if($("#meai").val()=='' || $("#meai").val()=='0'){
            alert('Meai harus di isi !');
            return false;
        }
        if($("#md").val()=='' || $("#md").val()=='0'){
            alert('Mesh Deep harus di isi !');
            return false;
        }
        if($("#length").val()=='' || $("#length").val()=='0'){
            alert('Panjang jaring harus di isi !');
            return false;
        }
        if($("#sat-length").val()==''){
            alert('Satuan Panjang jaring harus di isi !');
            return false;
        }
        if($("#color").val()==''){
            alert('Warna harus di isi !');
            return false;
        }
        if($("#ways").val()==''){
            alert('Ways harus di isi !');
            return false;
        }
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + "produk/editjala",
            data: {
                id: $("#idproduk").val(),
                ctgrid : $("#katid").val(),
                kode: $("#kodenet h3").html(),
                knot: $("#knot-tipe").val(),
                jenben: $("#jenis-benang").val(),
                ukrben: $("#ukuran-benang").val(),
                meai: $("#meai").val(),
                stmeai: $("#sat-meai option:selected").html(),
                mesh: $("#md").val(),
                len: $("#length").val(),
                satlen: $("#sat-length option:selected").html(),
                color: $("#color").val(),
                ways: $("#ways").val(),
                ket: $("#keterangan").val(),
                spek: $("#speku").html()
            },
            success: function (data) {
                // alert(data);
                if(data==0){
                    alert('Data Jaring berhasil diupdate !');
                    window.location.reload();
                }else{
                    alert('Data Jaring berhasil disimpan !');
                    window.location.reload();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
                alert('Data Jaring ini sudah pernah dibuat !');
            },
        });
    })
    $("#simpanoth").click(function(){
        if($("#prod-oth").val()==''){
            alert('Produk harus di isi !');
            return false;
        }
        if($("#ukuran-oth").val()=='' || $("#ukuran-oth").val()=='0'){
            alert('Ukuran harus di isi !');
            return false;
        }
        if($("#color-oth").val()==''){
            alert('Warna harus di isi !');
            return false;
        }
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + "produk/editother",
            data: {
                id: $("#idproduk").val(),
                ctgrid : $("#katid").val(),
                kode: $("#kodenet h3").html(),
                produk: $("#prod-oth").val(),
                ukrben: $("#ukuran-oth").val(),
                tipe: $("#tipe-oth").val(),
                pack: $("#package-oth").val(),
                color: $("#color-oth").val(),
                ket: $("#keterangan-oth").val(),
                spek: $("#speku").html()
            },
            success: function (data) {
                alert('Berhasil disimpan !');
                window.location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
                alert('Data Produk Sudah Ada !');
            },
        });
    })
</script>