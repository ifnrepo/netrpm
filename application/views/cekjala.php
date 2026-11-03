
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
                    Pengecekan Jala Netting
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
                <div class="d-none d-sm-block">
                    <div class="d-flex">
                        <div class="ms-auto mb-1">
                            <a href="<?= base_url().'cekjala/clearrepcek' ?>" class="btn btn-sm btn-primary">View Report CekJala</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-12 mb-1">
                        <div class="bg-orange p-1 mb-1 text-center"><span class="text-black">Informasi Tgl + Mesin</span></div>
                        <div class="card btn-flat font-kecil">
                            <div class="card-body p-2">
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">Tgl</label>
                                    <div class="col">
                                        <input type="text" class="form-control font-kecil tgl" id="tgl" aria-describedby="emailHelp"  placeholder="dd-mm-YYYY" value="<?= $this->session->userdata('tglcek') ?>">
                                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                                    </div>
                                </div>
                                <hr class="m-1">
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">No Mesin</label>
                                    <div class="col">
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control font-kecil" id="mach_no" placeholder="Cari Mesin" value="<?= $this->session->userdata('msncek') ?>" readonly>
                                            <?php if($this->session->userdata('msncek')==''): ?>
                                                <a href="<?= base_url().'cekjala/getmesin' ?>" class="btn btn-success font-kecil" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari mesin Netting">Cari!</a>
                                                <?php else: ?>
                                                    <a href="#" data-href="<?= base_url().'cekjala/resetmsn' ?>" class="btn btn-danger font-kecil" data-bs-toggle="modal" data-bs-target="#modal-danger" data-tombol="Reset" data-message="Akan Reset data Mesin">Reset !</a>
                                                    <a href="<?= base_url().'cekjala/getmesin' ?>" class="btn btn-success font-kecil" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari mesin Netting">Ganti</a>
                                            <?php endif; ?>
                                            <!-- <small class="form-hint text-green">We'll never share your email with anyone else.</small> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">Ket</label>
                                    <div class="col">
                                        <textarea name="ketmesin" id="ketmesin" class="form-control font-kecil" readonly><?= datamesin($this->session->userdata('msncek')) ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil py-0 mt-2">Shift Kerja</label>
                                    <div class="col">
                                        <div class="row g-2">
                                            <div class="col">
                                                <select name="shiftkerja" id="shiftkerja" class="form-control font-kecil form-select">
                                                    <option value="">Pilih</option>
                                                    <option value="M" <?php if($this->session->userdata('shiftcek')=='M'){ echo "selected"; } ?>>Malam</option>
                                                    <option value="P" <?php if($this->session->userdata('shiftcek')=='P'){ echo "selected"; } ?>>Pagi</option>
                                                    <option value="S" <?php if($this->session->userdata('shiftcek')=='S'){ echo "selected"; } ?>>Siang</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        <a href="#" class="form-control btn btn-success font-kecil" id="cekcek" aria-label="Button">
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
                                    <label class="col-md-3 col-12 col-form-label font-kecil mb-0 py-0 mt-2">Operator Cek Jala</label>
                                    <div class="col">
                                        <div class="input-group mb-0">
                                            <?php $datapersonil1 = $this->session->userdata('nikcek')=='' ? '' : trim(datauser($this->session->userdata('nikcek'))).' ('.datauser($this->session->userdata('nikcek'),'noinduk').')'; ?>
                                            <input type="text" class="form-control font-kecil" placeholder="Cari Operator 1" value="<?= $datapersonil1 ?>" readonly>
                                            <?php if($this->session->userdata('nikcek')==''): ?>
                                                <a href="<?= base_url().'cekjala/getpersonil/1' ?>" class="btn btn-orange font-kecil" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari Operator"><span class="text-black">Operator</span></a>
                                            <?php else: ?>
                                                <a href="#" data-href="<?= base_url().'cekjala/resetpersonil/1' ?>" class="btn btn-danger font-kecil" data-bs-toggle="modal" data-bs-target="#modal-danger" data-message="Akan reset Operator" data-tombol="Reset" data-title="Cari Operator"><span class="text-white">Reset !</span></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <hr class="m-1">
                        <div class="bg-cyan-lt p-1 mb-1 d-flex justify-content-between"><span class="text-black">Data Cek Jala</span><span class="text-right font-kecil"><a href="./cekjala">Refresh</a></span></div>
                        <div class="card btn-flat font-kecil">
                            <div class="card-body p-2">
                                <?php $muncul = $this->session->userdata('msncek')!='' && $this->session->userdata('shiftcek')!='' ? '' : 'hilang' ; ?>
                                <div class="d-flex justify-content-center align-items-center <?php if($muncul==''){echo "hilang"; } ?>" style="height: 100px;">
                                    Pilih Tgl, Mesin, Shift Kerja dan Operator Cek  <span class="text-pink m-1">(Klik APPLY)</span>
                                </div>
                                <div id="tabelrpm" class="<?= $muncul ?>">
                                    <div class="text-end">
                                        <a href="<?= base_url().'cekjala/tambahdata' ?>" class="btn btn-smx btn-primary font-kecil btn-flat" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari PO/Instruksi">Tambah</a>
                                    </div>
                                    <hr class="m-1">
                                    <div class="row">
                                        <div class="col-md-6 col-12 ">
                                            <div class="mb-1 row hilang">
                                                <label class="col-3 col-form-label font-kecil text-end">Periode</label>
                                                <div class="col-6">
                                                    <select class="form-control form-select font-kecil" id="bulancek">
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
                                                    <select class="form-control form-select font-kecil" id="tahuncek">
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
                                                    <div class="input-group mb-0">
                                                        <input type="text" class="form-control font-kecil" id="caricek" placeholder="Cari ...." value="<?= $this->session->userdata('caricek') ?>">
                                                        <a href="#" id="butcaricek" class="btn btn-success font-kecil">Go</a>
                                                    </div>
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
                                                    <th class="text-center text-black">Status</th>
                                                    <th class="text-center text-black">Keterangan</th>
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
                                                    <?php $ketcek = strlen(trim($dt['ketcek'])) > 35 ? substr($dt['ketcek'],0,35).'...' : $dt['ketcek']; ?>
                                                    <?php $lote = $dt['lotcek']!=0 ? 'Lot Ke-'.trim($dt['lotcek']) : ''; ?>
                                                        <tr class="font-11 text-nowrap">
                                                            <td><?= tglmysql($dt['tgl']) ?></td>
                                                            <td class="text-center font-bold text-cyan"><?= $dt['waktu'] ?></td>
                                                            <td class="line-11"><span class="text-pink font-10"><?= $sku ?></span><br><?= $dt['insno'] ?></td>
                                                            <td class="text-center"><?= $dt['mach_no'] ?></td>
                                                            <!-- <td class="text-center font-bold font-12"><span class="text-primary">OK</span> / <span class="text-pink">NG</span> / <span class="text-yellow">SA</span></td> -->
                                                            <td class="text-center font-bold font-11"><?= $lote ?></td>
                                                            <td class="line-11"><?= $ketcek.'<br><span class="text-cyan">'.datauser($dt['noinduk_cek']).'</span>' ?></td>
                                                            <td class="text-center">
                                                                <a href="<?= base_url().'cekjala/viewdata/'.$dt['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="View Data" class="text-primary">View</a> |
                                                                <a href="<?= base_url().'cekjala/editdata/'.$dt['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Edit Data">Edit</a> |
                                                                <a href="#" data-href="<?= base_url().'cekjala/hapusdata/'.$dt['id'] ?>" class="text-pink" data-bs-toggle="modal" data-bs-target="#modal-danger" data-message="Anda akan menghapus data ini">Hapus</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td class="font-kecil text-kecil text-center" colspan="8">-- Data Kosong --</td>
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
