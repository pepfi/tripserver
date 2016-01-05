<?php
class Device_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function device_nums(){
        return $this->db->count_all('deviceinfo');
    }
    
    public function deviceinfo($offset, $pagesize){
        $sql = "select mac,state,ip_address,ip_location,firmware_version,content_version,first_registration_time,last_registration_time from deviceinfo limit $offset,$pagesize";
        return $this->db->query($sql);
    }
    
    public function search($offset, $pagesize){
        $search_array = array(
            'mac' => trim($this->input->post('mac')),
            'state' => trim($this->input->post('state')),
            'ip_address' => trim($this->input->post('ip_address')),
            'firmware_version' => trim($this->input->post('firmware_version')),
            'ip_location' => trim($this->input->post('ip_location')),
            'content_version' => trim($this->input->post('content_version'))
        );
        
        foreach ($search_array as $key=>$value){
            if(isset($value)) {
                $this->db->like($key,$value);
            }
        }
        if($this->input->post('first_registration_time_start')){
            $this->db->where('first_registration_time >', $this->input->post('first_registration_time_start'));
        }
        if($this->input->post('first_registration_time_end')){
            $this->db->where('first_registration_time <', $this->input->post('first_registration_time_end'));
        }
        if($this->input->post('last_registration_time_start')){
            $this->db->where('last_registration_time >', $this->input->post('last_registration_time_start'));
        }
        if($this->input->post('last_registration_time_end')){
            $this->db->where('last_registration_time <', $this->input->post('last_registration_time_end'));
        }
        
        $sql = $this->db->get_compiled_select('deviceinfo');

        $sql .= " limit $offset,$pagesize";
        echo $sql;
        $input_null = "limit";
        if(substr($sql, 262, 5) != $input_null){//首次有search条件会执行该语句，点击翻页或设置每页条数时不会执行，更改search条件再次执行
            echo "session赋值";
            $this->session->set_userdata('pagesize',substr($sql, 276,1));//get pagesize
            $this->session->set_userdata('sql', $sql);            
        }
        if($pagesize != $this->session->userdata('pagesize')){//update pagesize
            $sql = strtr($this->session->userdata('sql'), "limit 0,".$this->session->userdata('pagesize'), "limit 0,".$pagesize);
            $this->session->set_userdata('sql', $sql);
            $this->session->set_userdata('pagesize', $pagesize);
        }

//        if($offset == 0){
//            $limit_replace = "limit 0";
//        }else {
////            $limit_replace = "limit ".$this->uri->segment(3);
            $limit_replace = "limit ".$offset;
//        }
        $sql =  strtr($this->session->userdata('sql'), "limit 0", $limit_replace);
        echo $sql;                       
        return $this->db->query($sql);

    }
}