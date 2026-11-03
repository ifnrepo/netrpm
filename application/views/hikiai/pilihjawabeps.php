<div class="container-xl">
    <div class="card">
        <div class="card-body p-2">
            <input type="text" class="hilang" name="idjawab" id="idjawab" value="<?= $id ?>">
            <input type="text" class="hilang" name="idhikiai" id="idhikiai" value="<?= $hik ?>">
            <div class="font-kecil text-center">
                <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radios-inline" value="1"  checked>
                    <span class="form-check-label">PO</span>
                </label>
                <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radios-inline" value="2" >
                    <span class="form-check-label">Cancel/Reschedule</span>
                </label>
                <hr class="m-0">
                <div class="my-2 row">
                    <label class="col-3 col-form-label">Keterangan</label>
                    <div class="col">
                        <textarea name="ketr" id="ketr" class="form-control font-kecil" rows="6"></textarea>
                    </div>
                </div>
            </div>
            <hr class="m-1">
            <div class="text-end">
                <a href="#" class="btn btn-sm btn-success font-kecil" id="simpandatajawab">Simpan</a>
                <a href="#" class="btn btn-sm btn-danger font-kecil" data-bs-dismiss="modal">Batal</a>
            </div>
        </div>
    </div>
</div>
<script>
    $("#simpandatajawab").click(function(){
        var stat = $('input[name="radios-inline"]:checked').val();
        $.ajax({
            dataType: "json",
            type: "POST",
            url: base_url + "hikiai/simpandetailjawabeps",
            data: {
                id: $("#idjawab").val(),
                stathik: stat,
                kete: $("#ketr").val()
            },
            success: function (data) {
                // alert(data);
                window.location.href = base_url+'hikiai/viewhitunghikiai/'+$("#idhik").val();
                // $("#ukuran-benang").html(data.hasil).show();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            },
        });
    })
</script>