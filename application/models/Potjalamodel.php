<?php
class Potjalamodel extends CI_Model 
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
    public function getdata(){
        $msn = $this->session->userdata('msnpot')=='' ? '@#$' : $this->session->userdata('msnpot');
        $this->db->select('tb_rpmnet.*,ref_waktu_nt.waktu');
        $this->db->join('ref_waktu_nt','ref_waktu_nt.id = tb_rpmnet.id_waktu','left');
        $this->db->where('mach_no',$msn);
        $this->db->where('pj',1);
        $this->db->order_by('tgl DESC, id_waktu DESC');
        return $this->db->get('tb_rpmnet');
    }
    public function getdatabyid($id){
        $msn = $this->session->userdata('msnpot')=='' ? '@#$' : $this->session->userdata('msnpot');
        $this->db->select('tb_rpmnet.*,ref_waktu_nt.waktu');
        $this->db->join('ref_waktu_nt','ref_waktu_nt.id = tb_rpmnet.id_waktu','left');
        $this->db->where('tb_rpmnet.id',$id);
        // $this->db->where('pj',1);
        $this->db->order_by('tgl DESC, id_waktu DESC');
        return $this->db->get('tb_rpmnet')->row_array();
    }
    public function getdatainput(){
        $lokasi = getlokasimesin($this->session->userdata('msnrpm'));
        $this->db->select('ref_waktu_nt.*');
        // $this->db->join('tb_rpmnet','tb_rpmnet.id_waktu = ref_waktu_nt.id','left');
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
        }else{
            $cekakhir = 0;
        }

        return $arrdat = ['jmllot' => $cekjml,'lotakhir' => $cekakhir];
    }
    public function simpandata($data){
        // Cek RPM nya ada atau tidak 
        $this->db->where('po',$data['po']);
        $this->db->where('item',$data['item']);
        $this->db->where('dis',$data['dis']);
        $this->db->where('insno',$data['insno']);
        $this->db->where('id_waktu',$data['id_waktu']);
        $this->db->where('mach_no',$this->session->userdata('msnpot'));
        $this->db->where('tgl',$this->session->userdata('tglpot'));
        $hasil = $this->db->get('tb_rpmnet');
        if($hasil->num_rows() > 0){
            // Apabila rekod ada maka UPDATE
            $xhasil = $hasil->row_array();
            $id = $xhasil['id'];
            $this->db->where('id',$id);
            return $this->db->update('tb_rpmnet',['pj' => 1,'noinduk_pj' => $data['noinduk_pj'],'lot_awal' => $data['lot_awal'],'lot_akhir' => $data['lot_akhir'],'inputpj_on' => date('Y-m-d H:i:s')]);
        }else{
            // Apabila rekod tidak ada maka INSERT
            $datae = [
                'tgl' => $this->session->userdata('tglpot'),
                'id_waktu' => $data['id_waktu'],
                'po' => $data['po'],
                'item' => $data['item'],
                'dis' => $data['dis'],
                'insno' => $data['insno'],
                'mach_no' => $this->session->userdata('msnpot'),
                'pj' => 1,
                'noinduk_pj' => $data['noinduk_pj'],
                'lot_awal' => $data['lot_awal'],
                'lot_akhir' => $data['lot_akhir'],
                'inputpj_on' => date('Y-m-d H:i:s')
            ];
            return $this->db->insert('tb_rpmnet',$datae);
        }
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
        if(!in_array($data['id_waktu'],$arrayawal)){
            unset($data['rpm_awal']);
        }else{
            $data['rpm_awal'] = toAngka($data['rpm_awal']);
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
        if($cekhasil['noinduk_1'] != '' || $cekhasil['noinduk_2'] != '' || $cekhasil['cek'] != 0){
            $this->db->where('id',$id);
            return $this->db->update('tb_rpmnet',['pj' => 0,'lot_awal' => 0,'lot_akhir' => 0,'noinduk_pj' => '']);
        }else{
            $this->db->where('id',$id);
            return $this->db->delete('tb_rpmnet');
        }
    }
    public function getkoderusak(){
        return $this->db->get('tb_rusaknet');
    }
    public function getjamkerja(){
        $lokmesin = getlokasimesin($this->session->userdata('msnpot'));
        $sabtu = getnamahari($this->session->userdata('tglpot'));
        $shift = $this->session->userdata('shiftpot');

        $this->db->select('ref_waktu_nt.*');
        $this->db->where('psm',$shift);
        if($sabtu==6){
            if($lokmesin=='Arroza'){
                $this->db->where('sabtu',0);
            }else{
                $this->db->where('sabtu',1);
            }
        }else{
            $this->db->where('sabtu',0);
        }
        $this->db->where('waktu !=','SISA');
        return $this->db->get('ref_waktu_nt');
    }
    public function getjamkerjatotal(){
        $this->db->where('waktu !=','SISA');
        return $this->db->get('ref_waktu_nt');
    }
}