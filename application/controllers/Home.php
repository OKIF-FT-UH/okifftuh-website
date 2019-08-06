<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
       
    }

	public function index(){
        $table = 'informasi';
        $firstA = 0;
        $firstB = 2;
        $limit  = 2;
        $field  = 'tanggal_informasi';
        $ad     = 'desc';

		$data = array(
            'isi'        => 'home/dashboard/isi',
            'terkiniA'   => $this->ModelHome->infoKini($table, $limit, $firstA, $field, $ad), 
            'terkiniB'   => $this->ModelHome->infoKini($table, $limit, $firstB, $field, $ad),
            'title'      => 'OKIF FT-UH',
            'isi'        => 'home/dashboard/isi', 
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
//Pengurus Begin
    public function pengurusDmmif(){
        $table = 'pengurus';
        $where = array(
            'tipe_pengurus' =>1
        );
        $firstA = 0;
        $firstB = 1;
        $firstC = 2;
        $limitA = 1;
        $limitB = 100;
        $field  = 'id_pengurus';
        $ad     = 'asc';
        $data = array(
            'title'     => 'DMMIF FT-UH',
            'nav'       => 'Pengurus DMMIF',
            'isi'       => 'home/dashboard/pengurus',
            'dataA'      => $this->ModelHome->pengurus($table, $where, $limitA,$firstA,$field,$ad),
            'dataC'      => $this->ModelHome->pengurus($table, $where, $limitA,$firstB,$field,$ad),
            'dataB'      => $this->ModelHome->pengurus($table, $where, $limitB,$firstC,$field,$ad),
            'folder'    => 'dmmif',
        );
        $this->load->view('home/_layouts2/wrapper2', $data);
    }

    public function pengurusHmif(){
        $table = 'pengurus';
        $where = array(
            'tipe_pengurus' =>2
        );
        $firstA = 0;
        $firstB = 1;
        $limitA = 1;
        $limitB = 100;
        $field  = 'id_pengurus';
        $ad     = 'asc';
        $data = array(
            'title'     => 'HMIF FT-UH',
            'nav'       => 'Pengurus HMIF',
            'isi'       => 'home/dashboard/pengurus',
            'dataA'      => $this->ModelHome->pengurus($table, $where, $limitA,$firstA,$field,$ad),
            'dataB'      => $this->ModelHome->pengurus($table, $where, $limitB,$firstB,$field,$ad),
            'folder'    => 'hmif',
        );
        $this->load->view('home/_layouts2/wrapper2', $data);
    }

    public function sejarahPengurus(){
        $data = array(
            'title'    => 'Sejarah Kepengurusan',
            'nav'      => 'Sejarah Kepengurusan',
            'isi'      => 'home/dashboard/sejarahPengurus',
        );
        $this->load->view('home/_layouts2/wrapper2', $data);
    }

//End Pengurus

//Saran Begin
    public function addSaran(){
        $data = array(
            'title'     => 'Kritik & Saran',
            'nav'       => 'Kritik & Saran',
            'isi'       => 'home/dashboard/saran',
        );
        $this->load->view('home/_layouts2/wrapper2', $data);
    }

    public function doAddSaran(){
        $input = $this->input->post( NULL, TRUE);
        $today = date('Y-m-d H:i:s');
        $data = array(
            'nama_saran' => $input['nama_saran'],
            'email_saran' => $input['email_saran'],
            'perihal_saran' => $input['perihal_saran'],
            'isi_saran' => $input['isi_saran'],
            'waktu_saran' => $today,
        );
        $this->db->insert('saran', $data);
        $this->session->set_flashdata('info','Saran Telah Terkirim');
        redirect('home/addSaran');
    }
//End Saran

}

?>