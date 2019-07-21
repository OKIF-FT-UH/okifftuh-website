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
        $where = array('id_kategori_informasi' => 1);
        $data = array(
            'title'     => 'Daftar Kegiatan Himpunan', 
            'isi'       => 'admin/dashboard/Informasi',
            'data'      => $this->ModelAdmin->requestInformasi($where), 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    //END Kegiatan Himpunan

    //Begin Kegiatan Kemahasiswaan

    public function kemahasiswaan(){
        $where = array('id_kategori_informasi' => 2);
        $data = array(
            'title'     => 'Daftar Informasi Kemahasiswaan', 
            'isi'       => 'admin/dashboard/Informasi',
            'data'      => $this->ModelAdmin->requestInformasi($where),
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    //END Kegiatan Kemahasiswaan

    //Begin Info Beasiswa
    
    public function beasiswa(){
       $where = array('id_kategori_informasi' => 3);
        $data = array(
            'title'     => 'Daftar Informasi Beasiswa', 
            'isi'       => 'admin/dashboard/Informasi',
            'data'      => $this->ModelAdmin->requestInformasi($where),
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    //Begin Prestasi

    public function prestasi(){
        $where = array('id_kategori_informasi' => 4 );
        $data = array(
            'title' => 'Daftar Informasi Prestasi',
            'isi' => 'admin/dashboard/Informasi',
            'data' => $this ->ModelAdmin->requestInformasi($where),
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    // END Prestasi

    // Begin Artikel

    public function artikel(){
        $where = array('id_kategori_informasi' => 5);
        $data = array(
            'title'     => 'Daftar Artikel', 
            'isi'       => 'admin/dashboard/Informasi',
            'data'      => $this->ModelAdmin->requestInformasi($where),
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    // End Artikel

    //Begin Lomba
    public function lomba(){
        $where = array('id_kategori_informasi' => 6);
        $data = array(
            'title' => 'Daftar Informasi Lomba',
            'isi' => 'admin/dashboard/Informasi',
            'data' => $this->ModelAdmin->requestInformasi($where), 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //END Lomba


    //Begin Create Information
    public function createInformation($kode){
        $data = array(
            'title'     => 'Tambah Informasi',
            'isi'       => 'admin/dashboard/createInformasi', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    //END Create Information

    //Begin Edit Information
         public function editInformation($kode, $id_informasi){
            $where = array('id_informasi' => $id_informasi);
            $data = array(
                'title'         => 'Edit Informasi',
                'dataInformasi' => $this->Crud->gw('informasi', $where),
                'isi'           => 'admin/dashboard/createInformasi', 
            );
            $this->load->view('admin/_layouts/wrapper', $data);
        }
    //END Edit Information

    //Begin Do Create Information

    public function doAddInformation($kode){
        $input = $this->input->post(NULL, FALSE);
        $filenya = $_FILES['userfile']['name'];

        if($filenya = ''){
            $this->session->set_flashdata('info', 'File Tidak Terpilih');
            
            if($kode == '1'){
                redirect('admin/himpunan');
            }else if($kode == '2'){
                redirect('admin/kemahasiswaan');
            }else if($kode == '3'){
                redirect('admin/beasiswa');
            }else if($kode == '4'){
                redirect('admin/prestasi');
            }else if($kode == '5'){
                redirect('admin/artikel');
            }else if($kode == '6'){
                redirect('admin/lomba');
            }else{
                redirect('admin');
            }

        }else{
            if($kode == '1'){
                $config['upload_path'] = './assets/admin/img/himpunan';
            }else if($kode == '2'){
                $config['upload_path'] = './assets/admin/img/kemahasiswaan';
            }else if($kode == '3'){
                $config['upload_path'] = './assets/admin/img/beasiswa';
            }else if($kode == '4'){
                $config['upload_path'] = './assets/admin/img/prestasi';
            }else if($kode == '5'){
                $config['upload_path'] = './assets/admin/img/artikel';
            }else if($kode == '6'){
                $config['upload_path'] = './assets/admin/img/lomba';

            }
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '0';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('userfile')){
                // die();
                $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                redirect('admin/createInformation/'.$kode);
            }else{
                $filenya =  $this->upload->data('file_name');
            }

            $today = date('Y-m-d H:i:s');

            $data = array(
                'judul_informasi'       => $input['judul_informasi'],
                'id_kategori_informasi' => $kode,
                'penulis_informasi'     => $input['penulis_informasi'],
                'isi_informasi'         => $input['isi_informasi'],
                'tanggal_informasi'     => $today,
                'foto_informasi'        => $filenya,
            );

            $this->db->insert('informasi', $data);
            $this->session->set_flashdata('info', 'Informasi Sukses Ditambahkan');

            if($kode == '1'){
                redirect('admin/himpunan');
            }else if($kode == '2'){
                redirect('admin/kemahasiswaan');
            }else if($kode == '3'){
                redirect('admin/beasiswa');
            }else if($kode == '4'){
                redirect('admin/prestasi');
            }else if($kode == '5'){
                redirect('admin/artikel');
            }else if($kode == '6'){
                redirect('admin/lomba');
            }else{
                redirect('admin');
            }
        }
    }

    //END Do Create Information

       //Begin Do Update Information
    public function doEditInformation($kode, $id_informasi){
        $where = array('id_informasi' => $id_informasi);
        $input = $this->input->post(NULL, FALSE);


        if($kode == '1'){
            $alamat = 'admin/himpunan';
        }else if($kode == '2'){
            $alamat = 'admin/kemahasiswaan';
        }else if($kode == '3'){
            $alamat = 'admin/beasiswa';
        }else if($kode == '4'){
            $alamat = 'admin/prestasi';
        }else if($kode == '5'){
            $alamat = 'admin/artikel';
        }else if($kode == '6'){
            $alamat = 'admin/lomba';
        }
        
    if(!empty($_FILES['userfile']['tmp_name'])){
            
            $filenya = $_FILES['userfile']['name'];

            if($filenya = ''){
                $this->session->set_flashdata('info', 'Gagal Menambahkan Informasi');
                redirect($alamat);
            }else{

               
                if($kode == '1'){
                    $config['upload_path'] = './assets/admin/img/himpunan';
                }else if($kode == '2'){
                    $config['upload_path'] = './assets/admin/img/kemahasiswaan';
                }else if($kode == '3'){
                    $config['upload_path'] = './assets/admin/img/beasiswa';
                }else if($kode == '4'){
                    $config['upload_path'] = './assets/admin/img/prestasi';
                }else if($kode == '5'){
                    $config['upload_path'] = './assets/admin/img/artikel';
                }else if($kode == '6'){
                    $config['upload_path'] = './assets/admin/img/lomba';
                }


                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '';
                
                $this->load->library('upload', $config);
                if($config['max_size'] >= 2048){
                    $this->session->set_flashdata('info', 'File Melewati Batas Ukuran');
                    redirect($alamat);
                }
                //unlink(base_url('assets/img/produk/'.$input['judul_foto']));
                unlink($config['upload_path'].'/'.$input['foto_lama']);

                if(!$this->upload->do_upload('userfile')){
                    //die();
                    $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                    redirect($alamat);
                }else{
                    $filenya =  $this->upload->data('file_name');
                }

                $items = array(
                    'judul_informasi'           => $input['judul_informasi'],
                    'isi_informasi'             => $input['isi_informasi'],
                    'penulis_informasi'         => $input['penulis_informasi'],
                    'foto_informasi'            => $filenya,
                );

                //$this->Crud->u('barang', $items, $where);
                $this->db->update('informasi', $items, $where);
                $this->session->set_flashdata('info', 'Informasi Sukses Diupdate');
                redirect($alamat);

            }
        }else{
            $items = array(
                'judul_informasi'   => $input['judul_informasi'],
                'isi_informasi'     => $input['isi_informasi'],
                'penulis_informasi' => $input['penulis_informasi'],
            );
            $this->Crud->u('informasi', $items, $where);
            $this->session->set_flashdata('info', 'Infomasi Sukses Diupdate');
            redirect($alamat);
        }

}
        


    
    //END Do Update Information

    //Begin Do Delete Information
    public function doDeleteInformation($kode, $id_informasi){
        $where = array('id_informasi' => $id_informasi);
        $this->Crud->fga('informasi', $where);
        $this->session->set_flashdata('info', 'Informasi Sukses Dihapus');

        if($kode == '1'){
            redirect('admin/himpunan');
        }else if($kode == '2'){
            redirect('admin/kemahasiswaan');
        }else if($kode == '3'){
            redirect('admin/beasiswa');
        }else if($kode == '4'){
            redirect('admin/prestasi');
        }else if($kode == '5'){
            redirect('admin/artikel');
        }else if($kode == '6'){
            redirect('admin/lomba');
        }else{
            redirect('admin');
        }

    }
    //END Do Delete Information

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
        'title' => 'Daftar Galeri', 
        'isi'   => 'admin/dashboard/galeri',
        'data'  => $this->ModelAdmin->requestGallery(), 
    );
    $this->load->view('admin/_layouts/wrapper', $data);
    }

    public function addGaleri(){
        $input = $this->input->post(NULL, FALSE);
        $filenya = $_FILES['userfile']['name'];

        if($filenya = ''){
            $this->session->set_flashdata('info', 'File Tidak Terpilih');
                redirect('admin/galeri');
        }else{
            
                $config['upload_path'] = './assets/admin/img/galeri';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '0';

                $this->load->library('upload', $config);

            if(!$this->upload->do_upload('userfile')){
                // die();
                $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                redirect('admin/galeri/');
            }else{
                $filenya =  $this->upload->data('file_name');
            }
            $today = date('Y-m-d H:i:s');
            $data = array(
                'foto_galeri'        => $filenya,
                'caption_galeri'     => $input['caption_galeri'],
                'tanggal_galeri'     => $today,
                
            );

            $this->db->insert('galeri', $data);
            $this->session->set_flashdata('info', 'Data Sukses Ditambahkan');
            redirect('admin/galeri');
        }
    }   

    public function deleteGaleri($id){
        $input = $this->input->post(NULL, TRUE);
        $where = array('id_galeri' => $id);
        unlink('./assets/admin/img/galeri/'.$input['foto_galeri']);

        $this->Crud->d('galeri', $where);
        $this->session->set_flashdata('info', 'Data Sukses Dihapus');
        redirect('admin/galeri');

    }

    public function editGaleri($id_galeri){
        $where = array('id_galeri' => $id_galeri);
        $input = $this->input->post(NULL, FALSE);

    if(!empty($_FILES['userfile']['tmp_name'])){
            
            $filenya = $_FILES['userfile']['name'];

            if($filenya = ''){
                $this->session->set_flashdata('info', 'Gagal Menambahkan Data');
                redirect('admin/galeri');
            }else{
                $config['upload_path'] = './assets/admin/img/galeri';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '';
                
                $this->load->library('upload', $config);
                if($config['max_size'] >= 2048){
                    $this->session->set_flashdata('info', 'File Melewati Batas Ukuran');
                    redirect('admin/galeri');
                }
                //unlink(base_url('assets/img/produk/'.$input['judul_foto']));
                unlink('./assets/admin/img/galeri/'.$input['foto_lama']);

                if(!$this->upload->do_upload('userfile')){
                    //die();
                    $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                    redirect('admin/galeri');
                }else{
                    $filenya =  $this->upload->data('file_name');
                }
                $today = date('Y-m-d H:i:s');
                $items = array(
                    'foto_galeri'        => $filenya,
                    'caption_galeri'     => $input['caption_galeri'],
                    'tanggal_galeri'     => $today,
                );

                //$this->Crud->u('barang', $items, $where);
                $this->db->update('galeri', $items, $where);
                $this->session->set_flashdata('info', 'Data Sukses Diupdate');
                redirect('admin/galeri');

            }
        }else{
            $today = date('Y-m-d H:i:s');
            $items = array(
                'foto_galeri'        => $filenya,
                'caption_galeri'     => $input['caption_galeri'],
                'tanggal_galeri'     => $today,
            );
            $this->Crud->u('galeri', $items, $where);
            $this->session->set_flashdata('info', 'Data Sukses Diupdate');
            redirect('admin/galeri');
        }

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
