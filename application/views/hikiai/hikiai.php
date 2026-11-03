<!-- Page header -->
<div class="page-header d-print-none m-2">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Transaksi
                </div>
                <h2 class="page-title">
                    Hikiai
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="mb-0 row">
                    <label class="col-5 col-form-label font-kecil">Exp/Dom</label>
                    <div class="col">
                        <?php $iduser = datauser($this->session->userdata('id'),'rolecrm'); ?>
                        <select class="form-select font-kecil" id="select-tipe" name="select-tipe" <?php if($iduser <= 2){ echo "disabled"; } ?>>
                        <option value="">All</option>
                        <option value="Export" <?php if($this->session->userdata('kode-hikiai')=='Export'){ echo "selected"; } ?>>Export</option>
                        <option value="Domestic" <?php if($this->session->userdata('kode-hikiai')=='Domestic'){ echo "selected"; } ?>>Domestic</option>
                      </select>
                    </div>
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
                <div class="card card-active">
                    <div class="card-body p-1">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4"></div>
                            <div class="col-4 d-flex justify-content-end">
                                <div class="row mt-1 font-kecil justify-content-end">
                                    <label class="col-3 col-form-label text-end">Periode</label>
                                    <div class="col d-flex">
                                        <select id="bulan-hik" name="bulan-hik" class="form-select font-kecil me-1">
                                            <option value="">Semua</option>
                                            <option value="1" <?php if($this->session->userdata('bulan-hik')==1){ echo "selected"; } ?>>Januari</option>
                                            <option value="2" <?php if($this->session->userdata('bulan-hik')==2){ echo "selected"; } ?>>Februari</option>
                                            <option value="3" <?php if($this->session->userdata('bulan-hik')==3){ echo "selected"; } ?>>Maret</option>
                                            <option value="4" <?php if($this->session->userdata('bulan-hik')==4){ echo "selected"; } ?>>April</option>
                                            <option value="5" <?php if($this->session->userdata('bulan-hik')==5){ echo "selected"; } ?>>Mei</option>
                                            <option value="6" <?php if($this->session->userdata('bulan-hik')==6){ echo "selected"; } ?>>Juni</option>
                                            <option value="7" <?php if($this->session->userdata('bulan-hik')==7){ echo "selected"; } ?>>Juli</option>
                                            <option value="8" <?php if($this->session->userdata('bulan-hik')==8){ echo "selected"; } ?>>Agustus</option>
                                            <option value="9" <?php if($this->session->userdata('bulan-hik')==9){ echo "selected"; } ?>>September</option>
                                            <option value="10" <?php if($this->session->userdata('bulan-hik')==10){ echo "selected"; } ?>>Oktober</option>
                                            <option value="11" <?php if($this->session->userdata('bulan-hik')==11){ echo "selected"; } ?>>Nopember</option>
                                            <option value="12" <?php if($this->session->userdata('bulan-hik')==12){ echo "selected"; } ?>>Desember</option>
                                        </select>
                                        <input type="text" name="tahun-hik" id="tahun-hik" class="form-control font-kecil me-1" value="<?= $this->session->userdata('tahun-hik') ?>">
                                        <a href="#" class="btn btn-sm btn-success" id="updatehikiai">Update</a>
                                    </div>
                                    <?php $cekdisable = $this->session->userdata('kode-hikiai')!='' ? '' : 'disabled'; ?>
                                    <a href="<?= base_url().'hikiai\tambahdata' ?>" id="btntambahhikiai" data-bs-toggle="modal" data-bs-target="#modal-large-loading" data-title="Add Hikiai" class="btn btn-sm btn-primary mt-1 w-75 font-kecil <?= $cekdisable ?>">Tambah Data</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-3">
                        <div class="row mt-1 font-kecil">
                            <label class="col-4 col-form-label">Per-page</label>
                            <div class="col">
                                <select id="perpage-hikiai" name="perpage-hikiai" class="form-select font-kecil">
                                    <option value="15" <?php if($this->session->userdata('perpage-hikiai')==15){ echo "selected"; } ?>>15</option>
                                    <option value="25" <?php if($this->session->userdata('perpage-hikiai')==25){ echo "selected"; } ?>>25</option>
                                    <option value="50" <?php if($this->session->userdata('perpage-hikiai')==50){ echo "selected"; } ?>>50</option>
                                    <option value="75" <?php if($this->session->userdata('perpage-hikiai')==75){ echo "selected"; } ?>>75</option>
                                    <option value="100" <?php if($this->session->userdata('perpage-hikiai')==100){ echo "selected"; } ?>>100</option>
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
                            <input type="text" class="form-control font-kecil" id="textcarihikiai" placeholder="Cari data.." value="<?= $this->session->userdata('cari-hikiai') ?>">
                            <button class="btn btn-success font-kecil" id="btncarihikiai" type="button">Cari !</button>
                        </div>
                    </div>
                </div>
                <table id="tabelnya" class="table table-hover table-bordered cell-border mt-2 mb-0" style="width: 100% !important; border-collapse: collapse;"> <!-- table order-column table-hover table-bordered cell-border -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>#</th>
                            <th>Nomor</th>
                            <th>Nomor Hikiai</th>
                            <th>Customer</th>
                            <th>Perihal</th>
                            <th>Pcs</th>
                            <th>Kgs</th>
                            <th>Status</th>
                            <th>Act</th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody" id="body-table" style="font-size: 13px !important; width: 100% !important;">
                        <?php if($data->num_rows() > 0): ?>
                            <?php $no= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; foreach($data->result_array() as $dt): $no++; ?>
                            <?php 
                                switch ($dt['status_hikiai']) {
                                    case 0:
                                        $strstat = 'Input Data';
                                        $badgestat = 'badge badge-outline text-dark';
                                        break;
                                    case 1:
                                        $strstat = 'Selesai Input';
                                        $badgestat = 'badge bg-blue text-blue-fg';
                                        break;
                                    case 2:
                                        $strstat = 'Kirim PPIC';
                                        $badgestat = 'badge badge-outline text-pink';
                                        break;
                                    case 3:
                                        $strstat = 'Proses Hitung PPIC '."\r\n";
                                        $badgestat = 'badge bg-pink text-pink-fg';
                                        break;
                                    case 4:
                                        $strstat = 'Limit Diterima';
                                        $badgestat = 'badge bg-green text-green-fg';
                                        break;
                                    case 5:
                                        $strstat = 'Sudah dijawab Marketing';
                                        $badgestat = 'badge bg-yellow text-black';
                                        break;
                                    case 6:
                                        $strstat = 'Proses Produksi';
                                        $badgestat = 'badge bg-azure text-azure-fg';
                                        break;
                                    case 6:
                                        $strstat = 'Close';
                                        $badgestat = 'badge bg-azure text-azure-fg';
                                        break;
                                    case 99:
                                        $strstat = 'Cancel';
                                        $badgestat = 'badge bg-red text-red-fg';
                                        break;
                                    default:
                                        # code...
                                        break;
                                }
                             ?>
                                <tr>
                                    <td class="text-center">#<?= $no ?></td>
                                    <td class="text-center <?php if($dt['exdo']=='Domestic'){ echo 'text-cyan'; }else{ echo 'text-primary'; } ?>"><?php if($dt['exdo']=='Domestic'){ echo 'DO'; }else{ echo 'EX'; } ?></td>
                                    <td class="font-kecil line-11"><span class="text-pink font-10"><?= tglmysql($dt['tgl_hikiai']) ?></span><br><?= $dt['kode'] ?></td>
                                    <?php if($dt['status_hikiai']!=0): ?>
                                        <td class="font-kecil"><a href="<?= base_url().'hikiai/viewdetail/'.$dt['id'] ?>" data-bs-toggle="offcanvas" data-bs-target="#canvasdet" data-title="View Detail Hikiai"><?= $dt['nomor'] ?></a></td>
                                    <?php else: ?>
                                        <td class="font-kecil"><?= $dt['nomor'] ?></td>
                                    <?php endif; ?>
                                    <td class="font-kecil"><?= $dt['nama_customer'] ?></td>
                                    <td class="font-kecil"><?= $dt['perihal'] ?></td>
                                    <td class="text-end"><?= rupiah($dt['pcs'],0) ?></td>
                                    <td class="text-end"><?= rupiah($dt['kgs'],2) ?></td>
                                    <td class="font-kecil text-center"><span class="<?= $badgestat ?>"><?= $strstat ?></span></td>
                                    <td class="text-center font-kecil line-12">
                                        <?php if($dt['status_hikiai']==0){ ?>
                                            <a href="<?= base_url().'hikiai/edithikiai/'.$dt['id'] ?>" class="btn btn-primary btn-sm font-10">Edit</a>
                                            <a href="#" data-href="<?= base_url().'hikiai/hapushikiai/'.$dt['id'] ?>" class="btn btn-danger btn-sm font-10" data-bs-toggle="modal" data-bs-target="#modal-danger" data-message="Anda akan menghapus data ini">Hapus</a>
                                        <?php }elseif($dt['status_hikiai']==1){ ?>
                                            <a href="#" data-href="<?= base_url().'hikiai/editbatalhikiai/'.$dt['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-info" data-message="Akan mengedit data ini" class="btn btn-primary btn-sm font-10 line-11" title="<?= 'Dibuat :'.datauser($dt['dibuat_oleh'])."\r\n".'Pada :'.tglmysql2($dt['dibuat_pada']) ?>">Edit</a>
                                            <a href="#" data-href="<?= base_url().'hikiai/kirimppic/'.$dt['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-info" data-message="Kirim ke PPIC untuk Hitung Delivery Time" class="btn btn-success btn-sm font-10 line-11">Kirim PPIC</a>
                                        <?php }elseif($dt['status_hikiai']==2){ ?>
                                            <span class="text-primary">Menunggu diterima<br>PPIC</span>
                                        <?php }elseif($dt['status_hikiai']==4){ ?>
                                            <a href="<?= base_url().'hikiai/viewhitunghikiai/'.$dt['id'] ?>" class="btn btn-primary btn-sm font-10 line-11">View Hikiai</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center font-kecil">-- Tidak Ada Data --</td>
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