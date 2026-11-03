
<!-- Page header -->
<div class="page-header d-print-none m-2">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    Dashboard
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="mb-3 row">
                    <label class="col-3 col-form-label font-kecil text-end">Periode</label>
                    <div class="col">
                        <select name="bulperiode" id="bulperiode" class="form-control font-kecil form-select">
                            <option value="1" <?php if($this->session->userdata('periodebulan')==1){ echo "selected"; } ?>>Januari</option>
                            <option value="2" <?php if($this->session->userdata('periodebulan')==2){ echo "selected"; } ?>>Februari</option>
                            <option value="3" <?php if($this->session->userdata('periodebulan')==3){ echo "selected"; } ?>>Maret</option>
                            <option value="4" <?php if($this->session->userdata('periodebulan')==4){ echo "selected"; } ?>>April</option>
                            <option value="5" <?php if($this->session->userdata('periodebulan')==5){ echo "selected"; } ?>>Mei</option>
                            <option value="6" <?php if($this->session->userdata('periodebulan')==6){ echo "selected"; } ?>>Juni</option>
                            <option value="7" <?php if($this->session->userdata('periodebulan')==7){ echo "selected"; } ?>>Juli</option>
                            <option value="8" <?php if($this->session->userdata('periodebulan')==8){ echo "selected"; } ?>>Agustus</option>
                            <option value="9" <?php if($this->session->userdata('periodebulan')==9){ echo "selected"; } ?>>September</option>
                            <option value="10" <?php if($this->session->userdata('periodebulan')==10){ echo "selected"; } ?>>Oktober</option>
                            <option value="11" <?php if($this->session->userdata('periodebulan')==11){ echo "selected"; } ?>>Nopember</option>
                            <option value="12" <?php if($this->session->userdata('periodebulan')==12){ echo "selected"; } ?>>Desember</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" class="form-control font-kecil inputangkanum" id="thnperiode" value="<?= $this->session->userdata('periodetahun') ?>" placeholder="Tahun">
                            <a href="#" class="btn btn-primary" id="tmbperiode" type="button"><span class="font-kecil">Go</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body mt-1">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-sm-12 col-lg-6">
                <div class="col-sm-12 col-lg-12">
                    <div class="row row-cards mb-2">
                        <div class="col-sm-12 col-lg-6">
                            <div class="card card-sm">
                                <div class="card-body p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-primary text-white avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-view-360-arrow"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M17 15.328c2.414 -.718 4 -1.94 4 -3.328c0 -2.21 -4.03 -4 -9 -4s-9 1.79 -9 4s4.03 4 9 4" /><path d="M9 13l3 3l-3 3" /></svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Total RPM Periode Ini
                                            </div>
                                            <div class="text-pink text-end" id="kolomtotalrpmperiode">
                                                -
                                            </div>
                                            <!-- <hr class="m-0">
                                            <div class="d-flex font-kecil">
                                                <div>X</div>
                                                <div class="ms-auto">Y</div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="card card-sm">
                                <div class="card-body p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-orange text-white avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alarm-average"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 13a7 7 0 1 0 14 0a7 7 0 0 0 -14 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /><path d="M8 13h1l2 3l2 -6l2 3h1" /></svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Total Rpm Hari Ini
                                            </div>
                                            <div class="text-cyan text-end" id="kolomperiodehariini">
                                                -
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="page-title">Selamat datang kembali,<br> <?= strtoupper(datauser($this->session->userdata('nik'))) ?> !</div>
                                    </div>
                                </div>
                                <div class="mb-2 mt-4 overflow-auto">
                                    <span class="font-kecil text-pink font-bold">Summary RPM</span> 
                                    <table class="table table-bordered m-0">
                                        <thead class="bg-primary-lt">
                                        <tr>
                                            <th class="text-center text-black">Hari ini</th>
                                            <th class="text-center text-black">Minggu ini</th>
                                            <th class="text-center text-black">Bulan ini</th>
                                            <th class="text-center text-black">Tahun ini</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-tbody">
                                        <tr class="p-0">
                                            <td class="text-end font-kecil text-primary" id="hariini">Loading...</td>
                                            <td class="text-end font-kecil text-primary" id="mingguini">Loading...</td>
                                            <td class="text-end font-kecil text-primary" id="bulanini">Loading...</td>
                                            <td class="text-end font-kecil text-primary" id="tahunini">Loading...</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="text-primary" id="render-grafik-person">
                                Untuk Grafik Pendapatan RPM nya !
                            </div> -->
                            <div id="chart-new-clients" class="chart-sm"></div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="m-0">Rpm Total (Harian)</h3>
                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <?php $fltrpmtotal = $this->session->userdata('fltrpmtotal')=='' ? 'Semua' : ($this->session->userdata('fltrpmtotal')==1 ? 'Indoneptune' : 'Arroza'); ?>
                                        <a class="dropdown-toggle font-kecil text-secondary" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $fltrpmtotal ?></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item font-kecil" href="<?= base_url().'main/fltrpmtotal' ?>">Semua</a>
                                            <a class="dropdown-item font-kecil" href="<?= base_url().'main/fltrpmtotal/1' ?>">Indoneptune</a>
                                            <a class="dropdown-item font-kecil" href="<?= base_url().'main/fltrpmtotal/2' ?>">Arroza</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-0 bg-red">
                            <div id="chart-revenue-bg" class="mt-2 chart-sm w-100"></div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="m-0">Rpm Harian / Grup</h3>
                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <?php $fltrpmgrup = $this->session->userdata('fltrpmgrup')=='' ? 'Semua' : ($this->session->userdata('fltrpmgrup')==1 ? 'Indoneptune' : 'Arroza'); ?>
                                        <a class="dropdown-toggle font-kecil text-secondary" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $fltrpmgrup ?></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item font-kecil" href="<?= base_url().'main/fltrpmgrup' ?>">Semua</a>
                                            <a class="dropdown-item font-kecil" href="<?= base_url().'main/fltrpmgrup/1' ?>">Indoneptune</a>
                                            <a class="dropdown-item font-kecil" href="<?= base_url().'main/fltrpmgrup/2' ?>">Arroza</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-0 bg-red">
                            <div id="chart-pergrup" class="mt-2 chart-sm w-100"></div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="m-0">Rpm Tahun <?= $this->session->userdata('periodetahun') ?> Vs Tahun <?= $this->session->userdata('periodetahun')-1 ?></h3>
                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <?php $fltrpmvs = $this->session->userdata('fltrpmvs')=='' ? 'Semua' : ($this->session->userdata('fltrpmvs')==1 ? 'Indoneptune' : 'Arroza'); ?>
                                        <a class="dropdown-toggle font-kecil text-secondary" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $fltrpmvs ?></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item font-kecil" href="<?= base_url().'main/fltrpmvs' ?>">Semua</a>
                                            <a class="dropdown-item font-kecil" href="<?= base_url().'main/fltrpmvs/1' ?>">Indoneptune</a>
                                            <a class="dropdown-item font-kecil" href="<?= base_url().'main/fltrpmvs/2' ?>">Arroza</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div id="chart-perbandingan" class="mt-2 chart-sm w-100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-0">Data RPM <?= namabulan($this->session->userdata('periodebulan')).' '.$this->session->userdata('periodetahun') ?></h3>
                        <hr class="m-0">
                        <div class="my-1 row">
                            <label class="col-3 col-form-label font-kecil">Lokasi</label>
                            <div class="col">
                                <select name="tempat" id="tempat" class="form-control font-kecil form-select">
                                    <option value="0" <?php if($this->session->userdata('periodelokasi')==0){ echo "selected"; } ?>>Indoneptune</option>
                                    <option value="1" <?php if($this->session->userdata('periodelokasi')==1){ echo "selected"; } ?>>Arroza</option>
                                </select>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div id="charte"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="rpmtahunan">
            <div class="col-sm-12 col-lg-12 mt-1">
                <div class="card">
                    <div class="card-body overflow-auto">
                        <h3 class="mb-0">Rekapitulasi Rpm <?= $this->session->userdata('periodetahun') ?></h3>
                        <hr class="m-0">
                        <div class="card card-active my-1">
                            <div class="card-body font-kecil p-2">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="my-1 row">
                                            <label class="col-3 col-form-label font-11">Lokasi</label>
                                            <div class="col">
                                                <select name="tempatx" id="tempatx" class="form-control font-11 form-select">
                                                    <option value="">Semua</option>
                                                    <option value="1" <?php if($this->session->userdata('tempatx')==1){ echo "selected"; } ?> >Indoneptune</option>
                                                    <option value="2" <?php if($this->session->userdata('tempatx')==2){ echo "selected"; } ?> >Arroza</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="my-1 row">
                                            <label class="col-3 col-form-label font-11">Mesin</label>
                                            <div class="col">
                                                <select name="mesinx" id="mesinx" class="form-control font-11 form-select">
                                                    <option value="">Semua</option>
                                                    <?php foreach($mesin->result_array() as $msn): ?>
                                                    <option value="<?= $msn['mach_no'] ?>" <?php if($this->session->userdata('mesinx')==$msn['mach_no']){ echo "selected"; } ?>><?= $msn['mach_no'].' - '.trim($msn['specifik']) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="my-1 row">
                                            <label class="col-3 col-form-label font-11 text-end">Shift</label>
                                            <div class="col">
                                                <select name="shiftx" id="shiftx" class="form-control font-11 form-select">
                                                    <option value="" >Semua</option>
                                                    <option value="M" <?php if($this->session->userdata('shiftx')=='M'){ echo "selected"; } ?>>Malam</option>
                                                    <option value="P" <?php if($this->session->userdata('shiftx')=='P'){ echo "selected"; } ?>>Pagi</option>
                                                    <option value="S" <?php if($this->session->userdata('shiftx')=='S'){ echo "selected"; } ?>>Siang</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="my-1 row">
                                            <label class="col-3 col-form-label font-11 text-end">Grup</label>
                                            <div class="col">
                                                <select name="grupx" id="grupx" class="form-control font-11 form-select">
                                                    <option value="" >Semua</option>
                                                    <option value="A" <?php if($this->session->userdata('grupx')=='A'){ echo "selected"; } ?> >Group A</option>
                                                    <option value="B" <?php if($this->session->userdata('grupx')=='B'){ echo "selected"; } ?> >Group B</option>
                                                    <option value="C" <?php if($this->session->userdata('grupx')=='C'){ echo "selected"; } ?>>Group C</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 pt-2">
                                        <button id="viewrpm" class="form-control btn btn-sm btn-success">View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover m-0">
                            <thead class="bg-primary-lt">
                                <tr>
                                    <th class="text-center text-black">Tgl</th>
                                    <th class="text-center text-black">Jan</th>
                                    <th class="text-center text-black">Feb</th>
                                    <th class="text-center text-black">Mar</th>
                                    <th class="text-center text-black">Apr</th>
                                    <th class="text-center text-black">Mei</th>
                                    <th class="text-center text-black">Jun</th>
                                    <th class="text-center text-black">Jul</th>
                                    <th class="text-center text-black">Ags</th>
                                    <th class="text-center text-black">Sep</th>
                                    <th class="text-center text-black">Okt</th>
                                    <th class="text-center text-black">Nop</th>
                                    <th class="text-center text-black">Dec</th>
                                    <th class="text-center text-black">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                            <?php $totalbawah = [ '1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0, '6' => 0, '7' => 0, '8' => 0, '9' => 0, '10' => 0, '11' => 0, '12' => 0,'13' => 0]; ?>
                            <?php $totalujung = 0; for ($xi=1; $xi < 32; $xi++) { ?>
                                <tr class="p-0">
                                    <td class="font-kecil text-primary text-center" id=""><?= $xi ?></td>
                                    <?php $jmlrow=0; for ($yi=1; $yi < 13; $yi++) { $strtgl = $this->session->userdata('periodetahun').'-'.$yi.'-'.$xi; $tgx = strtotime($strtgl);  ?>
                                        <?php 
                                            $minggu = date('w',$tgx)==0 ? 'text-pink' : 'text-primary';
                                            $isitgl = month(date('d-m-Y',$tgx))==$yi ? date('d-m-Y',$tgx) : '-'; 
                                            $kosong = 0;
                                            foreach($data->result_array() as $dt){
                                                if($dt['tgl']==date('Y-m-d',$tgx)){
                                                    $kosong = $dt['jumlahrpm'];
                                                    $jmlrow += $dt['jumlahrpm'];
                                                    $totalbawah[$yi] += $dt['jumlahrpm'];
                                                    $totalujung += $dt['jumlahrpm'];
                                                }
                                            }
                                        ?>
                                        <td class="font-10 <?= $minggu ?> text-end" id=""><?= rupiah($kosong,0) ?></td>
                                    <?php } ?>
                                    <td class="font-kecil font-bold text-end" id=""><?= rupiah($jmlrow,0) ?></td>
                                </tr>
                            <?php } ?>
                            <tr class="p-0 bg-blacky">
                                <td class="font-kecil text-white text-center font-bold" id="">TOTAL</td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['1'],0) ?></td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['2'],0) ?></td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['3'],0) ?></td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['4'],0) ?></td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['5'],0) ?></td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['6'],0) ?></td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['7'],0) ?></td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['8'],0) ?></td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['9'],0) ?></td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['10'],0) ?></td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['11'],0) ?></td>
                                <td class="font-kecil text-white text-end" id=""><?= rupiah($totalbawah['12'],0) ?></td>
                                <td class="font-kecil text-white font-bold text-end" id=""><?= rupiah($totalujung,0) ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
