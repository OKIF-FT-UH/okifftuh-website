<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function index(){
		$data = array(
			'dataMahasiswa' => $this->Crud->ga('mahasiswa'),
		);
		$this->load->view('mahasiswa', $data);
	}

	public function addData(){
		$this->load->view('addData');
	}

	public function editData($id){
		$where = array('id_mahasiswa' => $id);
		$data = array (
			'dataMahasiswa' 	=>	$this->Crud->gw('mahasiswa', $where),
		);
		$this->load->view('editData', $data);
	}

	public function doEditData($id){
		$where = array('id_mahasiswa' => $id);
		$input = $this->input->post(NULL, TRUE);

		$data = array(
			'nama_mahasiswa'	=> $input['nama_mahasiswa'],
			'no_hp_mahasiswa'	=> $input['no_hp_mahasiswa'],
			'nim'				=> $input['nim'],
			'departemen'		=> $input['departemen'],
		);

		$this->Crud->u('mahasiswa', $data, $where);
		$this->session->set_flashdata('info', 'Data Berhasil Diupdate');
		redirect('mahasiswa');
	}

	public function doAddData(){
		//Tangkap Semua Data Dari Inputan
		$input = $this->input->post(NULL, TRUE);
		$data = array(
			'nama_mahasiswa' 	=> $input['nama_mahasiswa'],
			'nim'				=> $input['nim'],
			'no_hp_mahasiswa'	=> $input['no_hp_mahasiswa'],
			'departemen'		=> $input['departemen'],
			'id_ortu'			=> 1,
		);

		$this->db->insert('mahasiswa', $data);
		$this->session->set_flashdata('info', 'Data Sukses Ditambahkan');
		redirect('mahasiswa');
	}

	public function doDelete($id){
		$where = array(
			'id_mahasiswa' => $id,
		);

		$this->Crud->d('mahasiswa', $where);
		$this->session->set_flashdata('info', 'data telah dihapus');
		redirect('mahasiswa');
	}

	

}
