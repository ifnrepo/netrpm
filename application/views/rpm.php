
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
                            <a href="<?= base_url().'rpm/clearreprpm' ?>" class="btn btn-sm btn-primary">View Report RPM</a>
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
                                        <input type="text" class="form-control font-kecil tgl" id="tgl" aria-describedby="emailHelp"  placeholder="dd-mm-YYYY" value="<?= $this->session->userdata('tglrpm') ?>">
                                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                                    </div>
                                </div>
                                <hr class="m-1">
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">No Mesin</label>
                                    <div class="col">
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control font-kecil" id="mach_no" placeholder="Cari Mesin" value="<?= $this->session->userdata('msnrpm') ?>" readonly>
                                            <?php if($this->session->userdata('msnrpm')==''): ?>
                                                <a href="<?= base_url().'rpm/getmesin' ?>" class="btn btn-success font-kecil" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari mesin Netting">Cari!</a>
                                                <?php else: ?>
                                                    <a href="#" data-href="<?= base_url().'rpm/resetmsn' ?>" class="btn btn-danger font-kecil" data-bs-toggle="modal" data-bs-target="#modal-danger" data-tombol="Reset" data-message="Akan Reset data Mesin">Reset</a>
                                                    <a href="<?= base_url().'rpm/getmesin' ?>" class="btn btn-success font-kecil" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari mesin Netting">Ganti</a>
                                            <?php endif; ?>
                                            <!-- <small class="form-hint text-green">We'll never share your email with anyone else.</small> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-3 col-form-label font-kecil">Ket</label>
                                    <div class="col">
                                        <textarea name="ketmesin" id="ketmesin" class="form-control font-kecil" readonly><?= datamesin($this->session->userdata('msnrpm')) ?></textarea>
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
                                    <label class="col-md-3 col-12 col-form-label font-kecil mb-0 py-0 mt-2">Operator Mesin</label>
                                    <div class="col">
                                        <div class="input-group mb-0">
                                            <?php $datapersonil1 = $this->session->userdata('nikrpm')=='' ? '' : trim(datauser($this->session->userdata('nikrpm'))).' ('.datauser($this->session->userdata('nikrpm'),'noinduk').')'; ?>
                                            <input type="text" class="form-control font-kecil" placeholder="Cari Operator 1" value="<?= $datapersonil1 ?>" readonly>
                                            <?php if($this->session->userdata('nikrpm')==''): ?>
                                                <a href="<?= base_url().'rpm/getpersonil/1' ?>" class="btn btn-orange font-kecil" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari Operator"><span class="text-black">Operator</span></a>
                                            <?php else: ?>
                                                <a href="#" data-href="<?= base_url().'rpm/resetpersonil/1' ?>" class="btn btn-danger font-kecil" data-bs-toggle="modal" data-bs-target="#modal-danger" data-message="Akan reset Operator" data-tombol="Reset" data-title="Cari Operator"><span class="text-white">Reset !</span></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-md-3 col-12 col-form-label font-kecil py-0 mt-2">Operator GR</label>
                                    <div class="col">
                                        <div class="input-group mb-0">
                                            <?php $datapersonil2 = $this->session->userdata('personilrpm')=='' ? '' : trim(datauser($this->session->userdata('personilrpm'))).' ('.datauser($this->session->userdata('personilrpm'),'noinduk').')'; ?>
                                            <input type="text" class="form-control font-kecil" placeholder="Cari Operator 2" value="<?= $datapersonil2 ?>" readonly>
                                            <?php if($this->session->userdata('personilrpm')==''): ?>
                                                <a href="<?= base_url().'rpm/getpersonil' ?>" class="btn btn-orange font-kecil" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Cari Operator GR"><span class="text-black">Operator</span></a>
                                            <?php else: ?>
                                                <a href="#" data-href="<?= base_url().'rpm/resetpersonil' ?>" class="btn btn-danger font-kecil" data-bs-toggle="modal" data-bs-target="#modal-danger" data-message="Akan reset Operato GR" data-tombol="Reset" data-title="Cari Operator"><span class="text-white">Reset !</span></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-md-3 col-12 col-form-label font-kecil py-0 mt-2">Grup</label>
                                    <div class="col">
                                        <select name="grupkerja" id="grupkerja" class="form-control font-kecil form-select">
                                            <option value="">Pilih Group</option>
                                            <option value="A" <?php if($this->session->userdata('gruprpm')=='A'){ echo "selected"; } ?>>Group A</option>
                                            <option value="B" <?php if($this->session->userdata('gruprpm')=='B'){ echo "selected"; } ?>>Group B</option>
                                            <option value="C" <?php if($this->session->userdata('gruprpm')=='C'){ echo "selected"; } ?>>Group C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-md-3 col-12 col-form-label font-kecil py-0 mt-2">Shift Kerja</label>
                                    <div class="col">
                                        <div class="row g-2">
                                            <div class="col">
                                                <select name="shiftkerja" id="shiftkerja" class="form-control font-kecil form-select">
                                                    <option value="">Pilih</option>
                                                    <option value="M" <?php if($this->session->userdata('shiftrpm')=='M'){ echo "selected"; } ?>>Malam</option>
                                                    <option value="P" <?php if($this->session->userdata('shiftrpm')=='P'){ echo "selected"; } ?>>Pagi</option>
                                                    <option value="S" <?php if($this->session->userdata('shiftrpm')=='S'){ echo "selected"; } ?>>Siang</option>
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="btn btn-success font-kecil" id="cekrpm" aria-label="Button">
                                                    Apply
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-cyan-lt p-1 mb-1 d-flex justify-content-between"><span class="text-black">Keterangan RPM</span><span class="text-right font-kecil"><a href="./rpm">Refresh</a></span></div>
                        <div class="card btn-flat font-kecil">
                            <div class="card-body p-2 overflow-auto">
                                <?php $muncul = $this->session->userdata('msnrpm')!='' && $this->session->userdata('shiftrpm')!='' ? '' : 'hilang' ; ?>
                                <div class="d-flex justify-content-center align-items-center <?php if($muncul==''){echo "hilang"; } ?>" style="height: 100px;">
                                    Pilih Tgl, Mesin dan Shift Kerja  <span class="text-primary ms-2">(Klik Apply)</span>
                                </div>
                                <div id="tabelrpm" class="<?= $muncul ?>">
                                    <h5 class="m-1">Operator : </h5>
                                    <table class="table table-bordered table-hover m-0">
                                        <thead class="bg-primary-lt">
                                            <tr>
                                                <th class="text-center text-black">Waktu</th>
                                                <th class="text-center text-black">Instruksi</th>
                                                <th class="text-center text-black line-11">Rpm<br>Std</th>
                                                <th class="text-center text-black line-11">Rpm<br>Awal</th>
                                                <th class="text-center text-black line-11">Rpm<br>Saat Ini</th>
                                                <th class="text-center text-black">Lot</th>
                                                <th class="text-center text-black">PJ</th>
                                                <th class="text-center text-black">Cek</th>
                                                <th class="text-center text-black line-11 ">+ 10<br>Rpm</th>
                                                <th class="text-center text-black">Ket</th>
                                                <th class="text-center text-black">Act</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-tbody">
                                            <?php if($data->num_rows() > 0): $jumlah=0; $no=0; ?>
                                            <?php foreach($data->result_array() as $dt): $no++; $ada = 0;  ?> 
                                            <?php foreach($input->result_array() as $inp): ?>
                                            <?php if($dt['id']==$inp['id_waktu']): $ada = 1; ?>
                                            <?php $nolot = $inp['lot']==1 ? $inp['nomor_lot'] : ''; ?>
                                            <?php $nolot2 = $inp['lot']==1 ? ($inp['nomor_lot2']==0 ? '' : ','.$inp['nomor_lot2']) : ''; ?>
                                            <?php $pj = $inp['pj']==1 ? 'Y' : ''; ?>
                                            <?php $cek = $inp['cek']==1 ? 'Y' : ''; ?>
                                            <?php $rpm20 = $inp['rpmduapuluh']==1 ? 'Y' : ''; ?>
                                            <?php $rpmakh = $inp['nomor_lot2']!=0 ? rupiah($inp['rpm_akhir']/2,0).' X 2' : rupiah($inp['rpm_akhir'],0); ?>
                                            <?php $jumlah += $inp['rpm_akhir']-$inp['rpm_awal']; ?>
                                                <tr class="font-11 text-nowrap">
                                                    <?php if($this->session->userdata('tglrpm') < date('Y-m-d')){ ?>
                                                        <?php if($dt['waktu']=='SISA'){ ?>
                                                            <td class="text-center text-black bg-black text-white font-kecil"><span class="text-white">SISA</span></td>
                                                        <?php }else{ ?>
                                                            <td class="text-center text-teal font-bold font-kecil"><?= $dt['waktu'] ?></td>
                                                        <?php } ?>
                                                    <?php }else{ ?>
                                                        <?php if($dt['waktu']=='SISA'){ ?>
                                                            <td class="text-center text-black bg-black text-white font-kecil"><a href="<?= base_url().'rpm/editrpm/'.$dt['id'].'/'.$inp['id'] ?>"><span class="text-white">SISA</span></a></td>
                                                        <?php }else{ ?>
                                                            <td class="text-center text-teal font-bold font-kecil"><a href="<?= base_url().'rpm/editrpm/'.$dt['id'].'/'.$inp['id'] ?>"><?= $dt['waktu'] ?></a></td>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <td class="text-black line-11"><span class=""><span class="text-pink font-10"><?= viewsku($inp['po'],$inp['item'],$inp['dis']) ?></span><br><span><?= $inp['insno'] ?></span></td>
                                                    <td class="text-end text-orange"><span class=""><?= rupiah2($inp['rpm'],0) ?></span></td>
                                                    <td class="text-end text-orange"><?= rupiah2($inp['rpm_awal'],0) ?></td>
                                                    <td class="text-end text-orange"><?= rupiah2($inp['rpm_akhir'],0) ?></td>
                                                    <td class="text-center text-teal font-bold font-13"><?= rupiah2($nolot).$nolot2 ?></td>
                                                    <td class="text-center text-danger font-bold font-13"><?= $pj ?></td>
                                                    <td class="text-center text-danger font-bold font-13"><?= $cek ?></td>
                                                    <td class="text-center text-danger font-bold font-13"><?= $rpm20 ?></td>
                                                    <?php if($dt['waktu']=='SISA'): ?>
                                                        <?php $total = $jumlah <= 0 ? 0 : $jumlah; ?>
                                                        <td class="bg-black text-white font-13">Jumlah : <?= rupiah($total,0).' Rpm' ?></td>
                                                    <?php else: ?>
                                                        <td><?= $inp['ket'].' '.$inp['ketrpm'] ?></td>
                                                    <?php endif; ?>
                                                    <?php if($this->session->userdata('tglrpm') < date('Y-m-d')){ ?>
                                                        <td class="line-11 text-center"><span class="font-10 text-gray"><?= $dt['waktu'] ?></span></td>
                                                    <?php }else{ ?>
                                                        <td class="line-11 text-center"><a href="<?= base_url().'rpm/editrpm/'.$dt['id'].'/'.$inp['id'] ?>">Edit</a><br><span class="font-10 text-gray"><?= $dt['waktu'] ?></span></td>
                                                   <?php } ?>
                                                </tr>
                                            <?php endif; endforeach; ?>
                                            <?php if($ada==0): ?>
                                                <tr class="font-11 text-nowrap">
                                                    <?php if($this->session->userdata('tglrpm') < date('Y-m-d')){ ?>
                                                        <?php if($dt['waktu']=='SISA'){ ?>
                                                            <td class="text-center text-black bg-black text-white font-kecil"><span class="text-white">SISA</span></td>
                                                        <?php }else{ ?>
                                                            <td class="text-center text-teal font-bold font-kecil"><?= $dt['waktu'] ?></td>
                                                        <?php } ?>
                                                    <?php }else{ ?>
                                                        <?php if($dt['waktu']=='SISA'){ ?>
                                                            <td class="text-center text-black bg-black text-white font-kecil"><a href="<?= base_url().'rpm/editrpm/'.$dt['id'] ?>"><span class="text-white">SISA</span></a></td>
                                                        <?php }else{ ?>
                                                            <td class="text-center text-teal font-bold font-kecil"><a href="<?= base_url().'rpm/editrpm/'.$dt['id'] ?>"><?= $dt['waktu'] ?></a></td>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <td class="text-black line-11"><span class=""><span class="text-pink font-10"></span><br></span></td>
                                                    <td class="text-end text-orange"><span class=""></span></td>
                                                    <td class="text-end text-orange"></td>
                                                    <td class="text-end text-orange"></td>
                                                    <td class="text-center text-teal font-bold"></td>
                                                    <td class="text-center text-danger font-bold"></td>
                                                    <td class="text-center text-danger font-bold"></td>
                                                    <td class="text-center text-danger font-bold"></td>
                                                    <?php if($dt['waktu']=='SISA'): ?>
                                                        <?php $total = $jumlah <= 0 ? 0 : $jumlah; ?>
                                                        <td class="bg-black text-white font-13">Jumlah : <?= rupiah($total,0).' Rpm' ?></td>
                                                    <?php else: ?>
                                                        <td></td>
                                                    <?php endif; ?>
                                                    <?php if($this->session->userdata('tglrpm') < date('Y-m-d')){ ?>
                                                        <td class="line-11 text-center"><span class="font-10 text-gray"><?= $dt['waktu'] ?></span></td>
                                                    <?php }else{ ?>
                                                        <td class="line-11 text-center"><a href="<?= base_url().'rpm/editrpm/'.$dt['id'] ?>">Edit</a><br><span class="font-10 text-gray"><?= $dt['waktu'] ?></span></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php endif; if(getjamkerjanet($dt['id'])=='SISA'){ $jumlah = 0; } endforeach; endif; ?>
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
</div>
