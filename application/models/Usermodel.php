<?php
class Usermodel extends CI_Model 
{
    protected $db2;

    public function __construct() {
        parent::__construct();
        // Load the second database and return the object
        $this->db2 = $this->load->database('hrd', TRUE);
    }

    public function getdatabyid($nik){
        return $this->db2->get_where('tb_personil',['noinduk' => $nik]);
    }

    public function getdatapersonil($isi){
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
        $this->db2->select('*');
        // $this->db->join('kategori','kategori.kategori_id = tb_produk.kategori_id','left');
        $this->db2->where('bagian','NETTING');
        $this->db2->group_start();
        $this->db2->like('nama',$kata,'both', FALSE);
        $this->db2->or_like('noinduk',$kata,'both', FALSE);
        $this->db2->group_end();
        $this->db2->limit(10);
        return $this->db2->get('tb_personil');
    }
}