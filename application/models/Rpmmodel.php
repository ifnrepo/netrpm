<?php
class Rpmmodel extends CI_Model 
{
    protected $db2;

    public function __construct() {
        parent::__construct();
        // Load the second database and return the object
        $this->db2 = $this->load->database('hrd', TRUE);
    }

    public function getdatamesin($isi){
        $kata = '';
        if(str_contains(trim($isi)," ")){
            $pisah = explode(" ",trim($isi));
            $hasil = '';
            foreach($pisah as $ps){
                $hasil .= $ps.'%';
            }
            $kata = substr($hasil,0,strlen($hasil)-1);
        }else{
            $kata = trim($isi);
        }
        $this->db->select('*');
        // $this->db->join('kategori','kategori.kategori_id = tb_produk.kategori_id','left');
        $this->db->like('mach_no',$kata,'both', FALSE);
        $this->db->or_like('maker',$kata,'both', FALSE);
        $this->db->limit(10);
        return $this->db->get('tb_msn_netting');
    }
    public function getdatamesinall(){
        $this->db->order_by('mach_no');
        return $this->db->get_where('tb_msn_netting',['idle' => 0]);
    }
    public function getdatarpmbaru(){
        $lokasi = getlokasimesin($this->session->userdata('msnrpm'));
        $this->db->select('ref_waktu_nt.*');
        $this->db->where('ref_waktu_nt.psm',$this->session->userdata('shiftrpm'));
        if(getnamahari(tglmysql($this->session->userdata('tglrpm')))==6 && $lokasi=='Indoneptune'){
            $this->db->where('ref_waktu_nt.sabtu',1);
        }else{
            $this->db->where('ref_waktu_nt.sabtu',0);
        }
        return $this->db->get('ref_waktu_nt');
    }
    public function getdatainput(){
        $lokasi = getlokasimesin($this->session->userdata('msnrpm'));
        $this->db->select('ref_waktu_nt.*');
        $this->db->where('ref_waktu_nt.psm',$this->session->userdata('shiftrpm'));
        if(getnamahari(tglmysql($this->session->userdata('tglrpm')))==6 && $lokasi=='Indoneptune'){
            $this->db->where('ref_waktu_nt.sabtu',1);
        }else{
            $this->db->where('ref_waktu_nt.sabtu',0);
        }
        $this->db->order_by('id');
        $this->db->limit(1);
        $xidwaktu = $this->db->get('ref_waktu_nt');
        if($xidwaktu->num_rows() > 0){
            $idwaktu = $xidwaktu->row_array();
            $this->db->select('tb_rpmnet.*');
            $this->db->where('tgl',$this->session->userdata('tglrpm'));
            $this->db->where('mach_no',$this->session->userdata('msnrpm'));
            $this->db->where('id_waktu',$idwaktu['id']);
            $data = $this->db->get('tb_rpmnet');
            $cek = 0;
            if($data->num_rows()==0){
                $this->db->select('tb_rpmnet.*');
                $this->db->where('mach_no',$this->session->userdata('msnrpm'));
                $this->db->order_by('id DESC');
                $this->db->limit(1);
                $rec = $this->db->get('tb_rpmnet');
                if($rec->num_rows() > 0){
                    $cek = 1;
                    $reci = $rec->row_array();
                    $reci['tgl'] = $this->session->userdata('tglrpm');
                    $reci['id_waktu'] = $idwaktu['id'];
                    unset($reci['id']);
                    unset($reci['lot']);
                    unset($reci['nomor_lot']);
                    unset($reci['ket']);
                    unset($reci['ketrpm']);
                    unset($reci['rpm_akhir']);
                    $this->db->insert('tb_rpmnet',$reci);
                }
            }
        }
        $this->db->select('tb_rpmnet.*');
        $this->db->where('tgl',$this->session->userdata('tglrpm'));
        $this->db->where('mach_no',$this->session->userdata('msnrpm'));
        return $this->db->get('tb_rpmnet');
    }
    public function getdataisi(){
        $this->db->select('tb_rpmnet.*');
        $this->db->where('tgl',$this->session->userdata('tglreprpm'));
        $this->db->where('mach_no',$this->session->userdata('msnreprpm'));
        // $this->db->where('id_waktu',$idwaktu['id']);
        $this->db->order_by('id_waktu');
        return $this->db->get('tb_rpmnet');
    }
    public function getdatarpmrep($shift,$mode=0){
        $lokasi = getlokasimesin($this->session->userdata('msnreprpm'));
        $this->db->select('ref_waktu_nt.*');
        $this->db->where('ref_waktu_nt.psm',$shift);
        if(getnamahari(tglmysql($this->session->userdata('tglreprpm')))==6 && $lokasi=='Indoneptune'){
            $this->db->where('ref_waktu_nt.sabtu',1);
        }else{
            $this->db->where('ref_waktu_nt.sabtu',0);
        }
        if($mode==1){
            $this->db->order_by('id');
            $this->db->limit(1);
        }
        return $this->db->get('ref_waktu_nt');
    }
    public function getdatarpmperson($shift){
        $lokasi = getlokasimesin($this->session->userdata('msnreprpm'));
        $this->db->select('ref_waktu_nt.*,tb_rpmnet.*');
        $this->db->join('tb_rpmnet','tb_rpmnet.id_waktu = ref_waktu_nt.id','left');
        $this->db->where('ref_waktu_nt.psm',$shift);
        if(getnamahari(tglmysql($this->session->userdata('tglreprpm')))==6 && $lokasi=='Indoneptune'){
            $this->db->where('ref_waktu_nt.sabtu',1);
        }else{
            $this->db->where('ref_waktu_nt.sabtu',0);
        }
        $this->db->where('tb_rpmnet.tgl',$this->session->userdata('tglreprpm'));
        $this->db->where('tb_rpmnet.mach_no',$this->session->userdata('msnreprpm'));
        $this->db->where('tb_rpmnet.totalrpm >',0);
        $this->db->order_by('tb_rpmnet.id_waktu');
        $this->db->limit(1);
        return $this->db->get('ref_waktu_nt');
    }
    public function getdatarpm(){
        $this->db->select('ref_waktu_nt.*,tb_rpmnet.insno,tb_rpmnet.rpm,tb_rpmnet.rpm_awal,,tb_rpmnet.rpm_akhir,tb_rpmnet.nomor_lot');
        $this->db->select('tb_rpmnet.pj,tb_rpmnet.cek,tb_rpmnet.rpmduapuluh,tb_rpmnet.ket,tb_rpmnet.ketrpm,tb_rpmnet.lot,tb_rpmnet.id as idrpm');
        $this->db->select('tb_rpmnet.po,tb_rpmnet.item,tb_rpmnet.dis');
        $this->db->join('tb_rpmnet','tb_rpmnet.id_waktu = ref_waktu_nt.id','left');
        // $this->db->where('tb_rpmnet.tgl',$this->session->userdata('tglrpm'));
        $this->db->where('ref_waktu_nt.psm',$this->session->userdata('shiftrpm'));
        if(getnamahari(tglmysql($this->session->userdata('tglrpm')))==6 && getlokasimesin($this->session->userdata('msnrpm'))=='Indoneptune'){
            $this->db->where('ref_waktu_nt.sabtu',1);
        }else{
            $this->db->where('ref_waktu_nt.sabtu',0);
        }
        return $this->db->get('ref_waktu_nt');
    }
    public function getdatarpm2(){
        $this->db->select('ref_waktu_nt.*,tb_rpmnet.insno,tb_rpmnet.rpm,tb_rpmnet.rpm_awal,,tb_rpmnet.rpm_akhir,tb_rpmnet.nomor_lot');
        $this->db->select('tb_rpmnet.pj,tb_rpmnet.cek,tb_rpmnet.rpmduapuluh,tb_rpmnet.ket,tb_rpmnet.ketrpm,tb_rpmnet.lot,tb_rpmnet.id as idrpm');
        $this->db->select('tb_rpmnet.po,tb_rpmnet.item,tb_rpmnet.dis');
        $this->db->join('ref_waktu_nt','tb_rpmnet.id_waktu = ref_waktu_nt.id','right');
        // $this->db->where('tb_rpmnet.tgl',$this->session->userdata('tglrpm'));
        $this->db->where('ref_waktu_nt.psm',$this->session->userdata('shiftrpm'));
        if(getnamahari(tglmysql($this->session->userdata('tglrpm')))==6 && getlokasimesin($this->session->userdata('msnrpm'))=='Indoneptune'){
            $this->db->where('ref_waktu_nt.sabtu',1);
        }else{
            $this->db->where('ref_waktu_nt.sabtu',0);
        }
        return $this->db->get('tb_rpmnet');
    }
    public function getdatarpmbyid($id){

    }
    public function getlastpo(){
        $msn = $this->session->userdata('msnrpm');
        $this->db->select('*');
        $this->db->from('tb_rpmnet');
        $this->db->where('mach_no',$msn);
        $this->db->where('trim(po) !=','');
        $this->db->where('rpm >',0);
        $this->db->order_by('id DESC');
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }
    public function getdatapoinsno($isi){
        $kata = '';
        if(str_contains(trim($isi)," ")){
            $pisah = explode(" ",trim($isi));
            $hasil = '';
            foreach($pisah as $ps){
                $hasil .= $ps.'%';
            }
            $kata = substr($hasil,0,strlen($hasil)-1);
        }else{
            $kata = trim($isi);
        }
        $this->db->select('tb_netinstr.*,tb_po.spek');
        $this->db->join('tb_po','concat(tb_netinstr.po,tb_netinstr.item,tb_netinstr.dis) = tb_po.ind_po','left');
        $this->db->like('tb_netinstr.po',$kata,'both', FALSE);
        $this->db->or_like('tb_netinstr.insno',$kata,'both', FALSE);
        $this->db->order_by('tb_netinstr.po ASC,CAST(tb_netinstr.item AS UNSIGNED) ASC');
        $this->db->limit(100);
        return $this->db->get('tb_netinstr');
    }
    public function getnomorlot($data){
        $cekjml = 0;$cekakhir=0;
        $datains = $this->db->get_where('tb_netinstr',$data);
        if($datains->num_rows() > 0){
            $hasildatains = $datains->row_array();
            $cekjml = $hasildatains['lot'];
        }

        $datarpm = $this->db->order_by('nomor_lot DESC')->get_where('tb_rpmnet',$data);
        if($datarpm->num_rows() > 0){
            $hasildatarpm = $datarpm->row_array();
            $cekakhir = $hasildatarpm['nomor_lot'];
            if($hasildatarpm['nomor_lot2']!=0){
                $cekakhir = $hasildatarpm['nomor_lot2'];
            }
        }else{
            $cekakhir = 0;
        }

        return $arrdat = ['jmllot' => $cekjml,'lotakhir' => $cekakhir];
    }
    public function simpandata($data){
        $this->db->trans_start();
        $arrayawal = [10,19,28,37,43,49,1];
        $filter = [
            'po' => $data['po'],
            'item' => $data['item'],
            'dis' => $data['dis'],
        ];
        $datainsno = $this->db->get_where('tb_po',$filter)->row_array();
        $data['rpm'] = $datainsno['netrev'];
        if(isset($data['nomor_lot'])){
            $data['rpm_akhir'] = $data['nomor_lot']!='' ? $data['rpm'] : toangka($data['sisa']);
        }else{
            $data['rpm_akhir'] = toangka($data['sisa']);
            unset($data['sisa']);
        }
        if(isset($data['nomor_lot2']) && $data['nomor_lot2']!=0){
            $datasisa = isset($data['sisa']) ? toAngka($data['sisa']) : 0;
            $data['rpm_akhir'] = $data['nomor_lot']!='' ? $data['rpm']*2 : $datasisa;
        }
        if(!in_array($data['id_waktu'],$arrayawal)){
            unset($data['rpm_awal']);
        }else{
            $data['rpm_awal'] = toAngka($data['rpm_awal']);
        }

        //Cek lot untuk mengupdate status pada Netinstr 
        if(isset($data['lot']) && $data['lot']==1){
            $kondisifilter = [
                'po' => $data['po'],
                'item' => $data['item'],
                'dis' => $data['dis'],
                'insno' => $data['insno']
            ];
            $datanetinstr = $this->db->get_where('tb_netinstr',$kondisifilter)->row_array();
            $lotakhir = $datanetinstr['lot'];
            $idinsno = $datanetinstr['id'];
            if($data['nomor_lot']!=$lotakhir || $data['nomor_lot2']!=$lotakhir){
                $this->db->where('id',$idinsno);
                $this->db->update('tb_netinstr',['descn' => 'PROCESS']);
            }
            if($data['nomor_lot']==$lotakhir || $data['nomor_lot2']==$lotakhir){
                $this->db->where('id',$idinsno);
                $this->db->update('tb_netinstr',['descn' => 'FINISHED']);

                $data['lotterakhir'] = 1;
            }
        }
        $this->db->insert('tb_rpmnet',$data);
        simpantotal($data['id_waktu'],$this->session->userdata('tglrpm'),$this->session->userdata('msnrpm'));

        if(getjamkerjanet($data['id_waktu'])=='SISA'){
            $arraysisa = [9,18,27,36,42,48,55];
            if(in_array($data['id_waktu'],$arraysisa)){
                $data['rpm_awal'] = $data['rpm_akhir'];
                $data['rpm_akhir'] = 0;
                if($data['id_waktu']==27 || $data['id_waktu']==55){
                    if(getlokasimesin($this->session->userdata('msnrpm'))=='Indoneptune'){
                        if(getnamahari(tglmysql($this->session->userdata('tglrpm')))==5){
                            $data['id_waktu'] = $data['id_waktu']==27 ? 28 : 1;
                        }else{
                            $data['id_waktu'] = 1;
                        }
                    }else{
                        $data['id_waktu'] = $data['id_waktu']==27 ? 1 : ($data['id_waktu']==55 ? 1 : 28 );
                    }
                    $currentDate = $data['tgl'];
                    $nextDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
                    $data['tgl'] = $nextDate;
                }else{
                    $data['id_waktu'] = $data['id_waktu'] + 1;
                }
            }
            $kondisi = [
                'tgl' => $data['tgl'],
                'id_waktu' => $data['id_waktu'],
                'mach_no' => $this->session->userdata('msnrpm')
            ];
            $cekdata = $this->db->get_where('tb_rpmnet',$kondisi);
            if($cekdata->num_rows() > 0){
                $xcekdata = $cekdata->row_array();

                unset($data['id']);
                $this->db->where('id',$xcekdata['id']);
                $this->db->update('tb_rpmnet',$data);
            }else{
                unset($data['id']);
                $this->db->insert('tb_rpmnet',$data);
            }
        }
        return $this->db->trans_complete();
    }
    public function editdata($data){
        $this->db->trans_start();
        $arrayawal = [10,19,28,37,43,49,1];
        $filter = [
            'po' => $data['po'],
            'item' => $data['item'],
            'dis' => $data['dis'],
        ];
        $datainsno = $this->db->get_where('tb_po',$filter)->row_array();
        $data['rpm'] = $datainsno['netrev'];
        if(isset($data['nomor_lot'])){
            $datasisa = isset($data['sisa']) ? toAngka($data['sisa']) : 0;
            $data['rpm_akhir'] = $data['nomor_lot']!='' ? $data['rpm'] : $datasisa;
        }else{
            $data['rpm_akhir'] = toangka($data['sisa']);
            unset($data['sisa']);
        }
        if(isset($data['nomor_lot2']) && $data['nomor_lot2']!=0){
            $datasisa = isset($data['sisa']) ? toAngka($data['sisa']) : 0;
            $data['rpm_akhir'] = $data['nomor_lot']!='' ? $data['rpm']*2 : $datasisa;
        }
        if(!in_array($data['id_waktu'],$arrayawal)){
            unset($data['rpm_awal']);
        }else{
            $data['rpm_awal'] = toAngka($data['rpm_awal']);
        }

        //Cek lot untuk mengupdate status pada Netinstr 
        if(isset($data['lot']) && $data['lot']==1){
            $kondisifilter = [
                'po' => $data['po'],
                'item' => $data['item'],
                'dis' => $data['dis'],
                'insno' => $data['insno']
            ];
            $datanetinstr = $this->db->get_where('tb_netinstr',$kondisifilter)->row_array();
            $lotakhir = $datanetinstr['lot'];
            $idinsno = $datanetinstr['id'];
            if($data['nomor_lot']!=$lotakhir || $data['nomor_lot2']!=$lotakhir){
                $this->db->where('id',$idinsno);
                $this->db->update('tb_netinstr',['descn' => 'PROCESS']);
            }
            if($data['nomor_lot']==$lotakhir || $data['nomor_lot2']==$lotakhir){
                $this->db->where('id',$idinsno);
                $this->db->update('tb_netinstr',['descn' => 'FINISHED']);

                $data['lotterakhir'] = 1;
            }
        }
        $this->db->where('id',$data['id']);
        $this->db->update('tb_rpmnet',$data);
        simpantotal($data['id_waktu'],$this->session->userdata('tglrpm'),$this->session->userdata('msnrpm'));

        if(getjamkerjanet($data['id_waktu'])=='SISA'){
            $arraysisa = [9,18,27,36,42,48,55];
            if(in_array($data['id_waktu'],$arraysisa)){
                $kondisi = [
                    'tgl' => $data['tgl'],
                    'id_waktu' => (int) $data['id_waktu']+1,
                ];
                $id = $this->db->get_where('tb_rpmnet',$kondisi);
                if($id->num_rows() > 0){
                    $idx = $id->row_array();

                    $data['tgl'] = $data['tgl'];
                    $data['rpm_awal'] = toAngka($data['rpm_akhir']);
                    // $data['rpm_akhir'] = 0;
                    $data['id_waktu'] = (int) $data['id_waktu']+1;
                    unset($data['id']);
                    unset($data['ket']);
                    unset($data['ketrpm']);
                    unset($data['rpm_akhir']);
                    unset($data['lot']);
                    unset($data['nomor_lot']);
                    $this->db->where('id',$idx['id']);
                    $this->db->update('tb_rpmnet',$data);
                }else{
                    $data['tgl'] = $data['tgl'];
                    $data['rpm_awal'] = toAngka($data['rpm_akhir']);
                    $data['rpm_akhir'] = 0;
                    $data['id_waktu'] = (int) $data['id_waktu']+1;
                    unset($data['id']);
                    unset($data['ket']);
                    unset($data['ketrpm']);
                    $this->db->insert('tb_rpmnet',$data);
                }
            }
        }
        return $this->db->trans_complete();
    }
    public function getdatarpmnya($id){
        return $this->db->get_where('tb_rpmnet',['id' => $id])->row_array();
    }
    public function hapusdata($id){
        $this->db->where('id',$id);
        $cekhasil = $this->db->get('tb_rpmnet')->row_array();
        if($cekhasil['noinduk_1'] != '' || $cekhasil['noinduk_2'] != ''){
            $this->db->where('id',$id);
            return $this->db->update('tb_rpmnet',['rpm' => 0,'rpm_awal' => 0,'rpm_akhir' => 0,'lot' => 0,'nomor_lot' => 0,'ket' => '','ketrpm' => '','noinduk_1' => '','noinduk_2' => '']);
        }else{
            $this->db->where('id',$id);
            return $this->db->delete('tb_rpmnet');
        }
    }
    public function getkoderusak(){
        return $this->db->get('tb_rusaknet');
    }
}