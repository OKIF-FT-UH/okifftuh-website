<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ModelHome extends CI_Model {

    public function infoKini($t,$l,$f,$o,$ad){return $this->db->limit($l,$f)->order_by($o,$ad)->get($t)->result();}
    
}
