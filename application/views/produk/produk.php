<!-- Page header -->
<div class="page-header d-print-none m-2">
    <div class="container-xl">
    <div class="row g-2 align-items-center">
        <div class="col">
        <div class="page-pretitle">
            Master Data
        </div>
        <h2 class="page-title">
            Produk
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
                                                <?php foreach($katproduk->result_array() as $katg): $selek = $this->session->userdata('select-tipe')==$katg['kategori_id'] ? 'selected' : ''; ?>
                                                    <option value="<?= $katg['kategori_id'] ?>" <?= $selek ?>><?= $katg['nama_kategori'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <!-- <button class="btn btn-primary font-kecil" type="button" title="Add Tipe Produk">Add</button> -->
                                        <!-- </div> -->
                                         <input type="text" class="hilang" id="jnnet" value="<?= $jnnet ?>">
                                         <input type="text" class="hilang" id="kodeoth" value="<?= $kodenet ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4 d-flex">
                                <div class="ms-auto">
                                    <?php $cekdisable = $this->session->userdata('select-tipe')!='' ? '' : 'disabled'; ?>
                                    <a href="<?= base_url().'produk/addproduk' ?>" class="btn btn-sm btn-primary font-kecil <?= $cekdisable ?>" id="btntambahdata" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Add Produk"><i class="fa-solid fa-plus fa-xl"></i> Tambah Produk</a>
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
                                <select id="perpage-produk" name="perpage-produk" class="form-select font-kecil">
                                    <option value="15" <?php if($this->session->userdata('perpage-produk')==15){ echo "selected"; } ?>>15</option>
                                    <option value="25" <?php if($this->session->userdata('perpage-produk')==25){ echo "selected"; } ?>>25</option>
                                    <option value="50" <?php if($this->session->userdata('perpage-produk')==50){ echo "selected"; } ?>>50</option>
                                    <option value="75" <?php if($this->session->userdata('perpage-produk')==75){ echo "selected"; } ?>>75</option>
                                    <option value="100" <?php if($this->session->userdata('perpage-produk')==100){ echo "selected"; } ?>>100</option>
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
                            <input type="text" class="form-control font-kecil" id="textcariproduk" placeholder="Search for…" value="<?= $this->session->userdata('cari-produk') ?>">
                            <button class="btn btn-success font-kecil" id="btncariproduk" type="button">Cari !</button>
                        </div>
                    </div>
                </div>
                <table id="tabelnya" class="table table-hover table-bordered cell-border mt-2" style="width: 100% !important; border-collapse: collapse;"> <!-- table order-column table-hover table-bordered cell-border -->
                    <thead>
                        <tr>
                            <!-- <th>Tgl</th> -->
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Spesifikasi</th>
                            <th>Remark</th>
                            <th>Act</th>
                            <th>Other</th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody" id="body-table" style="font-size: 13px !important; width: 100% !important;">
                        <?php if($data->num_rows() > 0): ?>
                            <?php $no= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; foreach($data->result_array() as $dt): $no++; ?>
                                <tr>
                                    <td class="font-kecil"><?= $no ?></td>
                                    <td class="font-kecil line-11"><span class="font-10 text-cyan"><?= $dt['nama_kategori'] ?><br></span><?= $dt['kode'] ?></td>
                                    <td class="font-kecil"><?= $dt['spesifikasi'] ?></td>
                                    <td class="font-kecil"><?= $dt['keterangan'] ?></td>
                                    <td class="font-10 line-11">dibuat: <?= substr(datauser($dt['dibuat']),0,9).'..' ?><br><span class="font-10 text-muted"><?= tglmysql2($dt['dibuat_pada']) ?></span></td>
                                    <td class="font-kecil text-center text-nowrap">
                                        <a href="<?= base_url().'produk/editdata/'.$dt['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Edit Produk" class="btn btn-primary btn-flat py-1 font-10">Edit</a>
                                        <a href="#" data-href="<?= base_url().'produk/hapusdata/'.$dt['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-danger" data-message="Akan menghapus data ini" class="btn btn-danger btn-flat py-1 font-10">Hapus</a>
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