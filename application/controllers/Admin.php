<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
    }

	public function index(){
		$data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
	}

    
    //Begin Kategori
    
    public function kategori(){
        $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }


    //End Kategori

    //Begin Daftar Prestasi
    public function prestasi(){
        $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //End Prestasi

    //Begin Galeri
    public function galeri(){
        $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //End Prestasi
	

}
?>
