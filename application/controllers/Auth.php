<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('getauthcrm') != true) {
        //     $url = base_url('Auth');
        //     redirect($url);
        // }
        // $this->load->model('usermodel');
        $this->load->model('authmodel');
        $db2 = $this->load->database('hrd', TRUE);
    }
	public function index()
	{
		$header['header'] = [
			'menu' => 'dashboard'
		];
		// $this->load->view('layouts/header',$header);
		$this->load->view('layouts/auth');
		// $this->load->view('layouts/footer');
	}
	public function auth(){
		$this->_login();
	}
	private function _login(){
        $htmlsalahpassword = '<div class="alert alert-important alert-danger alert-dismissible font-kecil" role="alert">
                                        <div class="d-flex">
                                        <div>
                                            <svg class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
                                        </div>
                                        <div>
                                            Password salah atau User tidak aktif !
                                        </div>
                                        </div>
                                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>';
        $htmltidakditemukan = '<div class="alert alert-important alert-danger alert-dismissible font-kecil" role="alert">
                                    <div class="d-flex">
                                    <div>
                                        <svg class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
                                    </div>
                                    <div>
                                        Pengguna tidak ditemukan, Sign Up terlebih  dahulu !
                                    </div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                </div>';
        $htmltidakakses = '<div class="alert alert-important alert-danger alert-dismissible font-kecil" role="alert">
                                    <div class="d-flex">
                                    <div>
                                        <svg class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
                                    </div>
                                    <div>
                                        Anda tidak punya akses ke Program ini, Hubungi Administrator !
                                    </div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                </div>';
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->usermodel->getdatabyuser($username)->row_array();
        if ($user) {
            if (encrypto($password) == $user['password'] && $user['aktif'] == 1) {
				if(cekceklis($user['hakprogram'], 6)=='checked'){
					$user_data = [
						'id' => $user['id'],
						'role' => $user['rolecrm'],
						'hakprogram' => $user['hakprogram'],
						'getauthcrm' => true
					];
					$this->session->set_userdata($user_data);

					$this->session->set_userdata('bl', date('m'));
					$this->session->set_userdata('th', date('Y'));
					if ($this->input->post('ingatsaya')) {
						$cookie = array(
							'name'   => "usernameMasukCRM",
							'value'  => $username,
							'expire' => 86400
						);
						$cookie2 = array(
							'name'   => "passwordMasukCRM",
							'value'  => $password,
							'expire' => 86400
						);
						$cookie3 = array(
							'name'   => "bantuMasukCRM",
							'value'  => 'YES',
							'expire' => 86400
						);
						set_cookie($cookie);
						set_cookie($cookie2);
						set_cookie($cookie3);
					}
					if ($this->input->post('lupasaya')) {
						delete_cookie('bantuMasukCRM');
						delete_cookie('usernameMasukCRM');
						delete_cookie('passwordMasukCRM');
					}
					$this->helpermodel->isilog('LOGIN Aplikasi CRM DG USERNAME PASSWORD');

					$url = base_url('Main');
					redirect($url);
				}else{
					$this->session->set_flashdata('message', $htmltidakakses);
					$url = base_url('Auth');
					redirect($url);
				}
            } else {
                $this->session->set_flashdata('message', $htmlsalahpassword);
                $url = base_url('Auth');
                redirect($url);
            }
        } else {
            $this->session->set_flashdata('message', $htmltidakditemukan);
            $url = base_url('Auth');
            redirect($url);
        }
    }
    public function getpersonil(){
        $nik = trim(strtoupper($this->input->post('nik', TRUE)));
        if($nik!=''){
            $cekdata = $this->authmodel->getdatakaryawan($nik);
            if($cekdata->num_rows() > 0){
                $hasilcekdata = $cekdata->row_array();
                if(trim($hasilcekdata['bagian'])!='NETTING' && $hasilcekdata['net']!=1){
                    $this->session->set_flashdata('kodenya','Anda tidak diperkenankan untuk mengisi RPM (Hubungi Administrator)');
                    $url = base_url().'auth';
                    redirect($url);
                }else{
                    $this->session->set_userdata('userrpm',true);
                    $this->session->set_userdata('nik',$hasilcekdata['noinduk']);
                    $kata = $hasilcekdata['grup'];
                    if(str_contains($kata,'GROUP A')){
                        $this->session->set_userdata('gruprpm','A');
                    }elseif(str_contains($kata,'GROUP B')){
                        $this->session->set_userdata('gruprpm','B');
                    }elseif(str_contains($kata,'GROUP C')){
                        $this->session->set_userdata('gruprpm','C');
                    }
                    $url = base_url().'main';
                    redirect($url);
                }
            }else{
                $this->session->set_flashdata('kodenya','data tidak ditemukan !');
                $url = base_url().'auth';
                redirect($url);
            }
        }else{
            $this->session->set_flashdata('kodenya','isi NIK Dahulu');
            $url = base_url().'auth';
            redirect($url);
        }
    }
	public function logout(){
        $this->session->sess_destroy();
        $url = base_url('Auth');
        redirect($url);
    }
}
