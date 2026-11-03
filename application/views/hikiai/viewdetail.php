<div class="container-xl">
    <!-- <div class="card p-1">
        <div class="card-body p-1">
            XX
        </div>
    </div> -->
    <table class="table table-bordered m-0">
        <thead class="bg-primary-lt">
            <tr>
                <th class="text-center text-black">Tgl/Kode</th>
                <th class="text-center text-black">Nomor</th>
                <th class="text-center text-black">Customer</th>
                <th class="text-center text-black">Perihal</th>
                <th class="text-center text-black">Status</th>
            </tr>
        </thead>
        <tbody class="table-tbody">
            <?php 
                switch ($data['status_hikiai']) {
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
                        $strstat = 'Hitung PPIC';
                        $badgestat = 'badge bg-pink text-pink-fg';
                        break;
                    case 4:
                        $strstat = 'Limit Diterima';
                        $badgestat = 'badge bg-green text-green-fg';
                        break;
                    case 5:
                        $strstat = 'Closed';
                        $badgestat = 'badge';
                        break;
                    case 6:
                        $strstat = 'Cancel';
                        $badgestat = 'badge bg-red text-red-fg';
                        break;
                    default:
                        # code...
                        break;
                }
            ?>
            <tr>
                <td class="font-kecil line-11"><span class="font-10 text-pink"><?= tglmysql($data['tgl_hikiai']) ?></span><br><?= $data['kode'] ?></td>
                <td class="font-kecil font-bold"><?= $data['nomor'] ?></td>
                <td class="font-kecil"><?= $data['nama_customer'] ?></td>
                <td class="font-kecil"><?= $data['perihal'] ?></td>
                <td class="font-kecil text-center"><span class="<?= $badgestat ?>"><?= $strstat ?></span></td>
            </tr>
        </tbody>
    </table>
    <h5 class="font-bold m-0 mt-2">Remark</h5>
    <table class="table table-bordered m-0">
        <!-- <thead class="bg-primary-lt">
            <tr>
                <th class="text-center text-black">Tgl/Kode</th>
                <th class="text-center text-black">Nomor</th>
                <th class="text-center text-black">Customer</th>
                <th class="text-center text-black">Perihal</th>
                <th class="text-center text-black">Status</th>
            </tr>
        </thead> -->
        <tbody class="table-tbody">
            <?php if(trim($data['remark_1'])!='' || trim($data['remark_2'])!='' || trim($data['remark_3'])!='' || trim($data['remark_4'])!=''): ?>
                <tr>
                    <td class="font-10 font-bold text-end"><?= $data['remark_1'] ?></td>
                    <td class="font-10" style="white-space: pre-line;"><?= $data['remark_teks_1'] ?></td>
                    <td class="font-10 font-bold text-end"><?= $data['remark_2'] ?></td>
                    <td class="font-10" style="white-space: pre-line;"><?= $data['remark_teks_2'] ?></td>
                </tr>
                <tr> 
                    <td class="font-10 font-bold text-end"><?= $data['remark_3'] ?></td>
                    <td class="font-10" style="white-space: pre-line;"><?= $data['remark_teks_3'] ?></td>
                    <td class="font-10 font-bold text-end"><?= $data['remark_4'] ?></td>
                    <td class="font-10" style="white-space: pre-line;"><?= $data['remark_teks_4'] ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td class="font-kecil text-center">-- Tidak ada Remark --</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="card mt-2">
        <div class="card-body p-1">
            <h5 class="text-dark bg-danger-lt p-1 mb-1">Data Detail Hikiai</h5>
            <table class="table table-bordered m-0">
                <thead class="bg-primary-lt">
                    <tr>
                        <th class="text-center text-black">Item</th>
                        <th class="text-center text-black">Spesifikasi</th>
                        <th class="text-center text-black">Unit</th>
                        <th class="text-center text-black">Pcs</th>
                        <th class="text-center text-black">Kgs</th>
                        <th class="text-center text-black">Delivery Time</th>
                    </tr>
                </thead>
                <tbody class="table-tbody">
                    <?php $jmlrek = 0; $jmlpcs=0; $jmlkgs=0; foreach($datadetail->result_array() as $det): $jmlrek++; $jmlpcs += $det['pcs']; $jmlkgs += $det['kgs']; ?>
                    <?php $deltime = $data['status_hikiai'] > 3 ? '<a href="#" data-bs-toggle="modal" data-bs-target="#modal-info">'.limitmp($det['tgl_dt']).'</a>' : '-'; ?>
                        <tr>
                            <td class="font-kecil text-center font-bold">#<?= $det['item'] ?></td>
                            <td class="font-kecil"><?= $det['spesifikasi'] ?></td>
                            <td class="font-kecil"><?= $det['kodesatuan'] ?></td>
                            <td class="font-kecil text-end"><?= rupiah($det['pcs'],0) ?></td>
                            <td class="font-kecil text-end"><?= rupiah($det['kgs'],2) ?></td>
                            <td class="font-kecil text-red"><?= $deltime ?></td>
                        </tr>
                        <?php if($data['status_hikiai']==5): foreach($dataeps->result_array() as $deps): if($det['id']==$deps['id_hikiai_detail']): ?>
                            <tr>
                                <td class="text-end">-</td>
                                <td colspan="5" class="font-10 line-11">
                                    <div style="float: left;">
                                        <span class="font-bold bg-yellow-lt"><span class="text-black">EPS NOTE</span></span><br>
                                        Mach No.<span class="text-red font-10"><?= $deps['machno'] ?></span><br>
                                        Net Prod. <span class="text-red font-10"><?= tglmysql($deps['tgl_mulai']).' s/d '.tglmysql($deps['tgl_akhir']) ?></span><span class="font-10 text-primary"> (<?= hitunghari($deps['tgl_mulai'],$deps['tgl_akhir']) ?> Hari)</span><br>
                                        Est Masuk Gudang. <span class="text-red font-10"><?= tglmysql($deps['tgl_kirim_gudang']) ?></span><br>
                                    </div>
                                    <div class="text-end" style="float: right;">
                                        <?php if($deps['stat']==0): ?>
                                        <a href="<?= base_url().'hikiai/jawabeps/'.$deps['id'].'/'.$data['id'] ?>" class="btn btn-smx btn-success btn-flat font-10" data-bs-toggle="modal" data-bs-target="#modal-simple" data-title="Jawab EPS">Jawab EPS</a>
                                        <?php elseif($deps['stat']==1): ?>
                                            <span class="badge bg-blue text-blue-fg">Setuju PO</span><br>
                                            <span><?= $deps['ket_stat'] ?></span><br>
                                            <?= 'Oleh .'.datauser($deps['stat_oleh']) ?><br>
                                            <?= 'Pada .'.tglmysql2($deps['stat_pada']) ?>
                                        <?php else: ?>
                                            <span class="badge badge-outline text-red">Cancel</span><br>
                                            <span><?= $deps['ket_stat'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; endforeach; endif; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td class="font-kecil text-center"> Total Item : <?= $jmlrek ?></td>
                        <td colspan="2" class="font-kecil font-bold text-end">Total</td>
                        <td class="font-kecil text-end"><?= rupiah($jmlpcs,0) ?></td>
                        <td class="font-kecil text-end"><?= rupiah($jmlkgs,2) ?></td>
                        <td class="font-kecil"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    
</script>