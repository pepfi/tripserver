<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//added by pepfiwireless@163.com 2015-12-17

class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
//        $this->load->library('session');
//        $this->load->helper('url');        
//        $this->load->helper('form');
//        $this->load->library('form_validation');
        $this->load->model('admin_model');
        $data['home_nav_class'] = "";
        $data['device_nav_class'] = "";
        $data['pvuv_nav_class'] = "";
        $data['movie_nav_class'] = "";
        $data['user_nav_class'] = '';
        $data['log_nav_class'] = '';
        $this->load->vars($data);
    }
    

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = 'login';
        $data['error'] = '';
        $this->load->view('admin/login_form', $data);
	}
    
    function validate_credentials()
    {
        $this->load->model('admin_model');
        $this->session->set_userdata('res',$this->admin_model->validate());
        $this->session->set_userdata('username',$this->input->post('username'));
        if (!$_SESSION['res']) {
            $data['error'] = 'Invalid Username or Password';
            $this->load->view('admin/login_form', $data);        
        }
        else {
            redirect('home/index');
        }
    }
    
    public function list_admin(){
        $data['userslist'] = $this->admin_model->list_admin();
        $this->load->view('admin/header');        
        $this->load->view('admin/list_admin', $data);        
        $this->load->view('admin/footer');
    }
    public function add_admin(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
//        $this->form_validation->set_rules('blocked', 'Blocked', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = '';
            $this->load->view('admin/header');
            $this->load->view('admin/add_admin', $data);
            $this->load->view('admin/footer');
        }else {
            $data['admininfo'] = array('firstname' => 'Tom',
                                       'lastname' => 'John', 
                                       'username' => $this->input->post('username'),
                                       'password' => md5($this->input->post('password')),
                                       'email' => $this->input->post('email'),
                                       'role' => $this->input->post('role'),
                                       'language' => 'english',
                                       'blocked' => ($this->input->post('blocked')=='')?'1':'0',);
            if (!$this->admin_model->validate_admin($data['admininfo']['username'])){
                $res = $this->admin_model->add_admin($data['admininfo']);
                if ($res) {
                    redirect('admin/list_admin');
                }
                else {
                    echo "添加失败，请检查数据表字段";
                }
            }
            else {
            $data['error'] = "账号".$this->input->post('username')."已经存在！";
            $this->load->view('admin/header');
            $this->load->view('admin/add_admin', $data);
            $this->load->view('admin/footer');            
            }
        }
    }
    public function del_admin(){
        $res = $this->admin_model->del_admin();        
        if ($res) {
            redirect('admin/list_admin');
        }
        else {
            echo "删除失败";
        }
    }
    public function modify_admin(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
//        $this->form_validation->set_rules('blocked', 'Blocked', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['modify_info'] = $this->admin_model->modify_admin_getdata();
            $this->load->view('admin/header');
            $this->load->view('admin/modify_admin', $data);
            $this->load->view('admin/footer');
        }else { 
                $res= $this->admin_model->modify_admin_updatedata();
                if ($res) {
                    redirect('admin/list_admin');
                }
                else {
                    echo "修改失败";
                }

        }       
    }
    
    public function logout(){
        $this->session->sess_destroy();
        $data['error'] = '';
        $this->load->view('admin/login_form', $data);
    }
}
