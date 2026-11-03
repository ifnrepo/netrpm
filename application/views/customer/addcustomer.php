<div class="row font-kecil p-2">
    <div class="col-6">
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Kode</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="kode_customer" id="kode_customer" value="" placeholder="Kode Customer">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Customer</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="nama_customer" id="nama_customer" value="" placeholder="Nama Customer">
                <span class="text-secondary" style="font-size: 10px;">Data ini yang akan muncul di AKB/AMB</span>
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Buyer</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="buyer" id="buyer" value="" placeholder="Alias">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Exdo</label>
            <div class="col">
                <select class="form-select font-kecil" name="exdo" id="exdo" disabled>
                    <option value="Export" <?php if($this->session->userdata('select-tipe')=='Export'){ echo "selected"; } ?>>Export</option>
                    <option value="Domestic" <?php if($this->session->userdata('select-tipe')=='Domestic'){ echo "selected"; } ?>>Domestic</option>
                </select>
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Port</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="port" id="port" value="" placeholder="Port">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Country</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="country" id="country" value="" placeholder="Country">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Alamat</label>
            <div class="col">
                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3" placeholder="Alamat"></textarea>
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Desa</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="desa" id="desa" value="" placeholder="Desa">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Kecamatan</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="kecamatan" id="kecamatan" value="" placeholder="Kecamatan">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Kab/Kota</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="kab_kota" id="kab_kota" value="" placeholder="Kab/Kota">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Provinsi</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="propinsi" id="propinsi" value="" placeholder="propinsi">
            </div>
        </div>

        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Kode Pos</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="kodepos" id="kodepos" value="" placeholder="kodepos">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Npwp</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="npwp" id="npwp" value="" placeholder="NPWP">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">NIK</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="nik" id="nik" value="" placeholder="Nomor KTP">
            </div>
        </div>
    </div>
    <div class="col-6">

        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Telp</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="telp" id="telp" value="" placeholder="Telp">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Email</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="email" id="email" value="" placeholder="Email">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Kontak</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="kontak" id="kontak" value="" placeholder="Kontak">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Keterangan</label>
            <div class="col">
                <textarea class="form-control font-kecil" name="keterangan" id="keterangan" cols="30" rows="3" placeholder="Keterangan" value=""></textarea>
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">BuyCode</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="buycode" id="buycode" placeholder="BuyCode" value="">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">InsCode</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="inscode" id="inscode" placeholder="Inscode" value="">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">JCode1</label>
            <div class="col">
                <select class="form-select font-kecil" name="jcode1" id="jcode1">
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>

                </select>
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">JCode2</label>
            <div class="col">
                <select class="form-select font-kecil" name="jcode2" id="jcode2">
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </div>
        </div>

        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Benua</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="benua" id="benua" placeholder="Benua" value="">
            </div>
        </div>

        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Region</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="region" id="region" placeholder="Region" value="">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Kode Negara</label>
            <div class="col">
                <select name="kode_negara" id="kode_negara" class="form-select">
                    <option value=""></option>
                    <?php foreach ($getnegara->result_array() as $key) : ?>
                        <option value="<?= $key['kode_negara']; ?>"><?= $key['kode_negara']; ?> (<?= $key['uraian_negara']; ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="mb-1 row">
            <label class="col-3 col-form-label pt-0"></label>
            <div class="col">
                <label class="form-check">
                    <input class="form-check-input" id="pembeli" name="pembeli" type="checkbox">
                    <span class="form-check-label font-bold font-primary">DIRECT SELL</span>
                </label>
            </div>
        </div>

        <div class="mb-1 row">
            <label class="col-3 col-form-label required">CustId</label>
            <div class="col">
                <input type="text" class="form-control font-kecil" name="cust_id" id="cust_id" placeholder="CustId" value="">
            </div>
        </div>
        <div class="mb-1 row">
            <label class="col-3 col-form-label required">Jenis PKP</label>
            <div class="col">
                <select class="form-select" name="jns_pkp" id="jns_pkp" aria-label="Default">
                    <option value="0" selected>-</option>
                    <option value="1">PERSEORANGAN</option>
                    <option value="2">PKP</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-sm me-auto" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-sm btn-success" id="updatecustomer">Simpan</button>
</div>
<script>
    $("#updatecustomer").click(function() {
        var pembeli = $("#pembeli").prop('checked') ? 1 : 0;
        console.log("exdo:", $("#exdo").val());
        if ($("#kode_customer").val() == '') {
            alert('Kode harus di isi !');
            return;
        }
        if ($("#nama_customer").val() == '') {
            alert('Nama Customer harus di isi !');
            return;
        }
        if ($("#buyer").val() == '') {
            alert('Nama Buyer harus di isi !');
            return;
        }
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + 'customer/simpancustomer',
            data: {
                kode_customer: $("#kode_customer").val(),
                nama_customer: $("#nama_customer").val(),
                buyer: $("#buyer").val(),
                exdo: $("#exdo").val(),
                port: $("#port").val(),
                country: $("#country").val(),
                alamat: $("#alamat").val(),
                desa: $("#desa").val(),
                kecamatan: $("#kecamatan").val(),
                kab_kota: $("#kab_kota").val(),
                propinsi: $("#propinsi").val(),
                kodepos: $("#kodepos").val(),
                npwp: $("#npwp").val(),
                telp: $("#telp").val(),
                email: $("#email").val(),
                kontak: $("#kontak").val(),
                keterangan: $("#keterangan").val(),
                buycode: $("#buycode").val(),
                inscode: $("#inscode").val(),
                jcode1: $("#jcode1").val(),
                jcode2: $("#jcode2").val(),
                benua: $("#benua").val(),
                region: $("#region").val(),
                kode_negara: $("#kode_negara").val(),
                pembeli: pembeli,
                cust_id: $("#cust_id").val(),
                jns_pkp: $("#jns_pkp").val(),
                nik: $("#nik").val()
            },
            success: function(data) {
                window.location.reload();

            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        })
    })
</script>
