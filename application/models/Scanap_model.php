<?php
class Scanap_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function info_nums(){
       return $this->db->count_all('scanaplist'); 
    }
    
    public function register($array){
        $sql = "insert into scanaplist values('{$array['ap_mac']}', '{$array['wlan_src']}',
                '{$array['wlan_rssi']}', '{$array['wlan_essid']}', '{$array['wlan_mode']}', '{$array['wlan_channel']}',
                '{$array['wlan_encrypt']}', '{$array['time']}')";
        
        return $this->db->query($sql);
    }
    
    public function ap_info($offset, $pagesize){
        $sql = "select * from `scanaplist` limit $offset,$pagesize";
        
        return $this->db->query($sql)->result_array();
    }
}