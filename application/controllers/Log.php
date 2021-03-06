<?php
class Log extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }
    public function index(){
        if($this->session->userdata('username') == null){
            redirect('admin/validate_credentials');
            exit;
        }
        $data['home_nav_class'] = "";
        $data['device_nav_class'] = "";
        $data['user_nav_class'] = '';
        $data['pvuv_nav_class'] = '';
        $data['movie_nav_class'] = '';
        $data['log_nav_class'] = "class='active'";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/log');
        $this->load->view('admin/footer');
    }
    
}