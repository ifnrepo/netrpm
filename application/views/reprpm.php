
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
                    RPM Mesin
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
                <div class="d-none d-print-none d-sm-block">
                    <div class="d-flex mb-1">
                        <div class="ms-auto mb-1">
                            <a href="<?= base_url().'rpm' ?>" class="btn btn-sm btn-primary">   
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <hr class="my-1">
                </div>
                <div class="card card-active mb-2">
                    <div class="card-body font-kecil p-2">
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">Tanggal</label>
                                    <div class="col-sm-9 col">
                                        <input type="text" class="form-control font-kecil tgl" id="tanggalrep" value="<?= $this->session->userdata('tglreprpm') ?>">
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">No Mesin</label>
                                    <div class="col-sm-9 col">
                                        <select name="mesinrep" id="mesinrep" class="form-control form-select font-kecil">
                                            <?php foreach($mesin->result_array() as $ms): $selek = $ms['mach_no']==$this->session->userdata('msnreprpm') ? 'selected' : ''; ?>
                                                <option value="<?= $ms['mach_no'] ?>" <?= $selek ?>><?= $ms['mach_no'].' # '.$ms['specifik'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <a href="#" id="buttonreprpm" class="btn btn-sm btn-success w-100">Apply</a>
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
                <h4 class="mb-1">- Laporan Harian RPM -</h4>
                <div class="card">
                    <div class="card-body p-1">
                        <div class="row p-2">
                            <div class="col-12 bg-primary-lt p-2 mb-1">
                                <div class="row">
                                    <div class="col-4 text-center pt-3"><h1 style="line-height:20px;">SHIFT<br>Malam</h1></div>
                                    <div class="col-8 font-kecil">
                                        <table class="table table-bordered table-hover m-0 mb-1">
                                            <thead class="bg-primary-lt">
                                                <tr>
                                                    <th class="text-center text-black line-11">No<br>Mesin</th>
                                                    <th class="text-center text-black">Operator</th>
                                                    <th class="text-center text-black">NIK</th>
                                                    <th class="text-center text-black">Group</th>
                                                    <th class="text-center text-black">Dicek Oleh</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white">
                                                <tr>
                                                    <td class="text-center"><h3 class="m-0"><?= isset($personmalam['mach_no']) ? $personmalam['mach_no'] : ''; ?></h3></td>
                                                    <td class="line-11"><?= isset($personmalam['noinduk_1']) ? datauser($personmalam['noinduk_1']) : ''; ?><br><?= isset($personmalam['noinduk_2']) ? datauser($personmalam['noinduk_2']) : ''; ?></td>
                                                    <td class="line-11"><?= isset($personmalam['noinduk_1']) ? $personmalam['noinduk_1'] : ''; ?><br><?= isset($personmalam['noinduk_2']) ? $personmalam['noinduk_2'] : ''; ?></td>
                                                    <td class="text-center"><h3 class="m-0"><?= isset($personmalam['grup']) ? $personmalam['grup'] : ''; ?></h3></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <table class="table table-bordered table-hover m-0">
                                    <thead class="bg-primary-lt">
                                        <tr>
                                            <th class="text-center text-black">Waktu</th>
                                            <th class="text-center text-black" colspan="2">Revolusi</th>
                                            <th class="text-center text-black">Lot</th>
                                            <th class="text-center text-black">Cek</th>
                                            <th class="text-center text-black">PJ</th>
                                            <th class="text-center text-black line-11">Lot<br>Bahan</th>
                                            <th class="text-center text-black line-11">Cek<br>Meai</th>
                                            <th class="text-center text-black">Kode</th>
                                            <th class="text-center text-black line-11 ">+ 10<br>Rpm</th>
                                            <th class="text-center text-black">Ket</th>
                                            <th class="text-center text-black">No Inst</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody font-kecil bg-white text-black">
                                        <?php $jmlmalam=0; foreach($malam->result_array() as $mlm): $ada=0;  ?>
                                        <?php foreach($input->result_array() as $inp): ?>
                                        <?php if($inp['id_waktu']==$mlm['id']): $ada=1; $jmlmalam += $inp['rpm_akhir']-$inp['rpm_awal']; ?>
                                        <?php $nomlot = $inp['nomor_lot']!=0 ? $inp['nomor_lot'] : ''; ?>
                                        <?php $nomlot2 = $inp['nomor_lot2']!=0 ? ','.$inp['nomor_lot2'] : ''; ?>
                                        <?php $cekjala = $inp['cek']!=0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check font-bold text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>' : ''; ?>
                                        <?php $potjala = $inp['pj']!=0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check font-bold text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>' : ''; ?>
                                        <?php $rpmduapuluh = $inp['rpmduapuluh']!=0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check font-bold text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>' : ''; ?>
                                            <tr>
                                                <td class="text-center font-bold"><?= $mlm['waktu'] ?></td>
                                                <td class="text-end"><?= rupiah($inp['rpm_awal'],0) ?></td>
                                                <td class="text-end"><?= rupiah($inp['rpm_akhir'],0) ?></td>
                                                <?php if($mlm['waktu']=='SISA'): $jmlmalam = $jmlmalam < 0 ? 0 : $jmlmalam; ?>
                                                    <td colspan="3" class="bg-black text-end text-white">TOTAL : <?= rupiah($jmlmalam,0) ?></td>
                                                <?php else: ?>
                                                    <td class="text-center font-bold"><?= $nomlot.$nomlot2 ?></td>
                                                    <td class="text-center"><?= $cekjala ?></td>
                                                    <td class="text-center"><?= $potjala ?></td>
                                                <?php endif; ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $rpmduapuluh ?></td>
                                                <td class="line-11"><?= $inp['ket'] ?><br><span class="font-11"><?= $inp['ketrpm'] ?></span></td>
                                                <td class="line-11"><span class="font-10 text-pink"><?= $inp['insno'] ?></span><br><?= viewsku($inp['po'],$inp['item'],$inp['dis']) ?></td>
                                            </tr>
                                        <?php endif; endforeach; ?>
                                        <?php if($ada==0): ?>
                                            <tr>
                                                <td class="text-center font-bold"><?= $mlm['waktu'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <?php if($mlm['waktu']=='SISA'): $jmlmalam = $jmlmalam < 0 ? 0 : $jmlmalam; ?>
                                                    <td colspan="3" class="bg-black text-end text-white">TOTAL : <?= rupiah($jmlmalam,0) ?></td>
                                                <?php else: ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                <?php endif; ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php  endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 bg-orange-lt p-2 mb-1">
                                <div class="row">
                                    <div class="col-4 text-center pt-3"><h1 style="line-height:20px;">SHIFT<br>Pagi</h1></div>
                                    <div class="col-8 font-kecil">
                                        <table class="table table-bordered table-hover m-0 mb-1">
                                            <thead class="bg-primary-lt">
                                                <tr>
                                                    <th class="text-center text-black line-11">No<br>Mesin</th>
                                                    <th class="text-center text-black">Operator</th>
                                                    <th class="text-center text-black">NIK</th>
                                                    <th class="text-center text-black">Group</th>
                                                    <th class="text-center text-black">Dicek Oleh</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white">
                                               <tr class="text-black">
                                                    <td class="text-center"><h3 class="m-0"><?= isset($personpagi['mach_no']) ? $personpagi['mach_no'] : ''; ?></h3></td>
                                                    <td class="line-11"><?= isset($personpagi['noinduk_1']) ? datauser($personpagi['noinduk_1']) : ''; ?><br><?= isset($personpagi['noinduk_2']) ? datauser($personpagi['noinduk_2']) : ''; ?></td>
                                                    <td class="line-11"><?= isset($personpagi['noinduk_1']) ? $personpagi['noinduk_1'] : ''; ?><br><?= isset($personpagi['noinduk_2']) ? $personpagi['noinduk_2'] : ''; ?></td>
                                                    <td class="text-center"><h3 class="m-0"><?= isset($personpagi['grup']) ? $personpagi['grup'] : ''; ?></h3></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <table class="table table-bordered table-hover m-0">
                                    <thead class="bg-primary-lt">
                                        <tr>
                                            <th class="text-center text-black">Waktu</th>
                                            <th class="text-center text-black" colspan="2">Revolusi</th>
                                            <th class="text-center text-black">Lot</th>
                                            <th class="text-center text-black">Cek</th>
                                            <th class="text-center text-black">PJ</th>
                                            <th class="text-center text-black line-11">Lot<br>Bahan</th>
                                            <th class="text-center text-black line-11">Cek<br>Meai</th>
                                            <th class="text-center text-black">Kode</th>
                                            <th class="text-center text-black line-11 ">+ 10<br>Rpm</th>
                                            <th class="text-center text-black">Ket</th>
                                            <th class="text-center text-black">No Inst</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody font-kecil bg-white text-black">
                                        <?php $jmlpagi=0; foreach($pagi->result_array() as $pgi): $ada=0;  ?>
                                        <?php foreach($input->result_array() as $inp): ?>
                                        <?php if($inp['id_waktu']==$pgi['id']): $ada=1; $jmlpagi += $inp['rpm_akhir']-$inp['rpm_awal']; ?>
                                        <?php $nomlot = $inp['nomor_lot']!=0 ? $inp['nomor_lot'] : ''; ?>
                                        <?php $nomlot2 = $inp['nomor_lot2']!=0 ? ','.$inp['nomor_lot2'] : ''; ?>
                                        <?php $cekjala = $inp['cek']!=0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check font-bold text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>' : ''; ?>
                                        <?php $potjala = $inp['pj']!=0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check font-bold text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>' : ''; ?>
                                        <?php $rpmduapuluh = $inp['rpmduapuluh']!=0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check font-bold text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>' : ''; ?>
                                            <tr>
                                                <td class="text-center font-bold"><?= $pgi['waktu'] ?></td>
                                                <td class="text-end"><?= rupiah($inp['rpm_awal'],0) ?></td>
                                                <td class="text-end"><?= rupiah($inp['rpm_akhir'],0) ?></td>
                                                <?php if($pgi['waktu']=='SISA'): $jmlpagi = $jmlpagi < 0 ? 0 : $jmlpagi; ?>
                                                    <td colspan="3" class="bg-black text-end text-white">TOTAL : <?= rupiah($jmlpagi,0) ?></td>
                                                <?php else: ?>
                                                    <td class="text-center font-bold"><?= $nomlot.$nomlot2 ?></td>
                                                    <td class="text-center"><?= $cekjala ?></td>
                                                    <td class="text-center"><?= $potjala ?></td>
                                                <?php endif; ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $rpmduapuluh ?></td>
                                                <td class="line-11"><?= $inp['ket'] ?><br><span class="font-11"><?= $inp['ketrpm'] ?></span></td>
                                                <td class="line-11"><span class="font-10 text-pink"><?= $inp['insno'] ?></span><br><?= viewsku($inp['po'],$inp['item'],$inp['dis']) ?></td>
                                            </tr>
                                        <?php endif; endforeach; ?>
                                        <?php if($ada==0): ?>
                                            <tr>
                                                <td class="text-center font-bold"><?= $pgi['waktu'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <?php if($pgi['waktu']=='SISA'): $jmlpagi = $jmlpagi < 0 ? 0 : $jmlpagi; ?>
                                                    <td colspan="3" class="bg-black text-end text-white">TOTAL : <?= rupiah($jmlpagi,0) ?></td>
                                                <?php else: ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                <?php endif; ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php  endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 bg-teal-lt p-2 mb-1">
                                <div class="row">
                                    <div class="col-4 text-center pt-3"><h1 style="line-height:20px;">SHIFT<br>Siang</h1></div>
                                    <div class="col-8 font-kecil">
                                        <table class="table table-bordered table-hover m-0 mb-1">
                                            <thead class="bg-primary-lt">
                                                <tr>
                                                    <th class="text-center text-black line-11">No<br>Mesin</th>
                                                    <th class="text-center text-black">Operator</th>
                                                    <th class="text-center text-black">NIK</th>
                                                    <th class="text-center text-black">Group</th>
                                                    <th class="text-center text-black">Dicek Oleh</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white">
                                               <tr>
                                                    <td class="text-center"><h3 class="m-0"><?= isset($personsiang['mach_no']) ? $personsiang['mach_no'] : ''; ?></h3></td>
                                                    <td class="line-11"><?= isset($personsiang['noinduk_1']) ? datauser($personsiang['noinduk_1']) : ''; ?><br><?= isset($personsiang['noinduk_2']) ? datauser($personsiang['noinduk_2']) : ''; ?></td>
                                                    <td class="line-11"><?= isset($personsiang['noinduk_1']) ? $personsiang['noinduk_1'] : ''; ?><br><?= isset($personsiang['noinduk_2']) ? $personsiang['noinduk_2'] : ''; ?></td>
                                                    <td class="text-center"><h3 class="m-0"><?= isset($personsiang['grup']) ? $personsiang['grup'] : ''; ?></h3></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <table class="table table-bordered table-hover m-0">
                                    <thead class="bg-primary-lt">
                                        <tr>
                                            <th class="text-center text-black">Waktu</th>
                                            <th class="text-center text-black" colspan="2">Revolusi</th>
                                            <th class="text-center text-black">Lot</th>
                                            <th class="text-center text-black">Cek</th>
                                            <th class="text-center text-black">PJ</th>
                                            <th class="text-center text-black line-11">Lot<br>Bahan</th>
                                            <th class="text-center text-black line-11">Cek<br>Meai</th>
                                            <th class="text-center text-black">Kode</th>
                                            <th class="text-center text-black line-11 ">+ 10<br>Rpm</th>
                                            <th class="text-center text-black">Ket</th>
                                            <th class="text-center text-black">No Inst</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody font-kecil bg-white text-black">
                                        <?php $jmlsiang=0; foreach($siang->result_array() as $sig): $ada=0;  ?>
                                        <?php foreach($input->result_array() as $inp): ?>
                                        <?php if($inp['id_waktu']==$sig['id']): $ada=1; $jmlsiang += $inp['rpm_akhir']-$inp['rpm_awal']; ?>
                                        <?php $nomlot = $inp['nomor_lot']!=0 ? $inp['nomor_lot'] : ''; ?>
                                        <?php $nomlot2 = $inp['nomor_lot2']!=0 ? ','.$inp['nomor_lot2'] : ''; ?>
                                        <?php $cekjala = $inp['cek']!=0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check font-bold text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>' : ''; ?>
                                        <?php $potjala = $inp['pj']!=0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check font-bold text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>' : ''; ?>
                                        <?php $rpmduapuluh = $inp['rpmduapuluh']!=0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check font-bold text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>' : ''; ?>
                                            <tr>
                                                <td class="text-center font-bold"><?= $sig['waktu'] ?></td>
                                                <td class="text-end"><?= rupiah($inp['rpm_awal'],0) ?></td>
                                                <td class="text-end"><?= rupiah($inp['rpm_akhir'],0) ?></td>
                                                <?php if($sig['waktu']=='SISA'): $jmlsiang = $jmlsiang < 0 ? 0 : $jmlsiang; ?>
                                                    <td colspan="3" class="bg-black text-end text-white">TOTAL : <?= rupiah($jmlsiang,0) ?></td>
                                                <?php $jmlsiang=0; else: ?>
                                                    <td class="text-center font-bold"><?= $nomlot.$nomlot2 ?></td>
                                                    <td class="text-center"><?= $cekjala ?></td>
                                                    <td class="text-center"><?= $potjala ?></td>
                                                <?php endif; ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $rpmduapuluh ?></td>
                                                <td class="line-11"><?= $inp['ket'] ?><br><span class="font-11"><?= $inp['ketrpm'] ?></span></td>
                                                <td class="line-11"><span class="font-10 text-pink"><?= $inp['insno'] ?></span><br><?= viewsku($inp['po'],$inp['item'],$inp['dis']) ?></td>
                                            </tr>
                                        <?php endif; endforeach; ?>
                                        <?php if($ada==0): ?>
                                            <tr>
                                                <td class="text-center font-bold"><?= $sig['waktu'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <?php if($sig['waktu']=='SISA'): $jmlsiang = $jmlsiang < 0 ? 0 : $jmlsiang; ?>
                                                    <td colspan="3" class="bg-black text-end text-white">TOTAL : <?= rupiah($jmlsiang,0) ?></td>
                                                <?php $jmlsiang=0; else: ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                <?php endif; ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php  endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
