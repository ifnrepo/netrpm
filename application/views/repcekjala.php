
<!-- Page header -->
<div class="page-header d-print-none m-2">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Report
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
                            <a href="<?= base_url().'cekjala' ?>" class="btn btn-sm btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <hr class="m-0 mb-1">
                </div>
                <div class="card card-active mb-2">
                    <div class="card-body font-kecil p-2">
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">Tanggal</label>
                                    <div class="col-sm-9 col">
                                        <input type="text" class="form-control font-kecil tgl" id="tanggalrepcek" value="<?= $this->session->userdata('tglrepcek') ?>">
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">No Mesin</label>
                                    <div class="col-sm-9 col">
                                        <select name="msncek" id="msncek" class="form-control form-select font-kecil">
                                                <option value="">-- Pilih Mesin --</option>
                                                <?php foreach($mesin->result_array() as $ms): $selek = $ms['mach_no']==$this->session->userdata('msnrepcek') ? 'selected' : ''; ?>
                                                    <option value="<?= $ms['mach_no'] ?>" <?= $selek ?>><?= $ms['mach_no'].' # '.$ms['specifik'] ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <a href="#" id="buttonrepcek" class="btn btn-sm btn-success w-100">Apply</a>
                                </div>
                            </div>
                            <div class="col-4">
                            </div>
                            <div class="col-4">
                                <div class="d-flex">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="mb-1">- Laporan Pengecekan JALA -</h4>
                <div class="card">
                    <div class="card-body p-1">
                        <table class="table table-bordered table-hover m-0 mb-1">
                            <thead class="bg-primary-lt">
                                <tr>
                                    <th class="text-center text-black">Tgl</th>
                                    <th class="text-center text-black">Jam</th>
                                    <th class="text-center text-black">Nama</th>
                                    <th class="text-center text-black">SKU</th>
                                    <th class="text-center text-black">Sukioroshi</th>
                                    <th class="text-center text-black line-11" colspan="10">Hasil Pengukuran<br><span class="text-pink">Berdasarkan Instruksi</span></th>
                                    <th class="text-center text-black">Rata-Rata</th>
                                    <th class="text-center text-black">Ikatan</th>
                                    <th class="text-center text-black">Futoito</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php if($data->num_rows() > 0): ?>
                                    <?php foreach($data->result_array() as $dt): ?>
                                        <tr class="font-kecil">
                                            <td><?= tglmysql($dt['tgl']) ?></td>
                                            <td class="text-nowrap"><?= $dt['waktu'] ?></td>
                                            <td class="line-11"><span class="font-10 text-pink"><?= $dt['noinduk_cek'] ?></span><br><?= datauser($dt['noinduk_cek']) ?></td>
                                            <td class="line-11"><span class="font-10 text-pink"><?= $dt['insno'] ?></span><br><?= viewsku($dt['po'],$dt['item'],$dt['dis']) ?></td>
                                            <td></td>
                                            <td class="text-center"><?= rupiah($dt['jalur1'],0) ?></td>
                                            <td class="text-end"><?= rupiah($dt['ukur1'],1) ?></td>
                                            <td class="text-center"><?= rupiah($dt['jalur2'],0) ?></td>
                                            <td class="text-end"><?= rupiah($dt['ukur2'],1) ?></td>
                                            <td class="text-center"><?= rupiah($dt['jalur3'],0) ?></td>
                                            <td class="text-end"><?= rupiah($dt['ukur3'],1) ?></td>
                                            <td class="text-center"><?= rupiah($dt['jalur4'],2) ?></td>
                                            <td class="text-end"><?= rupiah($dt['ukur4'],1) ?></td>
                                            <td class="text-center"><?= rupiah($dt['jalur5'],0) ?></td>
                                            <td class="text-end"><?= rupiah($dt['ukur5'],1) ?></td>
                                            <td class="text-end font-bold"><?= rupiah($dt['meai'],1) ?></td>
                                            <td class="text-center"></td>
                                            <?php $lotcek = trim($dt['lotcek'])=='' ? '' : 'Lot-'.$dt['lotcek']; ?>
                                            <td><?= $lotcek ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="18" class="text-center">-- Data tidak Ditemukan --</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
