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
        $table  = 'sejarah_pengurus';
        $firstA = 0;
        $firstB = 1;
        $limitA = 1;
        $limitB = 100;
        $field  = 'id_pengurus';
        $ad   = 'asc';
        $data = array(
            'title'    => 'Sejarah Pengurus', 
            'nav'      => 'Sejarah Kepengurusan',
            'isi'      => 'home/dashboard/sejarahPengurus',
            'dataA'    => $this->ModelHome->infoKini($table, $limitA,$firstA,$field,$ad),
            'dataB'    => $this->ModelHome->infoKini($table, $limitB,$firstB,$field,$ad),
            'folder'   => 'sejarahPengurus',
        );
        $this->load->view('home/_layouts2/wrapper2', $data);
    }

    public function programKerja(){
        $data = array(
            'title'    => 'Program Kerja HMIF FT-UH',
            'nav'      => 'Program Kerja HMIF FT-UH',
            'isi'      => 'home/dashboard/programKerja',
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
        $this->_sendEmail();
        $this->session->set_flashdata('info','Saran Telah Terkirim');
        redirect('home/addSaran');
    }

    private function _sendEmail(){
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'gilbertmabar@gmail.com',
            'smtp_pass' => 'okifftuh',
            'smtp_port' => 465,
            'mailType'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n" 
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config); 
        $message = $this->load->view('home/dashboard/email','',true);
        $this->email->from('gilbertmabar@gmail.com', 'OKIF FT-UH');
        $this->email->to($this->input->post(email_saran));
        $this->email->subject('Confirmation Mail');
        $this->email->message($message);
        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
            die; 
        }
    }
