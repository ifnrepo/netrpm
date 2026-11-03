<?php
class Helpermodel extends CI_Model 
{
    protected $db2;

    public function __construct() {
        parent::__construct();
        // Load the second database and return the object
        $this->db2 = $this->load->database('hrd', TRUE);
    }

    public function datamesin($nik){
        return $this->db->get_where('tb_msn_netting',['mach_no' => $nik]);
    }
    public function getjamkerjanet($id,$kolom){
        $data = $this->db->get_where('ref_waktu_nt',['id' => $id])->row_array();
        $kolom = $kolom=='' ? 'waktu' : $kolom;
        return $data[$kolom];
    }
    public function getlokasimesin($id){
        $lokasi = '';
        $data = $this->db->get_where('tb_msn_netting',['mach_no' => $id]);
        if($data->num_rows() > 0){
            $xdata = $data->row_array();
            $lokasi = $xdata['arroza'] == 1 ? 'Arroza' : 'Indoneptune';
        }
        return $lokasi;
    }
    public function simpantotal($idwaktu,$tgl,$msn){
        $this->db->select('tb_rpmnet.*,SUM(IFNULL(rpm_akhir,0)-rpm_awal) OVER() AS total');
        $this->db->where('tgl',$tgl);
        $this->db->where('mach_no',$msn);
        if($idwaktu >= 1 && $idwaktu <= 9) { //Shift malam 
            $utama = 1;
            $this->db->where('id_waktu >= ',1);
            $this->db->where('id_waktu <= ',9);
        }
        if($idwaktu >= 10 && $idwaktu <= 18) { //Shift Pagi 
            $utama = 10;
            $this->db->where('id_waktu >= ',10);
            $this->db->where('id_waktu <= ',18);
        }
        if($idwaktu >= 19 && $idwaktu <= 27) { //Shift Siang 
            $utama = 19;
            $this->db->where('id_waktu >= ',19);
            $this->db->where('id_waktu <= ',27);
        }
        if($idwaktu >= 28 && $idwaktu <= 36) { //Shift Malam (Sabtu) 
            $utama = 28;
            $this->db->where('id_waktu >= ',28);
            $this->db->where('id_waktu <= ',36);
        }
        if($idwaktu >= 37 && $idwaktu <= 42) { //Shift Pagi (Sabtu) 
            $utama = 37;
            $this->db->where('id_waktu >= ',37);
            $this->db->where('id_waktu <= ',42);
        }
        if($idwaktu >= 43 && $idwaktu <= 48) { //Shift Siang I (Sabtu) 
            $utama = 43;
            $this->db->where('id_waktu >= ',43);
            $this->db->where('id_waktu <= ',48);
        }
        if($idwaktu >= 49 && $idwaktu <= 55) { //Shift Siang II (Sabtu) 
            $utama = 49;
            $this->db->where('id_waktu >= ',49);
            $this->db->where('id_waktu <= ',55);
        }
        $niltot = $this->db->get('tb_rpmnet')->row_array();

        $nilaitot = $niltot['total'] < 0 ? 0 : $niltot['total'];
        $this->db->where('tgl',$tgl);
        $this->db->where('mach_no',$msn);
        $this->db->where('id_waktu',$utama);
        $this->db->update('tb_rpmnet',['totalrpm' => $nilaitot,'noinduk_1' => $this->session->userdata('nikrpm'),'noinduk_2' => $this->session->userdata('personilrpm'),'grup' => $this->session->userdata('gruprpm')]);
    }
}