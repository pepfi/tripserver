<?php
class Device_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function device_nums(){
        return $this->db->count_all('info_lteinfo');
    }
    
    public function deviceinfo($offset, $pagesize){
        $sql = "select mac,state,ipAddress,hostsn,ipLocation,contentVersion,firstRegistrationTime,
                lastRegistrationTime from info_lteinfo limit $offset,$pagesize";
        
        return $this->db->query($sql);
    }
    
    public function search_sql_prepare(){
        $search_array = array(
            'mac' => trim($this->input->post('mac')),
            'state' => trim($this->input->post('state')),
            'ip_address' => trim($this->input->post('ip_address')),
            'firmware_version' => trim($this->input->post('firmware_version')),
            'ip_location' => trim($this->input->post('ip_location')),
            'content_version' => trim($this->input->post('content_version')),
            'first_registration_time_start' => $this->input->post('first_registration_time_start'),
            'first_registration_time_end' => $this->input->post('first_registration_time_end'),
            'last_registration_time_start' => $this->input->post('last_registration_time_start'),
            'last_registration_time_end' => $this->input->post('last_registration_time_end')
        );
        
        if($search_array['mac']=='' && $search_array['state']=='' && $search_array['ip_address']==''
           && $search_array['firmware_version']=='' && $search_array['ip_location']=='' && $search_array['content_version']==''
           && $search_array['first_registration_time_start']=='' && $search_array['first_registration_time_end']==''
           && $search_array['last_registration_time_start']=='' && $search_array['last_registration_time_end']=='')
        {
            $search_array['mac'] = $this->session->userdata('mac');
            $search_array['state'] = $this->session->userdata('state');
            $search_array['ip_address'] = $this->session->userdata('ip_address');
            $search_array['firmware_version'] = $this->session->userdata('firmware_version');
            $search_array['ip_location'] = $this->session->userdata('ip_location');
            $search_array['content_version'] = $this->session->userdata('content_version');
            $search_array['first_registration_time_start'] = $this->session->userdata('first_registration_time_start');
            $search_array['first_registration_time_end'] = $this->session->userdata('first_registration_time_end');
            $search_array['last_registration_time_start'] = $this->session->userdata('last_registration_time_start');
            $search_array['last_registration_time_end'] = $this->session->userdata('last_registration_time_end');
        }
        
        $search_array_session = array(
            'mac' => $search_array['mac'],
            'state' => $search_array['state'],
            'ip_address' => $search_array['ip_address'],
            'firmware_version' => $search_array['firmware_version'],
            'ip_location' => $search_array['ip_location'],
            'content_version' => $search_array['content_version'],
            'first_registration_time_start' => $search_array['first_registration_time_start'],
            'first_registration_time_end' => $search_array['first_registration_time_end'],
            'last_registration_time_start' => $search_array['last_registration_time_start'],
            'last_registration_time_end' => $search_array['last_registration_time_end']
        );
        $this->session->set_userdata($search_array);
        
        $this->db->like('mac', $search_array['mac']);
        $this->db->like('state', $search_array['state']);
        $this->db->like('ipAddress', $search_array['ip_address']);
        $this->db->like('firmwareVersion', $search_array['firmware_version']);
        $this->db->like('ipLocation', $search_array['ip_location']);
        $this->db->like('contentVersion', $search_array['content_version']);
        
        if($search_array['first_registration_time_start']){
            $this->db->where('firstRegistrationTime >', $search_array['first_registration_time_start']);
        }
        if($search_array['first_registration_time_end']){
            $this->db->where('firstRegistrationTime <', $search_array['first_registration_time_end']);
        }
        if($search_array['last_registration_time_start']){
            $this->db->where('lastRegistrationTime >', $search_array['last_registration_time_start']);
        }
        if($search_array['last_registration_time_end']){
            $this->db->where('lastRegistrationTime <', $search_array['last_registration_time_end']);
        }
        
        return $this->db->get_compiled_select('info_lteinfo');  
        
    }
    
    public function search_nums(){
        $sql = $this->search_sql_prepare();
        
        return $this->db->query($sql);
    }
    
    public function search($offset, $pagesize){
        $sql = $this->search_sql_prepare()." limit $offset,$pagesize";

        return $this->db->query($sql);
    }
    
    public function order($macs){
        $sql = "insert into macs_order ";
        $array_length = count($macs);
        for($i = 0; $i < $array_length-1; $i++){
            $sql .= "select '".$macs[$i]."', '".$macs[$array_length-1]."' union all ";
        }
        $sql = substr($sql, 0, -11);
        return $this->db->query($sql);  
    }
}