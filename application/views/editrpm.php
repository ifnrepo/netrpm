
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
                    RPM Mesin
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <a href="<?= base_url().'rpm' ?>" class="btn btn-sm btn-primary">
                    Kembali</a>
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
                                <table class="table table-hover m-0">
                                    <!-- <thead class="bg-primary-lt">
                                        <tr>
                                            <th class="text-center text-black">Tgl</th>
                                            <th class="text-center text-black">Instruksi</th>
                                            <th class="text-center text-black">Rpm</th>
                                            <th class="text-center text-black line-11">Rpm<br>Awal</th>
                                            <th class="text-center text-black line-11">Rpm<br>Akhir</th>
                                            <th class="text-center text-black">Lot</th>
                                            <th class="text-center text-black">PJ</th>
                                            <th class="text-center text-black">Cek</th>
                                            <th class="text-center text-black line-11 ">+ 20<br>Rpm</th>
                                            <th class="text-center text-black">Ket</th>
                                            <th class="text-center text-black">Act</th>
                                        </tr>
                                    </thead> -->
                                    <tbody class="table-tbody">
                                        <tr>
                                            <td>Tgl</td>
                                            <td>:</td>
                                            <td class="font-bold"><?= tglmysql($this->session->userdata('tglrpm')) ?></td>
                                        </tr>
                                        <tr>
                                            <td>No Mesin</td>
                                            <td>:</td>
                                            <td class="font-bold"><?= $this->session->userdata('msnrpm') ?> (<?= datamesin($this->session->userdata('msnrpm')) ?>) - <?= getlokasimesin($this->session->userdata('msnrpm')) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Operator</td>
                                            <td>:</td>
                                            <?php $oprt1 = $this->session->userdata('nikrpm') ? trim(datauser($this->session->userdata('nikrpm'))).' ('.datauser($this->session->userdata('nikrpm'),'noinduk').')' : '-'; ?>
                                            <td class="font-bold"><?= $oprt1 ?></td>
                                        </tr>
                                        <tr>
                                            <td>Operator GR</td>
                                            <td>:</td>
                                            <?php $oprt = $this->session->userdata('personilrpm') ? trim(datauser($this->session->userdata('personilrpm'))).' ('.datauser($this->session->userdata('personilrpm'),'noinduk').')' : '-'; ?>
                                            <td class="font-bold"><?= $oprt ?></td>
                                        </tr>
                                        <tr>
                                            <td>Grup</td>
                                            <td>:</td>
                                            <td class="font-bold"><?= $this->session->userdata('gruprpm') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Shift Kerja</td>
                                            <td>:</td>
                                            <?php $jadwal = $this->session->userdata('shiftrpm')=='M' ? 'MALAM' : ($this->session->userdata('shiftrpm')=='S' ? 'SIANG' : 'PAGI'); ?>
                                            <td class="font-bold"><?= $jadwal ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jam</td>
                                            <td>:</td>
                                            <td class="font-bold"><?= getjamkerjanet($idjam); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-12 mb-1">
                        <div class="bg-cyan p-1 mb-1 text-center"><span class="text-black">Informasi Produksi</span></div>
                        <div class="card btn-flat font-kecil">
                            <div class="card-body p-2">
                                <?php $urlsimpan = $baru=='ya' ? 'simpandata' : 'editdata'; ?>
                                <form action="<?= base_url().'rpm/'.$urlsimpan ?>" method="POST" id="formeditrpm">
                                    <div class="mb-1 row">
                                        <label class="col-3 col-form-label font-kecil">P/O</label>
                                        <div class="col">
                                            <?php $xpo = isset($lastpo['po']) ? $lastpo['po'] : ''; ?>
                                            <?php $xitem = isset($lastpo['item']) ? $lastpo['item'] : ''; ?>
                                            <?php $xdis = isset($lastpo['dis']) ? $lastpo['dis'] : ''; ?>
                                            <?php $xins = isset($lastpo['insno']) ? $lastpo['insno'] : ''; ?>
                                            <?php $xiid = isset($lastpo['id']) ? $lastpo['id'] : ''; ?>
                                            <?php $ket = $baru=='ya' ? [] : (isset($lastpo['ket']) ? explode(' ',$lastpo['ket']) : []); ?>
                                            <input class="hilang" type="text" name="id" id="id" value="<?= $xiid ?>">
                                            <input class="hilang" type="text" name="po" id="po" value="<?= $xpo ?>">
                                            <input class="hilang" type="text" name="item" id="item" value="<?= $xitem ?>">
                                            <input class="hilang" type="text" name="dis" id="dis" value="<?= $xdis ?>">
                                            <input class="hilang" type="text" name="id_waktu" id="id_waktu" value="<?= $idjam ?>">
                                            <input class="hilang" type="text" name="mach_no" id="mach_no" value="<?= $this->session->userdata('msnrpm') ?>">
                                            <input class="hilang" type="text" name="tgl" id="tgl" value="<?= $this->session->userdata('tglrpm') ?>">
                                            <input class="hilang" type="text" name="noinduk_1" id="noinduk_1" value="<?= $this->session->userdata('nikrpm') ?>">
                                            <input class="hilang" type="text" name="noinduk_2" id="noinduk_2" value="<?= $this->session->userdata('personilrpm') ?>">
                                            <input class="hilang" type="text" name="grup" id="grup" value="<?= $this->session->userdata('gruprpm') ?>">
                                            <div class="input-group mb-0">
                                                <?php $po = isset($lastpo['po']) ? viewsku($lastpo['po'],$lastpo['item'],$lastpo['dis']) : ''; ?>
                                                <input type="text" class="form-control font-kecil" id="xpoe" placeholder="P/O" value="<?= $po ?>" readonly>
                                                <a href="<?= base_url().'rpm/getpo' ?>" class="btn btn-orange font-kecil" id="gantipo" type="button" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Pilih PO"><span class="text-black">Ganti P/O</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <label class="col-3 col-form-label font-kecil">Instruksi</label>
                                        <div class="col">
                                            <div class="input-group mb-0">
                                                <?php $insno = isset($lastpo['insno']) ? $lastpo['insno'] : ''; ?>
                                                <input type="text" class="form-control font-kecil" id="insno" name="insno" placeholder="Nomor Instruksi" value="<?= $xins ?>" readonly>
                                                <a href="<?= base_url().'rpm/getpersonil' ?>" class="btn btn-orange font-kecil disabled " data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari Operator GR"><span class="text-black">Ganti No Instruksi</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(getjamkerjanet($idjam)!='SISA'): ?>
                                        <div class="mb-1 row">
                                            <label class="col-3 col-form-label font-kecil">RPM Awal</label>
                                            <div class="col-sm-4 col">
                                                <div class="input-group mb-0">
                                                    <?php $rpmaw = isset($lastpo['rpm_awal']) ? ($lastpo['rpm_awal'] != 0 && $lastpo['lot']==1 ? 0 : rupiah2($lastpo['rpm_awal'])) : ''; ?>
                                                    <input type="text" class="form-control font-kecil text-end inputangka" name="rpm_awal" placeholder="Rpm Awal" value="<?= $rpmaw ?>">
                                                    <!-- <a href="#" class="btn btn-orange font-kecil disabled " data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari Operator GR"><span class="text-black">Ganti Nomor Instruksi</span></a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 row hilang">
                                            <label class="col-3 col-form-label font-kecil">RPM Akhir</label>
                                            <div class="col-sm-4 col">
                                                <div class="input-group mb-0">
                                                    <?php $rpmak = isset($lastpo['rpm_akhir']) ? $lastpo['rpm_akhir'] : ''; ?>
                                                    <input type="text" class="form-control font-kecil text-end inputangka" name="rpm_akhir" placeholder="Rpm Akhir" value="<?= $rpmak ?>">
                                                    <!-- <a href="#" class="btn btn-orange font-kecil disabled " data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari Operator GR"><span class="text-black">Ganti Nomor Instruksi</span></a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 row">
                                            <label class="col-3 col-form-label font-kecil"></label>
                                            <div class="col-sm-4 col">
                                                <label class="form-check mb-0">
                                                    <?php $ceklot = $baru=='ya' ? '' : (isset($lastpo['lot']) ? ($lastpo['lot']==1 ? 'checked' : '') : ''); ?>
                                                    <input class="form-check-input pb-0" type="checkbox" id="tandalot" name="tandalot" <?= $ceklot ?>>
                                                    <span class="form-check-label">Lot<span class="ms-4 text-primary font-10 hilang" id="loadlot">Loading...</span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php if($baru=='ya'): ?>
                                            <div class="mb-1 row hilang" id="kolomnomorlot">
                                                <label class="col-3 col-form-label font-kecil">Nomor Lot</label>
                                                <div class="col-sm-4 col">
                                                    <select name="nomor_lot" id="nomor_lot" class="form-control form-select font-kecil">

                                                    </select>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="mb-1 row " id="kolomnomorlot">
                                                <label class="col-3 col-form-label font-kecil">Nomor Lot</label>
                                                <div class="col-sm-4 col">
                                                    <?php $nomorlot = isset($lastpo['nomor_lot']) ? $lastpo['nomor_lot'] : ''; ?>
                                                    <input type="text" class="form-control font-kecil text-end inputangka" name="nomor_lot" id="nomor_lot" placeholder="Lot" value="<?= rupiah2($nomorlot,0) ?>">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($baru=='ya'): ?>
                                            <div class="mb-1 row hilang" id="kolomnomorlot2">
                                                <label class="col-3 col-form-label font-kecil">Nomor Lot</label>
                                                <div class="col-sm-4 col">
                                                    <select name="nomor_lot2" id="nomor_lot2" class="form-control form-select font-kecil">

                                                    </select>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="mb-1 row " id="kolomnomorlot2">
                                                <label class="col-3 col-form-label font-kecil"></label>
                                                <div class="col-sm-4 col">
                                                    <?php $nomorlot2 = isset($lastpo['nomor_lot2']) ? $lastpo['nomor_lot2'] : ''; ?>
                                                    <input type="text" class="form-control font-kecil text-end inputangka" name="nomor_lot2" id="nomor_lot2" placeholder="Lot" value="<?= rupiah2($nomorlot2,0) ?>">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="mb-1 row">
                                            <label class="col-3 col-form-label font-kecil"></label>
                                            <div class="col-sm-4 col">
                                                <label class="form-check mb-0">
                                                    <input class="form-check-input pb-0" type="checkbox" id="rpmduapuluh" name="rpmduapuluh" >
                                                    <span class="form-check-label">+10 Rpm</span>
                                                </label>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="mb-1 row">
                                            <label class="col-3 col-form-label font-kecil">Sisa</label>
                                            <div class="col-sm-4 col">
                                                <div class="input-group mb-0">
                                                    <?php $sisa = $baru=='ya' ? '' : (isset($lastpo['rpm_akhir']) ? $lastpo['rpm_akhir'] : ''); ?>
                                                    <input type="text" class="form-control font-kecil text-end inputangka" name="sisa" id="sisa" autocomplete="off" placeholder="Rpm Sisa" value="<?= rupiah2($sisa) ?>">
                                                    <!-- <a href="#" class="btn btn-orange font-kecil disabled " data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari Operator GR"><span class="text-black">Ganti Nomor Instruksi</span></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mb-1 row mt-1">
                                        <label class="col-3 col-form-label font-kecil">Perbaikan</label>
                                        <div class="col">
                                            <div class="input-group mb-0">
                                                <select type="text" class="form-select font-kecil" placeholder="" name="rusak-tags[]" id="rusak-tags" value="" multiple>
                                                    <?php foreach($rusak->result_array() as $rsk): ?>
                                                        <option value="<?= $rsk['kode'] ?>" <?php if(in_array($rsk['kode'],$ket)){ echo "selected"; } ?>><?= $rsk['kode'].' - '.$rsk['keterangan_kode'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <label class="col-3 col-form-label font-kecil">Keterangan</label>
                                        <div class="col">
                                            <?php $ketu = $baru=='ya' ? '' : (isset($lastpo['ketrpm']) ? $lastpo['ketrpm'] : ''); ?>
                                            <textarea name="ketrpm" id="ketrpm" class="form-control font-kecil"><?= $ketu ?></textarea>
                                        </div>
                                    </div>
                                    <hr class="m-0">
                                    <div class="text-end mt-1">
                                        <a href="#" class="btn btn-sm btn-primary font-kecil" id="simpanrpm">Simpan RPM</a>
                                        <a href="#" class="btn btn-sm btn-danger font-kecil" id="reseteditdata">Reset Data</a>
                                        <?php if($baru==''): ?>
                                            | <a href="#" data-href="<?= base_url().'rpm/hapusdata/'.$lastpo['id'] ?>" class="btn btn-sm btn-danger font-kecil" data-bs-toggle="modal" data-bs-target="#modal-danger" data-message="Akan menghapus data ini">Hapus Data</a>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
