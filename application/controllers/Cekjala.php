<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cekjala extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('userrpm') != true) {
            $url = base_url('Auth');
            redirect($url);
        }

        $this->load->model('usermodel');
        $this->load->model('helpermodel');
        $this->load->model('cekjalamodel');
        $this->load->model('rpmmodel');
        // $this->load->library('Pdf');
        include_once APPPATH . '/third_party/phpqrcode/qrlib.php';
    }

	public function index()
	{
        $header['header'] = [
			'menu' => 'cekjala'
		];
		$data = [
			'data' => $this->cekjalamodel->getdata(),
			'input' => $this->cekjalamodel->getdatainput()
		];
		$footer['footer'] = [
			'menu' => 'cekjala'
		];
		$this->load->view('layouts/header',$header);
		$this->load->view('cekjala',$data);
		$this->load->view('layouts/footer',$footer);
	}
	public function clear(){
		$this->session->set_userdata('tglcek',date('Y-m-d'));
		$this->session->unset_userdata('msncek');
		$this->session->set_userdata('nikcek',$this->session->userdata('nik'));
		$this->session->unset_userdata('shiftcek');
		$this->session->unset_userdata('caricek');
		$url = base_url().'cekjala';
		redirect($url);
	}
	public function getmesin(){
		$data['formname'] = 'cekjala';
		$this->load->view('getmesin',$data);
	}
	public function getpersonil($mode=0){
		$data = [
			'mode' => $mode,
			'formname' => 'cekjala'
		];
		$this->load->view('getpersonil',$data);
	}
	public function getpo(){
		$this->load->view('getpoinsnopot');
	}
	public function tambahdata(){
		$data = [
			'jamkerja' => $this->cekjalamodel->getjamkerja()
		];
		$this->load->view('addcekjala',$data);
	}
	public function editdata($id){
		$data = [
			'jamkerja' => $this->cekjalamodel->getjamkerjatotal(),
			'data' => $this->cekjalamodel->getdatabyid($id),
			'mode' => 'edit'
		];
		$this->load->view('editcekjala',$data);
	}
	public function viewdata($id){
		$data = [
			'jamkerja' => $this->cekjalamodel->getjamkerjatotal(),
			'data' => $this->cekjalamodel->getdatabyid($id),
			'mode' => 'view'
		];
		$this->load->view('editcekjala',$data);
	}
	public function editrpm($id,$idrpm=0)
	{
        $header['header'] = [
			'menu' => 'rpm'
		];
		$data = [
			'idjam' => $id,
			'data' => $this->rpmmodel->getdatarpmbyid($id),
			'lastpo' => $idrpm==0 ? $this->rpmmodel->getlastpo() : $this->rpmmodel->getdatarpmnya($idrpm),
			'baru' => $idrpm==0 ? 'ya' : '',
			'rusak' => $this->rpmmodel->getkoderusak()
		];
		$footer['footer'] = [
			'menu' => 'rpm'
		];
		$this->load->view('layouts/header',$header);
		$this->load->view('editrpm',$data);
		$this->load->view('layouts/footer',$footer);
	}
	public function getdatamesin(){
		$kode = $_POST['isi'];
		$data = $this->rpmmodel->getdatamesin($kode);
		$html = '';
		if($data->num_rows() > 0){ $no=0;
			foreach($data->result_array() as $dt): $no++;
				$html .= '<tr>';
				$html .= '<td>#'.$no.'</td>';
				$html .= '<td class="font-kecil">'.$dt['mach_no'].'</td>';
				$html .= '<td class="font-kecil">'.trim($dt['specifik']).'</td>';
				$html .= '<td class="text-center">';
				$html .= '<a href="#" class="btn btn-success p-0 btn-flat font-kecil" id="pilihmesin" rel="'.$dt['id'].'" rel2="'.$dt['mach_no'].'" rel3="'.$dt['specifik'].'">Pilih</a>';
				$html .= '</td>';
				$html .= '</tr>';
			endforeach;
		}
		$send = array('data' => $html, 'jml' => $data->num_rows());
		echo json_encode($send);
	}
	public function getdatapersonil(){
		$kode = $_POST['isi'];
		$data = $this->usermodel->getdatapersonil($kode);
		$html = '';
		if($data->num_rows() > 0){ $no=0;
			foreach($data->result_array() as $dt): $no++;
				$html .= '<tr>';
				$html .= '<td>#'.$no.'</td>';
				$html .= '<td class="font-kecil line-11"><span class="text-pink font-10">'.$dt['noinduk'].'</span><br>'.trim($dt['nama']).'</td>';
				$html .= '<td class="font-kecil">'.trim($dt['grup']).'</td>';
				$html .= '<td class="text-center">';
				$html .= '<a href="#" class="btn btn-success p-0 btn-flat font-kecil" id="pilihpersonil" rel="'.$dt['id'].'" rel2="'.$dt['noinduk'].'" rel3="'.$dt['nama'].'">Pilih</a>';
				$html .= '</td>';
				$html .= '</tr>';
			endforeach;
		}
		$send = array('data' => $html, 'jml' => $data->num_rows());
		echo json_encode($send);
	}
	public function getdatapoinsno(){
		$kode = $_POST['isi'];
		$data = $this->cekjalamodel->getdatapoinsno($kode);
		$html = '';
		if($data->num_rows() > 0){ $no=0;
			if($data->num_rows() == 1){
				$xdata = $data->row_array();
				$arry = [
					'rel' => $xdata['po'],
					'rel2' => $xdata['item'],
					'rel3' => $xdata['dis'],
					'rel4' => $xdata['insno']
				];
				$html = $arry;
			}else{
				foreach($data->result_array() as $dt): $no++;
					$html .= '<tr>';
					$html .= '<td>#'.$no.'</td>';
					$html .= '<td class="font-kecil">'.viewsku($dt['po'],$dt['item'],$dt['dis']).'</td>';
					$html .= '<td class="font-kecil">'.trim($dt['insno']).'</td>';
					$html .= '<td class="font-kecil text-teal">'.trim($dt['spek']).'</td>';
					$html .= '<td class="text-center">';
					$html .= '<a href="#" class="btn btn-success p-0 btn-flat font-kecil" id="pilihpo" rel="'.$dt['po'].'" rel2="'.$dt['item'].'" rel3="'.$dt['dis'].'" rel4="'.$dt['insno'].'">Pilih</a>';
					$html .= '</td>';
					$html .= '</tr>';
				endforeach;
			}
		}
		$send = array('data' => $html, 'jml' => $data->num_rows());
		echo json_encode($send);
	}
	public function addsession(){
		$msn = isset($_POST['msn']) ? $_POST['msn'] : '';
		$shift = isset($_POST['shift']) ? $_POST['shift'] : '';
		$tgl = tglmysql($_POST['tgl']);
		$this->session->set_userdata('tglcek',$tgl);
		if($msn != ''){
			$this->session->set_userdata('msncek',$msn);
		}else{
			$this->session->unset_userdata('msncek');
		}
		if($shift != ''){
			$this->session->set_userdata('shiftcek',$shift);
		}else{
			$this->session->unset_userdata('shiftcek');
		}
		echo 1;
	}
	public function resetmsn(){
		$this->session->unset_userdata('msncek');
		$url = base_url().'cekjala';
		redirect($url);
	}
	public function resetpersonil($mode=0){
		$this->session->unset_userdata('nikcek');
		$url = base_url().'cekjala';
		redirect($url);
	}
	public function addpersonil(){
		$msn = isset($_POST['msn']) ? $_POST['msn'] : '';
		$mode = isset($_POST['mode']) ? $_POST['mode'] : 0;
		if($msn != ''){
			$this->session->set_userdata('nikcek',$msn);
		}else{
			$this->session->unset_userdata('nikcek');
		}
		echo 1;
	}
	public function getnomorlot(){
		$data = [
			'trim(po)' => trim($_POST['po']),
			'trim(item)' => trim($_POST['item']),
			'dis' => $_POST['dis'],
			'trim(insno)' => trim($_POST['ins']),
		];
		$html = '';
		$pertama = 0;
		$data = $this->rpmmodel->getnomorlot($data);
		if(count($data) > 0){
			for ($i= $data['lotakhir']+1; $i <= $data['jmllot']; $i++) { 
				if($pertama==0){
					$pertama = $i;
				}
				$html .= '<option value="'.$i.'">'.$i.'</option>';
			}
		}
		$send = array('data' => $html,'lotnya' => $pertama);
		echo json_encode($send);
	}
	public function simpandata(){
		$data = $_POST;
		$data['id_waktu'] = $data['wkt'];
		$data['noinduk_cek'] = $this->session->userdata('nikcek');
		$data['kakesu'] = toAngka($data['kakesu']);
		$data['meai'] = toAngka($data['meai']);
		unset($data['wkt']);

		$hasil = $this->cekjalamodel->simpandata($data);
		echo $hasil;
	}
	public function hapusdata($id){
		$data = $this->cekjalamodel->hapusdata($id);
		if($data){
			$url = base_url().'cekjala';
			redirect($url);
		}
	}
	public function getdetailinst(){
		$data = [
			'trim(tb_netinstr.po)' => trim($_POST['po']),
			'trim(tb_netinstr.item)' => trim($_POST['item']),
			'tb_netinstr.dis' => $_POST['dis'],
			'trim(tb_netinstr.insno)' => trim($_POST['insno']),
		];
		$hasil = $this->cekjalamodel->getdetailinst($data);
		echo json_encode($hasil->result());
	}
	public function getmedok(){
		$data = [
			'trim(tb_netinstr.po)' => trim($_POST['po']),
			'trim(tb_netinstr.item)' => trim($_POST['item']),
			'tb_netinstr.dis' => $_POST['dis'],
			'trim(tb_netinstr.insno)' => trim($_POST['insno']),
		];
		$hasil = $this->cekjalamodel->getmedok($data);
		echo json_encode(['data'=>$hasil]);
	}

	 public function caricek(){
        $kata = strtoupper($_POST['kata']);
        $this->session->set_userdata('caricek',$kata);
        echo 1;
    }
	public function clearrepcek(){
		$this->session->set_userdata('tglrepcek',$this->session->userdata('tglcek'));
		$this->session->set_userdata('msnrepcek',$this->session->userdata('msncek'));
		$url = base_url().'cekjala/repcek';
		redirect($url);
	}
	public function repcek(){
		$header['header'] = [
			'menu' => 'cekjala'
		];
		$data = [
			'data' => $this->cekjalamodel->cekjalarep(),
			'input' => $this->cekjalamodel->getdatainput(),
			'mesin' => $this->rpmmodel->getdatamesinall(),
		];
		$footer['footer'] = [
			'menu' => 'cekjala'
		];
		$this->load->view('layouts/header',$header);
		$this->load->view('repcekjala',$data);
		$this->load->view('layouts/footer',$footer);
	}
	public function repaddsession(){
		$this->session->set_userdata('tglrepcek',tglmysql($_POST['tgl']));
		$this->session->set_userdata('msnrepcek',$_POST['msn']);
		echo 1;
	}
}
