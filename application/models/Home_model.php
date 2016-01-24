<?php
class Home_model extends CI_Model{
     public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_region_status() {
        $query = $this->db->query("select state,ipLocation from info_lteinfo");
        
        return $query->result_array();
    }   
}