//End Saran

    //== Begin Informasi==//
    public function informasi(){
        $table  = 'informasi';
        $row    = 'tanggal_informasi';
        $ad     = 'desc';
        $start  = $this->uri->segment(3);
        $limit  = 4;
        $first  = 0;
        $rowpopular = 'view_informasi';

        //Config Pagination
        $config['base_url']     = base_url('home/informasi');
        $config['total_rows']   = $this->Crud->ca($table);
        $config['per_page']     = 5;

        //Initializing
        $this->pagination->initialize($config);

        $data   = array(
            'title'         => 'Informasi',
            'nav'           => 'Informasi',
            'data'          => $this->ModelHome->getinfo($table,$config['per_page'],$start,$row,$ad),
            'populardata'   => $this->ModelHome->getinfo($table,$limit,$first,$rowpopular,$ad),
            'isi'           => 'home/dashboard/informasi',
        );
        $this->load->view('home/_layouts2/wrapper2', $data);
    }
    //Begin Himpunan
    public function himpunan(){
        $where  = array('id_kategori_informasi' => 1);
        $table  = 'informasi';
        $row    = 'tanggal_informasi';
        $ad     = 'desc';
        $start  = $this->uri->segment(3);
        $limit  = 4;
        $first  = 0;
        $rowpopular = 'view_informasi';

        //Config Pagination
        $config['base_url']     = base_url('home/himpunan');
        $config['total_rows']   = $this->Crud->cw($table,$where);
        $config['per_page']     = 5;

        //Initializing
        $this->pagination->initialize($config);

        $data   = array(
            'title'         => 'Kegiatan Himpunan',
            'nav'           => 'Informasi / Kegiatan Himpunan',
            'data'          => $this->ModelHome->getinfowhere($table,$where,$config['per_page'],$start,$row,$ad),
            'populardata'   => $this->ModelHome->getinfo($table,$limit,$first,$rowpopular,$ad),
            'isi'           => 'home/dashboard/informasi',
        );
        $this->load->view('home/_layouts2/wrapper2', $data); 

    }
    //END Himpunan
    //Begin Kemahasiswaan
    public function kemahasiswaan(){
        $where  = array('id_kategori_informasi' => 2);
        $table  = 'informasi';
        $row    = 'tanggal_informasi';
        $ad     = 'desc';
        $start  = $this->uri->segment(3);
        $limit  = 4;
        $first  = 0;
        $rowpopular = 'view_informasi';

        //Config Pagination
        $config['base_url']     = base_url('home/kemahasiswaan');
        $config['total_rows']   = $this->Crud->cw($table,$where);
        $config['per_page']     = 5;

        //Initializing
        $this->pagination->initialize($config);

        $data   = array(
            'title'         => 'Informasi Kemahasiswaan',
            'nav'           => 'Informasi / Kemahasiswaan',
            'data'          => $this->ModelHome->getinfowhere($table,$where,$config['per_page'],$start,$row,$ad),
            'populardata'   => $this->ModelHome->getinfo($table,$limit,$first,$rowpopular,$ad),
            'isi'           => 'home/dashboard/informasi',
        );
        $this->load->view('home/_layouts2/wrapper2', $data); 

    }
    //END Kemahasiswaan
    //Begin Beasiswa
    public function beasiswa(){
        $where  = array('id_kategori_informasi' => 3);
        $table  = 'informasi';
        $row    = 'tanggal_informasi';
        $ad     = 'desc';
        $start  = $this->uri->segment(3);
        $limit  = 4;
        $first  = 0;
        $rowpopular = 'view_informasi';

        //Config Pagination
        $config['base_url']     = base_url('home/beasiswa');
        $config['total_rows']   = $this->Crud->cw($table,$where);
        $config['per_page']     = 5;

        //Initializing
        $this->pagination->initialize($config);

        $data   = array(
            'title'         => 'info Beasiswa',
            'nav'           => 'Informasi / Beasiswa',
            'data'          => $this->ModelHome->getinfowhere($table,$where,$config['per_page'],$start,$row,$ad),
            'populardata'   => $this->ModelHome->getinfo($table,$limit,$first,$rowpopular,$ad),
            'isi'           => 'home/dashboard/informasi',
        );
        $this->load->view('home/_layouts2/wrapper2', $data); 

    }
    //END Beasiswa
    //Begin Prestasi
    public function prestasi(){
        $where  = array('id_kategori_informasi' => 4);
        $table  = 'informasi';
        $row    = 'tanggal_informasi';
        $ad     = 'desc';
        $start  = $this->uri->segment(3);
        $limit  = 4;
        $first  = 0;
        $rowpopular = 'view_informasi';

        //Config Pagination
        $config['base_url']     = base_url('home/prestasi');
        $config['total_rows']   = $this->Crud->cw($table,$where);
        $config['per_page']     = 5;
        //Styles

        //Initializing
        $this->pagination->initialize($config);

        $data   = array(
            'title'         => 'Info Prestasi',
            'nav'           => 'Informasi / Prestasi',
            'data'          => $this->ModelHome->getinfowhere($table,$where,$config['per_page'],$start,$row,$ad),
            'populardata'   => $this->ModelHome->getinfo($table,$limit,$first,$rowpopular,$ad),
            'isi'           => 'home/dashboard/informasi',
        );
        $this->load->view('home/_layouts2/wrapper2', $data); 

    }
    //END Prestasi
    //Begin Artikel
    public function artikel(){
        $where  = array('id_kategori_informasi' => 5);
        $table  = 'informasi';
        $row    = 'tanggal_informasi';
        $ad     = 'desc';
        $start  = $this->uri->segment(3);
        $limit  = 4;
        $first  = 0;
        $rowpopular = 'view_informasi';

        //Config Pagination
        $config['base_url']     = base_url('home/artikel');
        $config['total_rows']   = $this->Crud->cw($table,$where);
        $config['per_page']     = 5;

        //Initializing
        $this->pagination->initialize($config);

        $data   = array(
            'title'         => 'Artikel',
            'nav'           => 'Informasi / Artikel',
            'data'          => $this->ModelHome->getinfowhere($table,$where,$config['per_page'],$start,$row,$ad),
            'populardata'   => $this->ModelHome->getinfo($table,$limit,$first,$rowpopular,$ad),
            'isi'           => 'home/dashboard/informasi',
        );
        $this->load->view('home/_layouts2/wrapper2', $data); 

    }
    //END Artikel
    //Begin Lomba
    public function lomba(){
        $where  = array('id_kategori_informasi' => 6);
        $table  = 'informasi';
        $row    = 'tanggal_informasi';
        $ad     = 'desc';
        $start  = $this->uri->segment(3);
        $limit  = 4;
        $first  = 0;
        $rowpopular = 'view_informasi';

        //Config Pagination
        $config['base_url']     = base_url('home/lomba');
        $config['total_rows']   = $this->Crud->cw($table,$where);
        $config['per_page']     = 5;

        //Initializing
        $this->pagination->initialize($config);
        $data   = array(
            'title'         => 'Info Lomba',
            'nav'           => 'Informasi / Lomba',
            'data'          => $this->ModelHome->getinfowhere($table,$where,$config['per_page'],$start,$row,$ad),
            'populardata'   => $this->ModelHome->getinfo($table,$limit,$first,$rowpopular,$ad),
            'isi'           => 'home/dashboard/informasi',
        );
        $this->load->view('home/_layouts2/wrapper2', $data); 

    }
    //END Lomba
    //Begin Count
    public function count($id_informasi){
        $where  = array('id_informasi' => $id_informasi);
        $input = $this->input->post(NULL, FALSE);
        $view = $input['view'];

        $dataview = array('view_informasi'  => $view + 1,);

        $this->Crud->u('informasi', $dataview, $where);
        redirect('home/readMore/'.$id_informasi);
    }
    //End Count
    //Begin Read More
    public function readMore($id_informasi){
        $where  = array('id_informasi' => $id_informasi);
        $data   = array(
            
            'title'             => 'Informasi',
            'nav'               => 'Informasi / Single Page',
            'data'              => $this->Crud->gw('informasi', $where),
            'isi'               => 'home/dashboard/readmore',
        );
        $this->load->view('home/_layouts2/wrapper2', $data);

    }

    public function daftarPrestasi(){
        $ad     = 'desc';
        $field  = 'id_prestasi';
        $first  = $this->uri->segment(3);

        $config['base_url']     = base_url('home/daftarPrestasi');
        $config['total_rows']   = $this->ModelHome->cw('prestasi');
        $config['per_page']     = 10;
        
        //Initializing
        $this->pagination->initialize($config);
        $data = array(
            'title' => 'Daftar Prestasi',
            'prestasi' => $this->ModelHome->prestasi('prestasi',$config['per_page'],$first,$field,$ad),
            'nav'   => 'Daftar Prestasi',
            'isi'   => 'home/dashboard/daftarPrestasi',
            'nomor' => $first,
        );
        $this->load->view('home/_layouts2/wrapper2', $data);
    }
    //End Read More
    //== End Informasi ==//

    //==Begin Arsip==//
    public function arsip(){
    $data = array(
            'nav'       => 'Arsip',
            'isi'       => 'home/dashboard/arsip', 
        );
        $this->load->view('home/_layouts2/wrapper2', $data);
    }
    //==END Arsip==//

}

?>