<?php
class Admin_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function validate()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $this->db->where('blocked', "0");
        $query = $this->db->get('admin');
        if ($query->num_rows())
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }
    public function validate_admin($username){
        $this->db->where('username', $username);
        $query = $this->db->get('admin');
        if ($query->num_rows())
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }
    public function add_admin($data){
        return $this->db->insert('admin', $data);
    }
    public function list_admin(){
        $sql = "select id,username,email,role,blocked from admin";
        return $this->db->query($sql);
    }
    public function del_admin(){        
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        return $this->db->delete('admin');
    }
    public function modify_admin_getdata(){  
        if ($this->uri->segment(3)) {
            $id = $this->uri->segment(3);
            $this->session->set_userdata('id', $this->uri->segment(3));
        }
        else {
            $id = $_SESSION['id'];
        }
        $sql = "select * from admin where id='{$id}'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    public function modify_admin_updatedata(){
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $blocked = ($this->input->post('blocked') == null)?1:0;
        $sql = "update admin set username='{$username}',email='{$email}',role='{$role}',blocked='{$blocked}' where id='{$id}'";
        return $this->db->query($sql);
    }    
}