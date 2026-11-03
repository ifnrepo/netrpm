<?php
class Cekjalamodel extends CI_Model 
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
        $this->db->limit(20);
        return $this->db->get('tb_msn_netting');
    }
    public function getdata(){
        $kata = '';
        $isi = $this->session->userdata('caricek');
        if(trim($isi)!=''){
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
        }
        $msn = $this->session->userdata('msncek')=='' ? '@#$' : $this->session->userdata('msncek');
        $this->db->select('tb_rpmnet.*,ref_waktu_nt.waktu');
        $this->db->join('ref_waktu_nt','ref_waktu_nt.id = tb_rpmnet.id_waktu','left');
        $this->db->where('mach_no',$msn);
        // $this->db->where('tgl',$this->session->userdata('tglcek'));
        $this->db->where('cek',1);
        if(trim($isi)!=''){
            $this->db->group_start();
             $this->db->like('po',$kata,'both', FALSE);
            $this->db->or_like('insno',$kata,'both', FALSE);
            $this->db->group_end();
        }
        $this->db->order_by('tgl DESC, id_waktu DESC');
        $this->db->limit(35);
        return $this->db->get('tb_rpmnet');
    }
    public function getdatabyid($id){
        $msn = $this->session->userdata('msncek')=='' ? '@#$' : $this->session->userdata('msncek');
        $this->db->select('tb_rpmnet.*,ref_waktu_nt.waktu,tb_rpmnet_cek.*');
        $this->db->join('ref_waktu_nt','ref_waktu_nt.id = tb_rpmnet.id_waktu','left');
        $this->db->join('tb_rpmnet_cek','tb_rpmnet_cek.id_cek = tb_rpmnet.id','left');
        $this->db->where('mach_no',$msn);
        // $this->db->where('tgl',$this->session->userdata('tglcek'));
        $this->db->where('tb_rpmnet.id',$id);
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
        $this->db->where('tb_netinstr.machno',$this->session->userdata('msncek'));
        $this->db->group_start();
        $this->db->like('tb_netinstr.po',$kata,'left', FALSE);
        $this->db->or_like('tb_netinstr.insno',$kata,'left', FALSE);
        $this->db->group_end();
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
        $this->db->trans_start();
        // Cek RPM nya ada atau tidak 
        $this->db->where('po',$data['po']);
        $this->db->where('item',$data['item']);
        $this->db->where('dis',$data['dis']);
        $this->db->where('insno',$data['insno']);
        $this->db->where('id_waktu',$data['id_waktu']);
        $this->db->where('mach_no',$this->session->userdata('msncek'));
        $this->db->where('tgl',$this->session->userdata('tglcek'));
        $hasil = $this->db->get('tb_rpmnet');
        if($hasil->num_rows() > 0){
            // Apabila rekod ada maka UPDATE
            $xhasil = $hasil->row_array();
            $id = $xhasil['id'];
            $datae = [
                'cek' => 1,
                'noinduk_cek' => $data['noinduk_cek'],
                'inputcek_on' => date('Y-m-d H:i:s'),
                'ketcek' => $data['ketcek'],
                'lotcek' => $data['lotcek']
            ];
            $this->db->where('id',$id);
            $this->db->update('tb_rpmnet',$datae);

            // Update ke detail cek RPM
            $dataupdate = [
                'cek_benang' => $data['cek_benang'],
                'cek_kakesu' => $data['cek_kakesu'],
                'kakesu' => $data['kakesu'],
                'cek_meai' => $data['cek_meai'],
                'cek_ikatan' => $data['cek_ikatan'],
                'meai' => $data['meai'],
                // 'lotcek' => $data['lotcek'],
                'jalur1' => $data['jalur1'],
                'jalur2' => $data['jalur2'],
                'jalur3' => $data['jalur3'],
                'jalur4' => $data['jalur4'],
                'jalur5' => $data['jalur5'],
                'ukur1' => $data['ukur1'],
                'ukur2' => $data['ukur2'],
                'ukur3' => $data['ukur3'],
                'ukur4' => $data['ukur4'],
                'ukur5' => $data['ukur5']
            ];
            $this->db->where('id_cek',$id);
            $this->db->update('tb_rpmnet_cek',$dataupdate);
        }else{
            // Apabila rekod tidak ada maka INSERT
            $datae = [
                'tgl' => $this->session->userdata('tglcek'),
                'id_waktu' => $data['id_waktu'],
                'po' => $data['po'],
                'item' => $data['item'],
                'dis' => $data['dis'],
                'insno' => $data['insno'],
                'mach_no' => $this->session->userdata('msncek'),
                'cek' => 1,
                'noinduk_cek' => $data['noinduk_cek'],
                'inputcek_on' => date('Y-m-d H:i:s'),
                'ketcek' => $data['ketcek'],
                'lotcek' => $data['lotcek']
            ];
            $this->db->insert('tb_rpmnet',$datae);
            $idx = $this->db->insert_id();
            // Insert ke detail cek RPM
            $dataupdate = [
                'cek_benang' => $data['cek_benang'],
                'cek_kakesu' => $data['cek_kakesu'],
                'kakesu' => $data['kakesu'],
                'cek_meai' => $data['cek_meai'],
                'cek_ikatan' => $data['cek_ikatan'],
                'meai' => $data['meai'],
                // 'lotcek' => $data['lotcek'],
                'jalur1' => $data['jalur1'],
                'jalur2' => $data['jalur2'],
                'jalur3' => $data['jalur3'],
                'jalur4' => $data['jalur4'],
                'jalur5' => $data['jalur5'],
                'ukur1' => $data['ukur1'],
                'ukur2' => $data['ukur2'],
                'ukur3' => $data['ukur3'],
                'ukur4' => $data['ukur4'],
                'ukur5' => $data['ukur5'],
                'id_cek' => $idx
            ];
            $this->db->insert('tb_rpmnet_cek',$dataupdate);
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
        if($cekhasil['noinduk_1'] != '' || $cekhasil['noinduk_2'] != '' || $cekhasil['pj'] != 0){
            $this->db->where('id',$id);
            return $this->db->update('tb_rpmnet',['cek' => 0,'noinduk_cek' => '','ketcek' => '']);
        }else{
            $this->db->where('id',$id);
            return $this->db->delete('tb_rpmnet');
        }
    }
    public function getkoderusak(){
        return $this->db->get('tb_rusaknet');
    }
    public function getjamkerja(){
        $lokmesin = getlokasimesin($this->session->userdata('msncek'));
        $sabtu = getnamahari($this->session->userdata('tglcek'));
        $shift = $this->session->userdata('shiftcek');

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
    public function getdetailinst($data){
        $this->db->select('tb_netinstr.*,tb_po.meai,tb_po.st_meai,tb_po.jenis as xjenis,tb_po.knot');
        $this->db->join('tb_po','tb_po.ind_po = concat(tb_netinstr.po,tb_netinstr.item,tb_netinstr.dis)','left');
        return $this->db->get_where('tb_netinstr',$data);
    }
    public function getmedok($data){
        $fhasil = '';
        $fgo_ = 0;
        $this->db->select('tb_netinstr.*,tb_po.knot');
        $this->db->join('tb_po','tb_po.ind_po = concat(tb_netinstr.po,tb_netinstr.item,tb_netinstr.dis)','left');
        $this->db->where($data);
        $hasil = $this->db->get('tb_netinstr');
        if($hasil->num_rows() > 0){
            $xhasil = $hasil->row_array();
            if($xhasil['sukimeai'] > 0){
                // Cari Fgo 
                if(str_contains($xhasil['jenis'],'MO.')){
                    if(str_contains($xhasil['jenis'],'G')){
                        $fgo_ = trim($xhasil['jenis']);
                    }else{
                        $fgo_ = 'MO._'.str_replace('.0','',trim(mmtgo($xhasil['jenis']))).' G';
                    }
                    $strpos = strpos(str_replace(' ','',$fgo_),'G');
                    $fgo_ = (float) substr(str_replace(' ','',$fgo_),5,$strpos-5);
                }else{
                    if(str_contains($xhasil['jenis'],'MT.')){
                        $strpos = strpos($xhasil['jenis'],'X');
                        $x1 = (float) str_replace('MT._','',substr($xhasil['jenis'],0,$strpos));
                        $x2 = (float) substr($xhasil['jenis'],$strpos+1,5);
                        $fgo_ = $x1 * $x2;
                    }
                }
            }
            $fhasil = $xhasil['sukimeai'].' ME = ';
            if(trim($xhasil['ways'])=='YOKO' && in_array(substr($xhasil['jenis'],0,2),['MT','MO']) && trim($xhasil['knot'])!='S'){
                switch (trim($xhasil['knot'])) {
                    case 'W':
                        $varkali = 0.07;
                        break;
                    case 'Y':
                        $varkali = -0.07;
                        break;
                    case 'X':
                        $varkali = -0.09;
                        break;
                    case 'Z':
                        $varkali = -0.09;
                        break;
                    case 'U':
                        $varkali = -0.09;
                        break;
                    default:
                        $varkali = 0;
                        break;
                }
                $xvarkali = ((float) $xhasil['sukimeai']*2) * $varkali;
                $xhasiljadi = $xhasil['sukioroshi'] - ($fgo_ * $varkali);
                $fhasil .= round($xhasiljadi,0).' MM (TATE-ME)'; 
            }else{
                $fhasil .= trim($xhasil['sukioroshi']).' MM';
            }
        }
        return $fhasil;
    }
    public function cekjalarep(){
        $this->db->select('tb_rpmnet_cek.*,tb_rpmnet.noinduk_cek,tb_rpmnet.po,tb_rpmnet.item,tb_rpmnet.dis,tb_rpmnet.insno,ref_waktu_nt.waktu');
        $this->db->select('tb_rpmnet.tgl,tb_rpmnet.lotcek');
        $this->db->join('tb_rpmnet','tb_rpmnet.id = tb_rpmnet_cek.id_cek','left');
        $this->db->join('ref_waktu_nt','ref_waktu_nt.id = tb_rpmnet.id_waktu','left');
        $this->db->where('tgl',$this->session->userdata('tglrepcek'));
        $this->db->where('mach_no',$this->session->userdata('msnrepcek'));
        $this->db->order_by('id_waktu DESC,tgl,noinduk_cek');
        return $this->db->get('tb_rpmnet_cek');
    }
}