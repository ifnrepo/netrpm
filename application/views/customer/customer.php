<!-- Page header -->
<div class="page-header d-print-none m-2">
    <div class="container-xl">
    <div class="row g-2 align-items-center">
        <div class="col">
        <div class="page-pretitle">
            Master Data
        </div>
        <h2 class="page-title">
            Customer
        </h2>
        </div>
    </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body mt-2">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <div class="card card-active">
                    <div class="card-body font-kecil p-2">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <label class="col-2 col-form-label">Tipe</label>
                                    <div class="col">
                                        <!-- <div class="input-group mb-2"> -->
                                            <select id="select-tipe" name="select-tipe" class="form-select form-control font-kecil">
                                                <option value="">All</option>
                                                <option value="Domestic" <?php if($this->session->userdata('select-tipe')=='Domestic'){ echo "selected"; } ?>>Domestic</option>
                                                <option value="Export" <?php if($this->session->userdata('select-tipe')=='Export'){ echo "selected"; } ?>>Export</option>
                                            </select>
                                            <!-- <button class="btn btn-primary font-kecil" type="button" title="Add Tipe Produk">Add</button> -->
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4 d-flex">
                                <div class="ms-auto">
                                    <?php $cekdisable = $this->session->userdata('select-tipe')!='' ? '' : 'disabled'; ?>
                                    <a href="<?= base_url().'customer/addcustomer' ?>" class="btn btn-sm btn-primary font-kecil <?= $cekdisable ?>" id="btntambahdata" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Add Customer"><i class="fa-solid fa-plus fa-xl"></i> Tambah Customer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="row mt-1 font-kecil">
                            <label class="col-3 col-form-label">Per-page</label>
                            <div class="col">
                                <select id="perpage-customer" name="perpage-customer" class="form-select font-kecil">
                                    <option value="15" <?php if($this->session->userdata('perpage-customer')==15){ echo "selected"; } ?>>15</option>
                                    <option value="25" <?php if($this->session->userdata('perpage-customer')==25){ echo "selected"; } ?>>25</option>
                                    <option value="50" <?php if($this->session->userdata('perpage-customer')==50){ echo "selected"; } ?>>50</option>
                                    <option value="75" <?php if($this->session->userdata('perpage-customer')==75){ echo "selected"; } ?>>75</option>
                                    <option value="100" <?php if($this->session->userdata('perpage-customer')==100){ echo "selected"; } ?>>100</option>
                                </select>
                            </div>
                            <div class="col">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ms-auto">
                        
                    </div>
                    <div class="col-3 text-end">
                        <div class="input-group mt-1">
                            <input type="text" class="form-control font-kecil" id="textcaricustomer" placeholder="Search for…" value="<?= $this->session->userdata('cari-customer') ?>">
                            <button class="btn btn-success font-kecil" id="btncaricustomer" type="button">Cari !</button>
                        </div>
                    </div>
                </div>
                <table id="tabelnya" class="table table-hover table-bordered cell-border mt-2" style="width: 100% !important; border-collapse: collapse;"> <!-- table order-column table-hover table-bordered cell-border -->
                    <thead>
                        <tr>
                            <!-- <th>Tgl</th> -->
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Buyer</th>
                            <th>Alamat</th>
                            <th>Negara</th>
                            <th class="text-nowrap">Other</th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody" id="body-table" style="font-size: 13px !important; width: 100% !important;">
                        <?php if($data->num_rows() > 0): ?>
                            <?php $no= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; foreach($data->result_array() as $dt): $no++; $port = $dt['port']!='' ? '-'.$dt['port'] : ''; ?>
                                <tr>
                                    <td class="font-kecil"><?= $no ?></td>
                                    <td class="font-kecil line-11"><span class="font-10 text-cyan"><?= $dt['kode_customer'] ?><br></span><?= $dt['nama_customer'].$port ?></td>
                                    <td class="font-kecil"><?= $dt['buyer'] ?></td>
                                    <td class="font-kecil"><?= $dt['alamat'] ?></td>
                                    <td class="font-kecil line-11"><?= $dt['kode_negara'] ?><br><span class="font-10 text-muted"><?= $dt['uraian_negara'] ?></span></td>
                                    <td class="font-kecil text-center text-nowrap">
                                        <a href="<?= base_url().'customer/editdata/'.$dt['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Edit customer" class="btn btn-primary btn-flat py-1 font-10">Edit</a>
                                        <a href="#" data-href="<?= base_url().'customer/hapusdata/'.$dt['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-danger" data-message="Akan menghapus data ini" class="btn btn-danger btn-flat py-1 font-10">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center font-kecil">-- Data tidak Ada --</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-between mt-1">
                    <div class="mt-1 font-kecil">
                        Jumlah Record <?= rupiah($jumlahrek,0) ?>
                    </div>
                    <div class="font-kecil">
                        <?= $links; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>