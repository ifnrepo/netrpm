
<!-- Page header -->
<div class="page-header d-print-none m-2">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Input
                </div>
                <h2 class="page-title">
                    Potong Jala Netting
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
            
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
                    <div class="col-sm-4 col-12 mb-1">
                        <div class="bg-orange p-1 mb-1 text-center"><span class="text-black">Informasi Tgl + Mesin</span></div>
                        <div class="card btn-flat font-kecil">
                            <div class="card-body p-2">
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">Tgl</label>
                                    <div class="col">
                                        <input type="text" class="form-control font-kecil tgl" id="tgl" aria-describedby="emailHelp"  placeholder="dd-mm-YYYY" value="<?= $this->session->userdata('tglpot') ?>">
                                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                                    </div>
                                </div>
                                <hr class="m-1">
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">No Mesin</label>
                                    <div class="col">
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control font-kecil" id="mach_no" placeholder="Cari Mesin" value="<?= $this->session->userdata('msnpot') ?>" readonly>
                                            <?php if($this->session->userdata('msnpot')==''): ?>
                                                <a href="<?= base_url().'potjala/getmesin' ?>" class="btn btn-success font-kecil" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari mesin Netting">Cari!</a>
                                            <?php else: ?>
                                                <a href="#" data-href="<?= base_url().'potjala/resetmsn' ?>" class="btn btn-danger font-kecil" data-bs-toggle="modal" data-bs-target="#modal-danger" data-tombol="Reset" data-message="Akan Reset data Mesin">Reset !</a>
                                            <?php endif; ?>
                                            <!-- <small class="form-hint text-green">We'll never share your email with anyone else.</small> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">Ket</label>
                                    <div class="col">
                                        <textarea name="ketmesin" id="ketmesin" class="form-control font-kecil" readonly><?= datamesin($this->session->userdata('msnpot')) ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil py-0 mt-2">Shift Kerja</label>
                                    <div class="col">
                                        <div class="row g-2">
                                            <div class="col">
                                                <select name="shiftkerja" id="shiftkerja" class="form-control font-kecil form-select">
                                                    <option value="">Pilih</option>
                                                    <option value="M" <?php if($this->session->userdata('shiftpot')=='M'){ echo "selected"; } ?>>Malam</option>
                                                    <option value="P" <?php if($this->session->userdata('shiftpot')=='P'){ echo "selected"; } ?>>Pagi</option>
                                                    <option value="S" <?php if($this->session->userdata('shiftpot')=='S'){ echo "selected"; } ?>>Siang</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        <a href="#" class="form-control btn btn-success font-kecil" id="cekpot" aria-label="Button">
                                            Apply
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-12 mb-1">
                        <div class="bg-cyan p-1 mb-1 text-center"><span class="text-black">Informasi Operator</span></div>
                        <div class="card btn-flat font-kecil">
                            <div class="card-body p-2">
                                <div class="mb-1 row">
                                    <label class="col-md-3 col-12 col-form-label font-kecil mb-0 py-0 mt-2">Operator Pot Jala</label>
                                    <div class="col">
                                        <div class="input-group mb-0">
                                            <?php $datapersonil1 = $this->session->userdata('nikpot')=='' ? '' : trim(datauser($this->session->userdata('nikpot'))).' ('.datauser($this->session->userdata('nikpot'),'noinduk').')'; ?>
                                            <input type="text" class="form-control font-kecil" placeholder="Cari Operator 1" value="<?= $datapersonil1 ?>" readonly>
                                            <?php if($this->session->userdata('nikpot')==''): ?>
                                                <a href="<?= base_url().'potjala/getpersonil/1' ?>" class="btn btn-orange font-kecil" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari Operator"><span class="text-black">Operator</span></a>
                                            <?php else: ?>
                                                <a href="#" data-href="<?= base_url().'potjala/resetpersonil/1' ?>" class="btn btn-danger font-kecil" data-bs-toggle="modal" data-bs-target="#modal-danger" data-message="Akan reset Operator" data-tombol="Reset" data-title="Cari Operator"><span class="text-white">Reset !</span></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <hr class="m-1">
                        <div class="bg-cyan-lt p-1 mb-1 d-flex justify-content-between"><span class="text-black">Data Potong Jala</span><span class="text-right font-kecil"><a href="./potjala">Refresh</a></span></div>
                        <div class="card btn-flat font-kecil">
                            <div class="card-body p-2">
                                <?php $muncul = $this->session->userdata('msnpot')!='' && $this->session->userdata('shiftpot')!='' ? '' : 'hilang' ; ?>
                                <div class="d-flex justify-content-center align-items-center <?php if($muncul==''){echo "hilang"; } ?>" style="height: 100px;">
                                    Pilih Tgl, Mesin, Shift Kerja dan Operator Potong  <span class="text-pink m-1">(Klik APPLY)</span>
                                </div>
                                <div id="tabelrpm" class="<?= $muncul ?>">
                                    <div class="text-end">
                                        <a href="<?= base_url().'potjala/tambahdata' ?>" class="btn btn-smx btn-primary font-kecil btn-flat" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari Instruksi">Tambah</a>
                                    </div>
                                    <hr class="m-1">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1 row">
                                                <label class="col-3 col-form-label font-kecil text-end">Periode</label>
                                                <div class="col-6">
                                                    <select class="form-control form-select font-kecil" id="bulanpotong">
                                                        <option value="">Semua Bulan</option>
                                                        <option value="">Januari</option>
                                                        <option value="">Februari</option>
                                                        <option value="">Maret</option>
                                                        <option value="">April</option>
                                                        <option value="">Mei</option>
                                                        <option value="">Juni</option>
                                                        <option value="">Juli</option>
                                                        <option value="">Agustus</option>
                                                        <option value="">September</option>
                                                        <option value="">Oktober</option>
                                                        <option value="">Nopember</option>
                                                        <option value="">Desember</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <select class="form-control form-select font-kecil" id="tahunpotong">
                                                        <option value="">All</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2025">2025</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1 row">
                                                <label class="col-3 col-form-label font-kecil text-end">Cari</label>
                                                <div class="col">
                                                    <input type="text" class="form-control font-kecil" id="caripotong" aria-describedby="emailHelp"  placeholder="Cari ..." value="">
                                                    <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 overflow-auto">
                                        <table class="table table-bordered table-hover m-0">
                                            <thead class="bg-primary-lt">
                                                <tr>
                                                    <th class="text-center text-black">Tgl</th>
                                                    <th class="text-center text-black">Waktu</th>
                                                    <th class="text-center text-black">SKU</th>
                                                    <th class="text-center text-black">Mesin</th>
                                                    <th class="text-center text-black">Lot</th>
                                                    <th class="text-center text-black">Act</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-tbody">
                                                <!-- <tr class="font-11 text-nowrap">
                                                    <td>01-10-2026</td>
                                                    <td class="text-center font-bold text-cyan">10:00 ~ 11:00</td>
                                                    <td class="line-11"><span class="text-pink font-10">KI-1228#1-1</span><br>TI 1228</td>
                                                    <td class="text-center">28</td>
                                                    <td>1 ~ 3</td>
                                                    <td class="text-center">
                                                        <a href="#">Edit</a> |
                                                        <a href="#" class="text-pink">Hapus</a>
                                                    </td>
                                                </tr> -->
                                                <?php if($data->num_rows() > 0): ?>
                                                    <?php foreach($data->result_array() as $dt): $sku = viewsku($dt['po'],$dt['item'],$dt['dis']); ?>
                                                        <tr class="font-11 text-nowrap">
                                                            <td><?= tglmysql($dt['tgl']) ?></td>
                                                            <td class="text-center font-bold text-cyan"><?= $dt['waktu'] ?></td>
                                                            <td class="line-11"><span class="text-pink font-10"><?= $sku ?></span><br><?= $dt['insno'] ?></td>
                                                            <td class="text-center"><?= $dt['mach_no'] ?></td>
                                                            <td class="line-11"><?= $dt['lot_awal'] ?> ~ <?= $dt['lot_akhir'].'<br><span class="text-cyan">'.datauser($dt['noinduk_pj']).'</span>' ?></td>
                                                            <td class="text-center">
                                                                <a href="<?= base_url().'potjala/editdata/'.$dt['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Edit Potong Jala">Edit</a> |
                                                                <a href="#" data-href="<?= base_url().'potjala/hapusdata/'.$dt['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-danger" data-message="Akan menghapus data ini ?"  class="text-pink">Hapus</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td class="font-kecil text-kecil text-center" colspan="6">-- Data Kosong --</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
