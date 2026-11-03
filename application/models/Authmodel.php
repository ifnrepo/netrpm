<?php
class Authmodel extends CI_Model 
{
    protected $db2;

    public function __construct() {
        parent::__construct();
        // Load the second database and return the object
        $this->db2 = $this->load->database('hrd', TRUE);
    }

    public function getdatakaryawan($nik){
        return $this->db2->get_where('tb_personil',['noinduk' => $nik]);
    }
}