<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        $this->load->helper(array('url','download'));
        if($this->session->userdata('status') != "login"){
            redirect('login');
        }else if($this->uri->segment(2) == 'admin' and ($this->session->userdata('status_admin') != 'super_admin')){
            redirect('admin');
        }
    }

	public function index(){
		$data = array(
            'isi' => 'admin/dashboard/isi',
            'title' => 'Dashboard Admin OKIF FT-UH', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
	}

    //==Begin Modul Master Data==
    //Begin Kategori
    public function kategori(){
        $data = array(
            'title'     => 'Daftar kategori',
            'isi'       => 'admin/dashboard/kategori',
            'data'      => $this->Crud->ga('kategori'),
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //Begin Do Add Kategori
    public function doAddKategori(){
        $input = $this->input->post(NULL, TRUE);
        $data = array('nama_kategori' => $input['nama_kategori'],);

        $this->db->insert('kategori', $data);
        $this->session->set_flashdata('info', 'Kategori Sukses Ditambahkan');
        redirect('admin/kategori');

    }
    //End Do Add Kategori
    //Begin Do Edit Kategori
    public function doEditKategori($id){
        $where = array('id_kategori' => $id);
        $input = $this->input->post(NULL, TRUE);
        $data =array('nama_kategori' => $input['nama_kategori'],);

        $this->Crud->u('kategori', $data, $where);
        $this->session->set_flashdata('info', 'Kategori Berhasil Diupdate');
        redirect('admin/kategori');
    }
    //End Do Edit Kategori
    //Begin Do Delete Kategori
    public function doDeletekategori($id){
        $where = array('id_kategori' => $id,);

        $this->Crud->d('kategori', $where);
        $this->session->set_flashdata('info', 'Kategori Telah Dihapus');
        redirect('admin/kategori');
    }
    //End Do Delete Kategori
    //End Kategori

    //Begin Mahasiswa
    public function mahasiswa(){
        $where = array('kode_mahasiswa' => 1);
        $data = array(
            'title'     => 'Database Mahasiswa',
            'isi'       => 'admin/dashboard/mahasiswa',
            'data'      => $this->Crud->gw('mahasiswa', $where), 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    //Begin Do Add Mahasiswa
    public function doAddMahasiswa(){
        $input = $this->input->post(NULL, TRUE);
        $data = array(
            'nama_mahasiswa'            => $input['nama_mahasiswa'],
            'nim_mahasiswa'             => $input['nim_mahasiswa'],
            'angkatan_mahasiswa'        => $input['angkatan_mahasiswa'],
            'gender_mahasiswa'          => $input['gender_mahasiswa'],
            'agama_mahasiswa'           => $input['agama_mahasiswa'],
            'tempat_lahir_mahasiswa'    => $input['tempat_lahir_mahasiswa'],
            'tanggal_lahir_mahasiswa'   => $input['tanggal_lahir_mahasiswa'],
            'alamat_mahasiswa'          => $input['alamat_mahasiswa'],
            'no_hp_mahasiswa'           => $input['no_hp_mahasiswa'],
            'email_mahasiswa'           => $input['email_mahasiswa'],
            'sks_mahasiswa'             => $input['sks_mahasiswa'],
            'ipk_mahasiswa'             => $input['ipk_mahasiswa'],
            'kode_mahasiswa'            => 1,
        );
        $this->db->insert('mahasiswa', $data);
        $this->session->set_flashdata('info', 'Data Mahasiswa Sukses Ditambahkan');
        redirect('admin/mahasiswa');
    }
    //ENd Do Add Mahasiswa

    //Begin Do Edit Mahasiswa
    public function doEditMahasiswa($id){
        $where = array('id_mahasiswa' => $id);
        $input = $this->input->post(NULL, TRUE);
        $data =array(
            'nama_mahasiswa'            => $input['nama_mahasiswa'],
            'nim_mahasiswa'             => $input['nim_mahasiswa'],
            'angkatan_mahasiswa'        => $input['angkatan_mahasiswa'],
            'gender_mahasiswa'          => $input['gender_mahasiswa'],
            'agama_mahasiswa'           => $input['agama_mahasiswa'],
            'tempat_lahir_mahasiswa'    => $input['tempat_lahir_mahasiswa'],
            'tanggal_lahir_mahasiswa'   => $input['tanggal_lahir_mahasiswa'],
            'alamat_mahasiswa'          => $input['alamat_mahasiswa'],
            'no_hp_mahasiswa'           => $input['no_hp_mahasiswa'],
            'email_mahasiswa'           => $input['email_mahasiswa'],
            'sks_mahasiswa'             => $input['sks_mahasiswa'],
            'ipk_mahasiswa'             => $input['ipk_mahasiswa'],
            'kode_mahasiswa'            => 1,
        );
        $this->Crud->u('mahasiswa', $data, $where);
        $this->session->set_flashdata('info', 'Data Mahasiswa Berhasil Diupdate');
        redirect('admin/mahasiswa');
    }
    //End Do Edit Mahasiswa

    //Begin Do Delete Mahasiswa
    public function doDeleteMahasiswa($id){
        $where = array('id_mahasiswa' => $id,);

        $this->Crud->d('mahasiswa', $where);
        $this->session->set_flashdata('info', 'Data Mahasiswa Telah Dihapus');
        redirect('admin/mahasiswa');
    }
    //End Do Delete Mahasiswa
    //End Mahasiswa

    //Begin Alumni
    public function alumni(){
        $where = array('kode_mahasiswa' => 2);
        $data = array(
            'title'     => 'Database Alumni',
            'isi'       => 'admin/dashboard/alumni',
            'data'      => $this->Crud->gw('mahasiswa', $where), 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    //Begin Do Add Alumni
    public function doAddAlumni(){
        $input = $this->input->post(NULL, TRUE);
        $data = array(
            'nama_mahasiswa'            => $input['nama_mahasiswa'],
            'angkatan_mahasiswa'        => $input['angkatan_mahasiswa'],
            'gender_mahasiswa'          => $input['gender_mahasiswa'],
            'agama_mahasiswa'           => $input['agama_mahasiswa'],
            'tempat_lahir_mahasiswa'    => $input['tempat_lahir_mahasiswa'],
            'tanggal_lahir_mahasiswa'   => $input['tanggal_lahir_mahasiswa'],
            'alamat_mahasiswa'          => $input['alamat_mahasiswa'],
            'no_hp_mahasiswa'           => $input['no_hp_mahasiswa'],
            'email_mahasiswa'           => $input['email_mahasiswa'],
            'instansi_mahasiswa'        => $input['instansi_mahasiswa'],
            'kode_mahasiswa'            => 2,
        );
        $this->db->insert('mahasiswa', $data);
        $this->session->set_flashdata('info', 'Data Alumni Sukses Ditambahkan');
        redirect('admin/alumni');
    }
    //End Do Add Alumni

    //Begin Do Edit Alumni
    public function doEditAlumni($id){
        $where = array('id_mahasiswa' => $id);
        $input = $this->input->post(NULL, TRUE);
        $data =array(
            'nama_mahasiswa'            => $input['nama_mahasiswa'],
            'angkatan_mahasiswa'        => $input['angkatan_mahasiswa'],
            'gender_mahasiswa'          => $input['gender_mahasiswa'],
            'agama_mahasiswa'           => $input['agama_mahasiswa'],
            'tempat_lahir_mahasiswa'    => $input['tempat_lahir_mahasiswa'],
            'tanggal_lahir_mahasiswa'   => $input['tanggal_lahir_mahasiswa'],
            'alamat_mahasiswa'          => $input['alamat_mahasiswa'],
            'no_hp_mahasiswa'           => $input['no_hp_mahasiswa'],
            'email_mahasiswa'           => $input['email_mahasiswa'],
            'instansi_mahasiswa'        => $input['instansi_mahasiswa'],
            'kode_mahasiswa'            => 2,
        );
        $this->Crud->u('mahasiswa', $data, $where);
        $this->session->set_flashdata('info', 'Data Alumni Berhasil Diupdate');
        redirect('admin/alumni');
    }
    //End Do Edit Alumni

    //Begin Do Delete Alumni
    public function doDeleteAlumni($id){
        $where = array('id_mahasiswa' => $id,);

        $this->Crud->d('mahasiswa', $where);
        $this->session->set_flashdata('info', 'Data Alumni Telah Dihapus');
        redirect('admin/alumni');
    }
    //End Do Delete Alumni
    //End Alumni

    //==End Modul Master Data==

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
        $this->Crud->d('informasi', $where);
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


    //start prestasi
public function daftarPrestasi(){
    $data = array(
        'title' => 'Daftar Prestasi Mahasiswa',
        'isi' => 'admin/dashboard/daftarPrestasi',
        'data' => $this->Crud->ga('prestasi'),
    );
    $this->load->view('admin/_layouts/wrapper', $data);
}


public function addDaftarPrestasi(){
    $input = $this->input->post( NULL, TRUE);
    $data =  array(
        'nama_prestasi' => $input['nama'],
        'prestasi' => $input['prestasi'],
        'kegiatan_prestasi' => $input['kegiatan'],
        'tahun_prestasi' => $input['tahun'],
        );
    $this->db->insert('prestasi', $data);
    $this->session->set_flashdata('info','Data sukses ditambahkan');
    redirect('admin/daftarPrestasi');
}

public function updateDaftarPrestasi($id){
    $where = array('id_prestasi' => $id);
    $load = $this->input->post(NULL, TRUE);
    $data = array(
        'nama_prestasi' => $load['nama'],
        'prestasi' => $load['prestasi'],
        'kegiatan_prestasi' => $load['kegiatan'],
        'tahun_prestasi' => $load['tahun'],
        );
    $this->Crud->u('prestasi', $data, $where);
    $this->session->set_flashdata('info','Data Telah di Update');
    redirect('admin/daftarPrestasi');
}

public function deleteDaftarPrestasi($id){
    $where = array(
        'id_prestasi' => $id,
    );
    $this->Crud->d('prestasi', $where);
    $this->session->set_flashdata('info','Data telah dihapus');
    redirect('admin/daftarPrestasi');
}
//end prestasi

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
                $filenya =  $this->upload->data();

                //Begin Resizing
                $configer =  array(
                    'image_library'   => 'gd2',
                    'source_image'    =>  './assets/admin/img/galeri/'.$filenya['file_name'],
                    'new_image'       =>  './assets/admin/img/galeri/resized/',
                    'quality'         =>  '100%',
                    'maintain_ratio'  =>  FALSE,
                    'width'           =>  600,
                    'height'          =>  400,
                );

                $this->load->library('image_lib', $configer);
                $this->image_lib->resize();
                //End Resizing

            }
            $today = date('Y-m-d H:i:s');
            $data = array(
                'foto_galeri'        => $filenya['file_name'],
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
        unlink('./assets/admin/img/galeri/resized/'.$input['foto_galeri']);

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
                unlink('./assets/admin/img/galeri/resized/'.$input['foto_lama']);

                if(!$this->upload->do_upload('userfile')){
                    //die();
                    $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                    redirect('admin/galeri');
                }else{
                    $filenya =  $this->upload->data();

                    $configer =  array(
                      'image_library'   => 'gd2',
                      'source_image'    =>  './assets/admin/img/galeri/'.$filenya['file_name'],
                      'new_image'       =>  './assets/admin/img/galeri/resized/',
                      'quality'         =>  '100%',
                      'maintain_ratio'  =>  FALSE,
                      'width'           =>  600,
                      'height'          =>  400,
                    );

                    $this->load->library('image_lib', $configer);
                    $this->image_lib->resize();
                }
                $today = date('Y-m-d H:i:s');
                $items = array(
                    'foto_galeri'        => $filenya['file_name'],
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
        $where = array('kode_saran' => 0);
        $data = array(
            'title'     => 'Saran Masuk', 
            'isi'       => 'admin/dashboard/saran',
            'data'      => $this->ModelAdmin->requestSaran($where),
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    public function saranApprove(){
        $data = array(
            'title'     => 'Saran Masuk', 
            'isi'       => 'admin/dashboard/saran',
            'data'      => $this->ModelAdmin->requestSaranApprove(),
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    public function deleteSaran($id){
        $where = array(
            'id_saran' => $id,
        );
        $this->Crud->d('saran', $where);
        $this->session->set_flashdata('info','Saran telah dihapus');
        redirect('admin/saranMasuk');
    
    }

    public function saranProses($id){
        $where = array('id_saran' => $id);
        $input = $this->input->post(NULL, FALSE);
        $data = array(
            'kode_saran' => '1',
            'tanggapan_saran' => $input['tanggapan_saran'],
            );
        $this->Crud->u('saran', $data, $where);
        $this->session->set_flashdata('info','Saran Telah diproses');
        redirect('admin/saranMasuk');
    }

    public function saranDone($id){
        $where = array('id_saran' => $id);
        $input = $this->input->post(NULL, FALSE);
        $today = date('Y-m-d H:i:s');
        $data = array(
            'kode_saran' => '2',
            'tanggapan_saran' => $input['tanggapan_saran'],
            'acc_saran' => $today,
            );
        $this->Crud->u('saran', $data, $where);
        $this->session->set_flashdata('info','Saran Telah dilaksanakan');
        redirect('admin/saranApprove');
    }

    //End Saran Masuk

    //Begin Admin
	 public function admin(){
        $data = array(
            'title' => 'Daftar Administrator',
            'isi'   => 'admin/dashboard/daftarAdmin',
            'data'  => $this->Crud->ga('admin')
            );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    public function doAddAdmin(){
        $input = $this->input->post(NULL, TRUE);
        $filenya = $_FILES['foto_admin']['name'];

        if($filenya = ''){
            $this->session->set_flashdata('info', 'File Tidak Terpilih');
                redirect('admin/admin');  
              
        }else{
                $config['upload_path'] = './assets/admin/img/fotoAdmin';
        }

        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '0';

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('foto_admin')){
            // die();
            $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
            redirect('admin/admin');  
                
        }else{
            $filenya =  $this->upload->data('file_name');
        }

        $data = array(
            'nama_lengkap_admin'  => $input['nama_lengkap_admin'],
            'username_admin'      => $input['username_admin'],
            'password_admin'      => md5($input['password_admin']),
            'status_admin'        => $input['status_admin'],
            'foto_admin'          => $filenya,
        );

        $this->db->insert('admin', $data);
        $this->session->set_flashdata('info', 'Administrator Sukses Ditambahkan');
        redirect('admin/admin');
    }

    public function doDeleteAdmin($id){
        $input = $this->input->post(NULL, TRUE);
        $where = array('id_admin' => $id);

        unlink('./assets/admin/img/fotoAdmin/'.$input['foto_admin']);

        //Hapus di Tabel Database
        $this->Crud->d('admin', $where);
        $this->session->set_flashdata('info', 'Data Sukses Dihapus');

        redirect('admin/admin');
    }

    public function doUpdateAdmin($id){
        $where = array('id_admin' => $id);
        $input = $this->input->post(NULL, FALSE);

        if(!empty($_FILES['foto_admin']['tmp_name'])){
                
                $filenya = $_FILES['foto_admin']['name'];

                if($filenya = ''){
                    $this->session->set_flashdata('info', 'Gagal Menambahkan Informasi');
                    redirect('admin/admin');
                }else{
                    $config['upload_path'] = './assets/admin/img/fotoAdmin';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = '';
                    
                    $this->load->library('upload', $config);
                    if($config['max_size'] >= 2048){
                        $this->session->set_flashdata('info', 'File Melewati Batas Ukuran');
                        redirect('admin/admin');
                    }
                    //unlink(base_url('assets/img/produk/'.$input['judul_foto']));
                    unlink($config['upload_path'].'/'.$input['foto_lama']);

                    if(!$this->upload->do_upload('foto_admin')){
                        //die();
                        $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                        redirect('admin/admin');
                    }else{
                        $filenya =  $this->upload->data('file_name');
                    }

                    if ($this->input->post('password_admin') != '' ){
                        //ada md5
                        $items = array(
                        'nama_lengkap_admin'  => $input['nama_lengkap_admin'],
                        'username_admin'      => $input['username_admin'],
                        'password_admin'      => md5($input['password_admin']),
                        'status_admin'        => $input['status_admin'],
                        'foto_admin'          => $filenya,
                        );
                    }else{
                        //kirim pass lama
                        $items = array(
                        'nama_lengkap_admin'  => $input['nama_lengkap_admin'],
                        'username_admin'      => $input['username_admin'],
                        'password_admin'      => $input['password_lama'],
                        'status_admin'        => $input['status_admin'],
                        'foto_admin'          => $filenya,
                        );
                    }

                    //$this->Crud->u('barang', $items, $where);
                    $this->db->update('admin', $items, $where);
                    $this->session->set_flashdata('info', 'Data Sukses Diupdate');
                    redirect('admin/admin');

                }
        }else{
            if ($this->input->post('password_admin') != '' ){
                //ada md5
                $items = array(
                'nama_lengkap_admin'  => $input['nama_lengkap_admin'],
                'username_admin'      => $input['username_admin'],
                'password_admin'      => md5($input['password_admin']),
                'status_admin'        => $input['status_admin'],
                );
            }else{
                //kirim pass lama
                $items = array(
                'nama_lengkap_admin'  => $input['nama_lengkap_admin'],
                'username_admin'      => $input['username_admin'],
                'password_admin'      => $input['password_lama'],
                'status_admin'        => $input['status_admin'],
                );
            }

            $this->Crud->u('admin', $items, $where);
            $this->session->set_flashdata('info', 'Data Sukses Diupdate');
            redirect('admin/admin');
        }
    }

    public function updateProfil($id){
        $where = array('id_admin' => $id);
        $input = $this->input->post(NULL, FALSE);

        if(!empty($_FILES['foto_admin']['tmp_name'])){
                
                $filenya = $_FILES['foto_admin']['name'];

                if($filenya = ''){
                    $this->session->set_flashdata('info', 'Gagal Menambahkan Informasi');
                    redirect('admin/admin');
                }else{
                    $config['upload_path'] = './assets/admin/img/fotoAdmin';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = '';
                    
                    $this->load->library('upload', $config);
                    if($config['max_size'] >= 2048){
                        $this->session->set_flashdata('info', 'File Melewati Batas Ukuran');
                        redirect('admin/admin');
                    }
                    //unlink(base_url('assets/img/produk/'.$input['judul_foto']));
                    unlink($config['upload_path'].'/'.$input['foto_lama']);

                    if(!$this->upload->do_upload('foto_admin')){
                        //die();
                        $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                        redirect('admin/admin');
                    }else{
                        $filenya =  $this->upload->data('file_name');
                    }

                    if ($this->input->post('password_admin') != '' ){
                        //ada md5
                        $items = array(
                        'nama_lengkap_admin'  => $input['nama_lengkap_admin'],
                        'username_admin'      => $input['username_admin'],
                        'password_admin'      => md5($input['password_admin']),
                        'foto_admin'          => $filenya,
                        );
                    }else{
                        //kirim pass lama
                        $items = array(
                        'nama_lengkap_admin'  => $input['nama_lengkap_admin'],
                        'username_admin'      => $input['username_admin'],
                        'password_admin'      => $input['password_lama'],
                        'foto_admin'          => $filenya,
                        );
                    }

                    //$this->Crud->u('barang', $items, $where);
                    $this->db->update('admin', $items, $where);
                    $this->session->set_flashdata('info', 'Data Sukses Diupdate');
                    redirect('login/logout');

                }
        }else{
            if ($this->input->post('password_admin') != '' ){
                //ada md5
                $items = array(
                'nama_lengkap_admin'  => $input['nama_lengkap_admin'],
                'username_admin'      => $input['username_admin'],
                'password_admin'      => md5($input['password_admin']),
                );
            }else{
                //kirim pass lama
                $items = array(
                'nama_lengkap_admin'  => $input['nama_lengkap_admin'],
                'username_admin'      => $input['username_admin'],
                'password_admin'      => $input['password_lama'],
                );
            }

            $this->Crud->u('admin', $items, $where);
            redirect('login/logout');
        }

    }
    //End Admin

    //===Begin Modul Pengurus===
     //Begin DMMIF FT-UH
    public function pengurusDmmif(){
        $where = array('tipe_pengurus' => 1);
        $data = array(
            'title'     => 'Pengurus DMMIF FT-UH', 
            'isi'       => 'admin/dashboard/pengurus',
            'data'      => $this->ModelAdmin->requestPengurus($where),
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //End DMMIF FT-UH

    //Begin HMIF FT-UH
    public function pengurusHmif(){
        $where = array('tipe_pengurus' => 2);
        $data = array(
            'title'     => 'Pengurus HMIF FT-UH',
            'isi'       => 'admin/dashboard/pengurus',
            'data'      => $this->ModelAdmin->requestPengurus($where), 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }
    //End HMIF FT-UH

    //Begin Do Add Pengurus
    public function doAddPengurus($tipe_pengurus){
        $input = $this->input->post(NULL, FALSE);
        $filenya = $_FILES['fotoPengurus']['name'];

        if($filenya = ''){
            $this->session->set_flashdata('info', 'File Tidak Terpilih');
                if($tipe_pengurus == '1'){
                    redirect('admin/pengurusDmmif');  
                }else if($tipe_pengurus == '2'){
                    redirect('admin/pengurusHmif');
                }
        }else{
            if($tipe_pengurus == '1'){
                $config['upload_path'] = './assets/admin/img/pengurus/dmmif';
            }else if($tipe_pengurus == '2'){
                $config['upload_path'] = './assets/admin/img/pengurus/hmif';
            }
        }

        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '0';

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('fotoPengurus')){
            // die();
            $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
            if($tipe_pengurus == '1'){
                    redirect('admin/pengurusDmmif');  
                }else if($tipe_pengurus == '2'){
                    redirect('admin/pengurusHmif');
                }
        }else{
            $filenya =  $this->upload->data('file_name');
        }


        $data = array(
            'nama_pengurus'         => $input['nama_pengurus'],
            'jabatan_pengurus'      => $input['jabatan'],
            'periode_pengurus'      => $input['periode'],
            'facebook'              => $input['facebook'],
            'twitter'               => $input['twitter'],
            'instagram'             => $input['instagram'],
            'foto_pengurus'         => $filenya,
            'tipe_pengurus'         => $tipe_pengurus,
        );

        $this->db->insert('pengurus', $data);
        $this->session->set_flashdata('info', 'Informasi Pengurus Sukses Ditambahkan');

        if($tipe_pengurus == '1'){
            redirect('admin/pengurusDmmif');
        }else if($tipe_pengurus == '2'){
            redirect('admin/pengurusHmif');
        }else{
            redirect('admin');
        }
    }
    //End Do Add Pengurus

    //Begin Do Delete Pengurus
    public function doDeletePengurus($tipe_pengurus ,$id){
        $input = $this->input->post(NULL, TRUE);
        $where = array('id_pengurus' => $id);

        if($tipe_pengurus == '1'){
            $folder = 'dmmif';
        }else if($tipe_pengurus == '2'){
            $folder = 'hmif';
        }
        unlink('./assets/admin/img/pengurus/'.$folder.'/'.$input['foto_pengurus']);

        $this->Crud->d('pengurus', $where);
        $this->session->set_flashdata('info', 'Data Sukses Dihapus');

        if($tipe_pengurus == '1'){
            redirect('admin/pengurusDmmif');  
        }else if($tipe_pengurus == '2'){
            redirect('admin/pengurusHmif');
        }
    }
    //End Do Delete Pengurus

    //Begin Do Update Pengurus
    public function doUpdatePengurus($tipe_pengurus ,$id){
        $where = array('id_pengurus' => $id);
        $input = $this->input->post(NULL, FALSE);


        if($tipe_pengurus == '1'){
            $alamat = 'admin/pengurusDmmif';
        }else if($tipe_pengurus == '2'){
            $alamat = 'admin/pengurusHmif';
        }
        
        if(!empty($_FILES['fotoPengurus']['tmp_name'])){
            
            $filenya = $_FILES['fotoPengurus']['name'];

            if($filenya = ''){
                $this->session->set_flashdata('info', 'Gagal Menambahkan Informasi Pengurus');
                redirect($alamat);
            }else{
                if($tipe_pengurus == '1'){
                    $config['upload_path'] = './assets/admin/img/pengurus/dmmif';
                }else if($tipe_pengurus == '2'){
                    $config['upload_path'] = './assets/admin/img/pengurus/hmif';
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

                if(!$this->upload->do_upload('fotoPengurus')){
                    //die();
                    $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                    redirect($alamat);
                }else{
                    $filenya =  $this->upload->data('file_name');
                }

                $items = array(
                    'nama_pengurus'         => $input['nama_pengurus'],
                    'jabatan_pengurus'      => $input['jabatan'],
                    'periode_pengurus'      => $input['periode'],
                    'facebook'              => $input['facebook'],
                    'twitter'               => $input['twitter'],
                    'instagram'             => $input['instagram'],
                    'foto_pengurus'         => $filenya,
                    'tipe_pengurus'         => $tipe_pengurus,
                );

                //$this->Crud->u('barang', $items, $where);
                $this->db->update('pengurus', $items, $where);
                $this->session->set_flashdata('info', 'Informasi Pengurus Sukses Diupdate');
                redirect($alamat);

            }
        }else{
            $items = array(
                'nama_pengurus'         => $input['nama_pengurus'],
                'jabatan_pengurus'      => $input['jabatan'],
                'periode_pengurus'      => $input['periode'],
                'facebook'              => $input['facebook'],
                'twitter'               => $input['twitter'],
                'instagram'             => $input['instagram'],
                'tipe_pengurus'         => $tipe_pengurus,
            );
            $this->Crud->u('pengurus', $items, $where);
            $this->session->set_flashdata('info', 'Infomasi Pengurus Sukses Diupdate');
            redirect($alamat);
        }
    }
    //End Do Update Pengurus

    //Begin Sejarah Pengurus
    public function sejarahPengurus(){
        $data = array(
            'title'     => 'Daftar Sejarah Pengurus',
            'isi'       => 'admin/dashboard/sejarahPengurus',
            'data'      => $this->Crud->ga('sejarah_pengurus'), 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    //Begin Do Create Sejarah
     public function doCreateSejarah(){
        $input = $this->input->post(NULL, FALSE);
        $filenya = $_FILES['userfile']['name'];

        if($filenya = ''){
            $this->session->set_flashdata('info', 'File Tidak Terpilih');
            redirect('admin/sejarahPengurus');

        }else{
            $config['upload_path'] = './assets/admin/img/sejarahPengurus';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '0';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('userfile')){
                // die();
                $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                redirect('admin/sejarahPengurus/');
            }else{
                $filenya =  $this->upload->data('file_name');
            }

            $data = array(
                'nama_pengurus'         => $input['nama_pengurus'],
                'jabatan_pengurus'      => $input['jabatan_pengurus'],
                'periode_pengurus'      => $input['periode_pengurus'],
                'daftar_pengurus'       => $input['daftar_pengurus'],
                'foto_pengurus'        => $filenya,
            );

            $this->db->insert('sejarah_pengurus', $data);
            $this->session->set_flashdata('info', 'Data Sukses Ditambahkan');

            redirect('admin/sejarahPengurus');
        }
    }
    //END Do create Sejarah

    //Begin Do Edit Sejarah
    public function doEditSejarah($id_pengurus){
    $where = array('id_pengurus' => $id_pengurus);
    $input = $this->input->post(NULL, FALSE);

    if(!empty($_FILES['userfile']['tmp_name'])){
            
            $filenya = $_FILES['userfile']['name'];

            if($filenya = ''){
                $this->session->set_flashdata('info', 'Gagal Menambahkan Informasi');
                redirect('admin/sejarahPengurus');
            }else{

                $config['upload_path'] = './assets/admin/img/sejarahPengurus';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '';
                
                $this->load->library('upload', $config);
                if($config['max_size'] >= 2048){
                    $this->session->set_flashdata('info', 'File Melewati Batas Ukuran');
                    redirect('admin/sejarahPengurus');
                }
                //unlink(base_url('assets/img/produk/'.$input['judul_foto']));
                unlink($config['upload_path'].'/'.$input['foto_lama']);

                if(!$this->upload->do_upload('userfile')){
                    //die();
                    $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                    redirect('admin/sejarahPengurus');
                }else{
                    $filenya =  $this->upload->data('file_name');
                }

                $items = array(
                    'nama_pengurus'             => $input['nama_pengurus'],
                    'jabatan_pengurus'          => $input['jabatan_pengurus'],
                    'periode_pengurus'          => $input['periode_pengurus'],
                    'daftar_pengurus'           => $input['daftar_pengurus'],
                    'foto_pengurus'            => $filenya,
                );

                //$this->Crud->u('barang', $items, $where);
                $this->db->update('sejarah_pengurus', $items, $where);
                $this->session->set_flashdata('info', 'Data Sukses Diupdate');
                redirect('admin/sejarahPengurus');

            }
        }else{
            $items = array(
                'nama_pengurus'             => $input['nama_pengurus'],
                'jabatan_pengurus'          => $input['jabatan_pengurus'],
                'periode_pengurus'          => $input['periode_pengurus'],
                'daftar_pengurus'           => $input['daftar_pengurus'],
            );
            $this->Crud->u('sejarah_pengurus', $items, $where);
            $this->session->set_flashdata('info', 'Data Sukses Diupdate');
            redirect('admin/sejarahPengurus');
            }

        }
    //END Do Edit Sejarah
        
    //Begin Do Delete Sejarah
    public function doDeleteSejarah($id){
        $input = $this->input->post(NULL, TRUE);
        $where = array('id_pengurus' => $id);

        unlink('./assets/admin/img/sejarahPengurus/'.$input['foto_pengurus']);


        //Hapus di Tabel Database
        $this->Crud->d('sejarah_pengurus', $where);
        $this->session->set_flashdata('info', 'Data Sukses Dihapus');

        redirect('admin/sejarahPengurus');
    }
    //End Do Delete Sejarah
    //End Sejarah Pengurus
    //===End Modul Pengurus==

    public function arsip(){
        $data = array(
            'title'     => 'Daftar Arsip',
            'isi'       => 'admin/dashboard/arsip',
            'data'      => $this->Crud->ga('arsip'), 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
    }

    public function addArsip(){
        $input = $this->input->post(NULL, TRUE);
        $file = $_FILES['userfile']['name'];
        if($file = ''){
            $this->session->set_flashdata('info','File Tidak Terpilih');
            redirect('admin/arsip');
        }else{
            $config['upload_path'] = './assets/admin/img/arsip';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
            $config['max_size'] = '100000';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('userfile')){
                $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                redirect('admin/arsip/');
            }else{
                $file = $this->upload->data();
            }

            $data = array(
                'file_arsip'    => $file['file_name'],
                'nama_arsip'    => $input['nama_arsip']
            );

            $this->db->insert('arsip',$data);
            $this->session->set_flashdata('info', 'Data Sukses Ditambahkan');
            redirect('admin/arsip');

        }
    }

    public function downloadArsip($arsip){
        force_download('./assets/admin/img/arsip/'.$arsip , NULL);
        redirect('admin/arsip/');
    }

    public function editArsip($id){
        $where = array('id' => $id);
        $input = $this->input->post(NULL,FALSE);

        if(!empty($_FILES['userfile']['tmp_name'])){
            $file = $_FILES['userfile']['name'];
            if($file = ''){
                $this->session->set_flashdata('info','File Tidak Terpilih');
                redirect('admin/arsip');
            }else{
                $config['upload_path'] = './assets/admin/img/arsip';
                $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
                $config['max_size'] = '100000';

                $this->load->library('upload',$config);
                
                unlink('./assets/admin/img/arsip/'.$input['file_lama']);
                if(!$this->upload->do_upload('userfile')){
                    //die();
                    $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                    redirect('admin/galeri');
                }else{
                    $file =  $this->upload->data();
                }
                $data = array(
                    'file_arsip'    => $file['file_name'],
                    'nama_arsip'    => $input['nama_arsip']
                );

                $this->Crud->u('arsip',$data,$where);
                $this->session->set_flashdata('info', 'Data Sukses Diupdate');
                redirect('admin/arsip');

            }
        }else{
            $data = array(
                'nama_arsip'    => $input['nama_arsip']
            );
            $this->Crud->u('arsip',$data,$where);
            $this->session->set_flashdata('info', 'Data Sukses Diupdate');
            redirect('admin/arsip');
        }
    }

    public function deleteArsip($id){
        $input = $this->input->post(NULL, TRUE);
        $where = array('id' => $id);
        unlink('./assets/admin/img/arsip/'.$input['file_lama']);

        $this->Crud->d('arsip',$where);
        $this->session->set_flashdata('info', 'Data Sukses Dihapus');
        redirect('admin/arsip');
    }
}
?>
