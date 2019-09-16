<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ModelHome extends CI_Model {

    public function infoKini($t,$l,$f,$o,$ad){return $this->db->limit($l,$f)->order_by($o,$ad)->get($t)->result();}
    public function orderinfo($t,$o,$ad){return $this->db->order_by($o,$ad)->get($t)->result();}
    public function orderinfowhere($t,$w,$o,$ad){return $this->db->where($w)->order_by($o,$ad)->get($t)->result();}
    public function getinfo($t,$L,$start,$o,$ad){return $this->db->limit($L,$start)->order_by($o,$ad)->get($t)->result();}
    public function getinfowhere($t,$w,$L,$start,$o,$ad){return $this->db->where($w)->limit($L,$start)->order_by($o,$ad)->get($t)->result();}
    public function pengurus($t,$w,$l,$f,$o,$ad){return $this->db->where($w)->limit($l, $f)->order_by($o,$ad)->get($t)->result();}
    public function prestasi($t,$l,$start,$o,$ad){return $this->db->limit($l,$start)->order_by($o,$ad)->get($t)->result();}
    public function cw($t){return $this->db->get($t)->num_rows();} //count where
}
