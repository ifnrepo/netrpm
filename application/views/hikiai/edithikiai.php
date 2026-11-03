<!-- Page header -->
<div class="page-header d-print-none m-2">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Hikiai
                </div>
                <h2 class="page-title">
                    Edit Hikiai
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
                        <div class="card">
                            <div class="card-body p-1 bg-azure-lt">
                                <div class="div text-dark">
                                    <div class="d-flex">
                                        <h5 class="my-1">Detail Hikiai</h5>
                                        <div class="ms-auto">
                                            <a href="<?= base_url().'hikiai/adddetailhikiai/'.$data['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Add detail Hikiai" class="btn btn-sm btn-primary font-10">Tambah detail</a>
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
                                                        <td class="font-kecil">#<?= $dtd['item'] ?></td>
                                                        <td class="font-kecil line-11"><span class="font-10 text-pink"><?= $dtd['kode'] ?></span><br><?= $dtd['spesifikasi'] ?></td>
                                                        <td class="font-kecil"><?= $dtd['kodesatuan'] ?></td>
                                                        <td class="font-kecil text-end"><?= rupiah($dtd['pcs'],0) ?></td>
                                                        <td class="font-kecil text-end"><?= rupiah($dtd['kgs'],2) ?></td>
                                                        <td class="font-kecil text-end"><?= rupiah($dtd['kgs']/$dtd['pcs'],2) ?></td>
                                                        <td class="font-kecil text-center no-wrap">
                                                            <a href="<?= base_url().'hikiai/editdetailhikiai/'.$dtd['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Edit detail Hikiai" class="btn btn-sm btn-primary font-10">Edit</a>
                                                            <a href="#" data-href="<?= base_url().'hikiai/hapusdetailhikiai/'.$dtd['id'].'/'.$dtd['id_hikiai'] ?>" data-bs-toggle="modal" data-bs-target="#modal-danger" data-message="Akan menghapus data ini" class="btn btn-sm btn-danger font-10">Hapus</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center font-kecil">-- Data tidak ditemukan/Kosong --</td>
                                                    </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <hr class="m-1">
                                    <div class="d-flex mt-2">
                                        <h5 class="my-1">Remark</h5>
                                        <div class="ms-auto">
                                        </div>
                                    </div>
                                    <table id="tabelnya" class="table table-hover table-bordered cell-border mt-0 mb-0" style="width: 100% !important; border-collapse: collapse;"> <!-- table order-column table-hover table-bordered cell-border -->
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="row">
                                                        <div class="col-6"><?= $data['remark_1'] ?></div>
                                                        <div class="col-6 text-end">
                                                            <a href="<?= base_url().'hikiai/addremark/1/'.$data['id'] ?>"  data-bs-toggle="modal" data-bs-target="#modal-large-loading" class="btn btn-smx bg-red text-white font-10">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil mx-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="row">
                                                        <div class="col-6"><?= $data['remark_2'] ?></div>
                                                        <div class="col-6 text-end">
                                                            <a href="<?= base_url().'hikiai/addremark/2/'.$data['id'] ?>"  data-bs-toggle="modal" data-bs-target="#modal-large-loading" class="btn btn-smx bg-red text-white font-10">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil mx-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="row">
                                                        <div class="col-6"><?= $data['remark_3'] ?></div>
                                                        <div class="col-6 text-end">
                                                            <a href="<?= base_url().'hikiai/addremark/3/'.$data['id'] ?>"  data-bs-toggle="modal" data-bs-target="#modal-large-loading" class="btn btn-smx bg-red text-white font-10">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil mx-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="row">
                                                        <div class="col-6"><?= $data['remark_4'] ?></div>
                                                        <div class="col-6 text-end">
                                                            <a href="<?= base_url().'hikiai/addremark/4/'.$data['id'] ?>"  data-bs-toggle="modal" data-bs-target="#modal-large-loading" class="btn btn-smx bg-red text-white font-10">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil mx-0"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-tbody" id="body-table-dethik" style="font-size: 13px !important; width: 100% !important;">
                                            <tr>
                                                <td class="font-kecil" style="white-space: pre-line;"><?= $data['remark_teks_1'] ?></td>
                                                <td class="font-kecil" style="white-space: pre-line;"><?= $data['remark_teks_2'] ?></td>
                                                <td class="font-kecil" style="white-space: pre-line;"><?= $data['remark_teks_3'] ?></td>
                                                <td class="font-kecil" style="white-space: pre-line;"><?= $data['remark_teks_4'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="m-1">
                <div class="text-end">
                    <a href="#" data-href="<?= base_url().'hikiai/simpandatahikiai/'.$data['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-info" data-title="Informasi" data-message="Akan menyimpan data ini" class="btn btn-sm btn-primary font-kecil"> Simpan Transaksi</a>
                    <a href="#" data-href="<?= base_url().'hikiai/resetdetailhikiai/'.$data['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-info" data-title="Informasi" data-message="Akan mereset data detail" class="btn btn-sm btn-danger font-kecil"> Reset Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>