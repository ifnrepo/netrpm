<!-- Page header -->
<div class="page-header d-print-none m-2">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Hikiai
                </div>
                <h2 class="page-title">
                    View Hasil Hitung
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="ms-auto">
                    <a href="<?= base_url().'hikiai' ?>" class="btn btn-sm btn-primary font-kecil"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l14 0" /><path d="M5 12l4 4" /><path d="M5 12l4 -4" /></svg> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body mt-2">
    <div class="container-xl">
        <div class="card">
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-3">
                        <h5 class="my-1">Data Hikiai</h5>
                        <input type="text" name="idhik" id="idhik" class="hilang" value="<?= $data['id'] ?>">
                        <div class="card">
                            <div class="card-body p-1">
                                <div class="mb-0">
                                    <label class="form-label font-kecil mb-0 ">Tgl/Kode</label>
                                    <input type="text" class="form-control font-kecil text-uppercase font-bold mt-0" name="example-text-input" value="<?= $data['kode'].' ( '.tglmysql($data['tgl_hikiai']).' )' ?>">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label font-kecil mb-0">Nomor</label>
                                    <input type="text" name="nomor" id="nomor" class="form-control font-kecil text-uppercase font-bold mt-0" value="<?= $data['nomor'] ?>">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label font-kecil mb-0">Customer</label>
                                    <input type="text" name="nomor" id="nomor" class="form-control font-kecil mt-0" value="<?= $data['nama_customer'] ?>">
                                    <textarea class="form-control font-kecil mt-1"><?= $data['alamat'] ?></textarea>
                                </div>
                                <div class="mt-1">
                                    <label class="form-label font-kecil mb-0">Kepada</label>
                                    <input type="text" name="nomor" id="nomor" class="form-control font-kecil mt-0" value="<?= $data['kepada'] ?>">
                                </div>
                                <div class="mt-1">
                                    <label class="form-label font-kecil mb-0">Perihal</label>
                                    <input type="text" name="nomor" id="nomor" class="form-control font-kecil mt-0" value="<?= $data['perihal'] ?>">
                                </div>
                                <div class="mt-1">
                                    <label class="form-label font-kecil mb-0">Keterangan</label>
                                    <textarea class="form-control font-kecil mt-0" rows="6"><?= $data['remark'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card mb-1">
                            <div class="card-body p-1 bg-yellow-lt">
                                <div class="text-dark font-kecil">
                                    <table class="table table-bordered m-0">
                                        <!-- <thead class="bg-primary-lt">
                                            <tr>
                                                <th class="text-center text-black">Tgl/Kode</th>
                                                <th class="text-center text-black">Nomor</th>
                                                <th class="text-center text-black">Customer</th>
                                                <th class="text-center text-black">Perihal</th>
                                                <th class="text-center text-black">Status</th>
                                            </tr>
                                        </thead> -->
                                        <tbody class="table-tbody">
                                            <?php if(trim($data['remark_1'])!='' || trim($data['remark_2'])!='' || trim($data['remark_3'])!='' || trim($data['remark_4'])!=''): ?>
                                                <tr>
                                                    <td class="font-kecil font-bold text-end"><?= $data['remark_1'] ?></td>
                                                    <td class="font-kecil font-10 line-11" style="white-space: pre-line;"><?= $data['remark_teks_1'] ?></td>
                                                    <td class="font-kecil font-bold text-end"><?= $data['remark_2'] ?></td>
                                                    <td class="font-kecil font-10 line-11" style="white-space: pre-line;"><?= $data['remark_teks_2'] ?></td>
                                                </tr>
                                                <tr> 
                                                    <td class="font-kecil font-bold text-end"><?= $data['remark_3'] ?></td>
                                                    <td class="font-kecil font-10 line-11" style="white-space: pre-line;"><?= $data['remark_teks_3'] ?></td>
                                                    <td class="font-kecil font-bold text-end"><?= $data['remark_4'] ?></td>
                                                    <td class="font-kecil font-10 line-11" style="white-space: pre-line;"><?= $data['remark_teks_4'] ?></td>
                                                </tr>
                                            <?php else: ?>
                                                <tr>
                                                    <td class="font-kecil text-center">-- Tidak ada Catatan Untuk Hikiai Ini--</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body p-1 bg-azure-lt">
                                <div class="div text-dark">
                                    <div class="d-flex">
                                        <h5 class="my-1">Detail Hikiai</h5>
                                        <div class="ms-auto">
                                        </div>
                                    </div>
                                    <hr class="m-1">
                                    <table id="tabelnya" class="table table-hover table-bordered cell-border mt-1 mb-0" style="width: 100% !important; border-collapse: collapse;"> <!-- table order-column table-hover table-bordered cell-border -->
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Sku/Spesifikasi</th>
                                                <th>Unit</th>
                                                <th>Pcs</th>
                                                <th>Kgs</th>
                                                <th>Kgs/Pcs</th>
                                                <th>Act</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-tbody" id="body-table-dethik" style="font-size: 13px !important; width: 100% !important;">
                                            <?php if($datadetail->num_rows() > 0): ?>
                                                <?php $no=0; foreach($datadetail->result_array() as $dtd): $no++; ?>
                                                    <tr>
                                                        <td class="font-kecil" rowspan="">#<?= $dtd['item'] ?></td>
                                                        <td class="font-kecil line-11"><span class="font-10 text-pink"><?= $dtd['kode'] ?></span><br><?= $dtd['spesifikasi'] ?></td>
                                                        <td class="font-kecil"><?= $dtd['kodesatuan'] ?></td>
                                                        <td class="font-kecil text-end"><?= rupiah($dtd['pcs'],0) ?></td>
                                                        <td class="font-kecil text-end"><?= rupiah($dtd['kgs'],2) ?></td>
                                                        <td class="font-kecil text-end"><?= rupiah($dtd['kgs']/$dtd['pcs'],2) ?></td>
                                                        <td class="font-kecil text-center no-wrap font-bold text-red"><?= limitmp($dtd['tgl_dt']) ?></td>
                                                    </tr>
                                                    <?php foreach($dataeps->result_array() as $deps): if($deps['id_hikiai_detail']==$dtd['id']): ?>
                                                        <tr>
                                                            <td></td>
                                                            <td class="font-10 line-11" colspan="6">
                                                                <div style="float: left;">
                                                                    <span class="font-bold bg-yellow-lt"><span class="text-black">EPS NOTE</span></span><br>
                                                                    Mach No.<span class="text-red font-10"><?= $deps['machno'] ?></span><br>
                                                                    Net Prod. <span class="text-red font-10"><?= tglmysql($deps['tgl_mulai']).' s/d '.tglmysql($deps['tgl_akhir']) ?></span><span class="font-10 text-primary"> (<?= hitunghari($deps['tgl_mulai'],$deps['tgl_akhir']) ?> Hari)</span><br>
                                                                    Est Masuk Gudang. <span class="text-red font-10"><?= tglmysql($deps['tgl_kirim_gudang']) ?></span><br>
                                                                </div>
                                                                <div class="text-end" style="float: right;">
                                                                    <?php if($deps['stat']==0): ?>
                                                                    <a href="<?= base_url().'hikiai/jawabeps/'.$deps['id'].'/'.$data['id'] ?>" class="btn btn-smx btn-success btn-flat font-10" data-bs-toggle="modal" data-bs-target="#modal-simple" data-title="Jawab EPS">Jawab EPS</a>
                                                                    <?php elseif($deps['stat']==1): ?>
                                                                        <span class="badge bg-blue text-blue-fg">Setuju PO</span><br>
                                                                        <span><?= $deps['ket_stat'] ?></span>
                                                                    <?php else: ?>
                                                                        <span class="badge badge-outline text-red">Cancel</span><br>
                                                                        <span><?= $deps['ket_stat'] ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endif; endforeach; ?>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center font-kecil">-- Data tidak ditemukan/Kosong --</td>
                                                    </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end <?php if($data['status_hikiai']>=5 && $data['status_hitung']==2){ echo "hilang"; } ?>">
                    <hr class="m-1">
                    <a href="#" data-href="<?= base_url().'hikiai/simpandatajawabeps/'.$data['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-info" data-title="Informasi" data-message="Akan menyimpan data ini" class="btn btn-sm btn-primary font-kecil"> Simpan Data Jawab EPS</a>
                    <a href="#" data-href="<?= base_url().'hikiai/resetdatajawabeps/'.$data['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-danger" data-tombol="Reset" data-title="Informasi" data-message="Akan mereset data detail" class="btn btn-sm btn-danger font-kecil"> Reset Data Jawab EPS</a>
                </div>
            </div>
        </div>
    </div>
</div>