<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('userrpm') != true) {
            $url = base_url('Auth');
            redirect($url);
        }

        $this->load->model('usermodel');
        $this->load->model('helpermodel');
        $this->load->model('mainmodel');
        // $this->load->library('Pdf');
        include_once APPPATH . '/third_party/phpqrcode/qrlib.php';
    }

	public function index()
	{
        $header['header'] = [
			'menu' => 'dashboard'
		];
		if($this->session->userdata('periodebulan')==''){
			$this->session->set_userdata('periodebulan',date('m'));
		}
		if($this->session->userdata('periodetahun')==''){
			$this->session->set_userdata('periodetahun',date('Y'));
		}
		$data = [
			'data' => $this->mainmodel->getdatarpm(),
			'mesin' => $this->mainmodel->getmesin()
		];
		$footer['footer'] = [
			'menu' => 'main',
			'datarpmperson' => $this->mainmodel->getpersonrpm($this->session->userdata('nik')),
			'rpmpermesin' => $this->mainmodel->getdatarpmpermesin(),
			'rpmperhari' => $this->mainmodel->getdatarpmharian(),
			'rpmperharipergrup' => $this->mainmodel->getdatarpmharianpergrup(),
			'rpmperbulan' => $this->mainmodel->getdatarpmbulanan(),
			'rpmuser' => $this->mainmodel->getdatarpmuser($this->session->userdata('nik')),
		];
		$this->load->view('layouts/header',$header);
		$this->load->view('main',$data);
		$this->load->view('layouts/footer',$footer);
	}

	public function clear(){
		$this->session->set_userdata('periodebulan',date('m'));
		$this->session->set_userdata('periodetahun',date('Y'));
		$this->session->set_userdata('periodelokasi',0);
		$this->session->unset_userdata('tempatx');
		$this->session->unset_userdata('grupx');
		$this->session->unset_userdata('shiftx');
		$this->session->unset_userdata('mesinx');
		$this->session->unset_userdata('fltrpmtotal');
		$this->session->unset_userdata('fltrpmgrup');
		$this->session->unset_userdata('fltrpmvs');
		$url = base_url().'main';
		redirect($url);
	}
	public function addsession(){
		$bln = $_POST['bln'];
		$thn = $_POST['thn'];
		$lok = $_POST['lok'];
		$this->session->set_userdata('periodebulan',$bln);
		$this->session->set_userdata('periodetahun',$thn);
		$this->session->set_userdata('periodelokasi',$lok);
		echo 1;
	}
	public function fltrpmtotal($kode=''){
		if($kode!=''){
			$this->session->set_userdata('fltrpmtotal',$kode);
		}else{
			$this->session->unset_userdata('fltrpmtotal');
		}
		$url = base_url().'main';
		redirect($url);
	}
	public function fltrpmvs($kode=''){
		if($kode!=''){
			$this->session->set_userdata('fltrpmvs',$kode);
		}else{
			$this->session->unset_userdata('fltrpmvs');
		}
		$url = base_url().'main';
		redirect($url);
	}
	public function fltrpmgrup($kode=''){
		if($kode!=''){
			$this->session->set_userdata('fltrpmgrup',$kode);
		}else{
			$this->session->unset_userdata('fltrpmgrup');
		}
		$url = base_url().'main';
		redirect($url);
	}
	public function setmonitoring(){
		$tmp = $_POST['tempat'];
		$grp = $_POST['grp'];
		$shf = $_POST['shift'];
		$msn = $_POST['mesin'];
		$this->session->set_userdata('tempatx',$tmp);
		$this->session->set_userdata('grupx',$grp);
		$this->session->set_userdata('shiftx',$shf);
		$this->session->set_userdata('mesinx',$msn);
		echo 1;
	}
}
