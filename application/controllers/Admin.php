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

    //Begin Informasi


    //Begin Kegiatan Himpunan
    
    public function himpunan(){
        $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    //END Kegiatan Himpunan

    //Begin Kegiatan Kemahasiswaan

    public function kemahasiswaan(){
        $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    //END Kegiatan Kemahasiswaan

    //Begin Info Beasiswa
    
    public function beasiswa(){
        $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    //Begin Prestasi

    public function prestasi(){
        $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    // END Prestasi

    // Begin Artikel

    public function artikel(){
        $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    // End Artikel

    //Begin Lomba
    public function lomba(){
        $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //END Lomba

    //End Informasi
    

    //Begin Daftar Prestasi
    public function daftarPrestasi(){
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
    //End Galeri

    //Begin Saran Masuk
    public function saranMasuk(){
        $data = array(
            'isi' => 'admin/dashboard/isi',
            );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //End Saran Masuk

    //Begin Admin
	 public function admin(){
        $data = array(
            'isi' => 'admin/dashboard/isi',
            );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //End Admin

    //===Begin Modul Pengurus===
    //Begin DMMIF FT-UH
    public function pengurusDmmif(){
         $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //End DMMIF FT-UH

    //Begin HMIF FT-UH
    public function pengurusHmif(){
         $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //End HMIF FT-UH

    //Begin Sejarah Pengurus
    public function sejarahPengurus(){
         $data = array(
            'isi' => 'admin/dashboard/isi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //End Sejarah Pengurus
    //===End Modul Pengurus==

}
?>
