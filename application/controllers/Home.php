<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
       
    }

	public function index(){
		$data = array(
            'title' => 'OKIF FT-UH',
            'isi' => 'home/dashboard/isi', 
        );
        $this->load->view('home/_layouts/wrapper', $data);
	}

    public function profil(){
        $data = array(
            'nav'       => 'Profil',
            'isi'       => 'home/dashboard/isi2', 
        );
        $this->load->view('home/_layouts2/wrapper2', $data);

    }

    public function galeri(){
        $data = array(
            'nav'       => 'galeri',
            'galeri'    => $this->Crud->ga('galeri'),
            'isi'       => 'home/dashboard/galeri',
        );
        $this->load->view('home/_layouts2/wrapper2', $data);
    }

}

?>