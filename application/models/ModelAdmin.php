<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model {

	public function login($username, $password){

        $set_table = $this->db->get('admin');
        $query = $this->db->get_where('admin', array('username_admin' => $username, 'password_admin' => $password));
        //$query = $this->db->query ("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

        if($query->num_rows()>0){
            foreach ($query->result() as $x){
                $sess = array(
                    "id_admin"				=>	$x->id_admin,
                    'username_admin'		=>	$x->username_admin,
                    'status_admin'			=> $x->status_admin,
                    'nama_lengkap_admin'	=> $x->nama_lengkap_admin,
                    'foto_admin'            => $x->foto_admin,
                    'password_admin'        => $x->password_admin,
                    "status" 				=> "login",
                );
            }
            $this->session->set_userdata($sess);
            redirect('admin');
        }else{
           $this->session->set_flashdata('info', 'Username dan Password Anda Salah !');
            redirect('login');
        }
    }

    public function requestInformasi($kode){
        $this->db->select('*');
        $this->db->from('informasi');
        $this->db->where($kode);
        $query = $this->db->get();

        return $query->result();
    }

    public function requestGallery(){
        $this->db->select('*');
        $this->db->from('galeri');
        $query = $this->db->get();

        return $query->result();
    }

    public function requestPengurus($tipe_pengurus){
        $this->db->select('*');
        $this->db->from('pengurus');
        $this->db->where($tipe_pengurus);
        $query = $this->db->get();

        return $query->result();
    }

    public function requestSaran($kode_saran){
        $this->db->select('*');
        $this->db->from('saran');
        $this->db->where($kode_saran);
        $query = $this->db->get();

        return $query->result();
    }

    public function requestSaranApprove(){
        $this->db->select('*');
        $this->db->from('saran');
        $this->db->where_in('kode_saran', array('1', '2'));
        $query = $this->db->get();

        return $query->result();
    }
    // public function data_customer($where){
    //     $this->db->select( '*' );
    //     $this->db->from( 'estimasi' );
    //     $this->db->join( 'customer', 'customer.id_customer = estimasi.id_customer' , 'left' );
    //     $this->db->join('color', 'color.id_color = estimasi.id_color', 'left');
    //     $this->db->join( 'jenis_kendaran', 'jenis_kendaran.id_jenis = estimasi.id_jenis');
    //     $this->db->where($where);
    //     $query = $this->db->get();
    //     return $query->result();
    // }


}
