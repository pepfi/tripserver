<?php
class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }
    public function index(){
        if($this->session->userdata('username') == null){
            redirect('admin/validate_credentials');
            exit;
        }
        $data['home_nav_class'] = "class='active'";
        $data['device_nav_class'] = '';
        $data['user_nav_class'] = '';
        $data['log_nav_class'] = '';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/home');
        $this->load->view('admin/footer');     
    }
}