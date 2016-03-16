<?php
class Scanap extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("scanap_model");
        $this->load->library('pagination');
    }
    
    public function register(){

        $jsonString = file_get_contents("php://input", 'r');
        $jsonArray = json_decode($jsonString, true);
       
       // print_r($jsonArray);
        
        date_default_timezone_set('PRC');
        $jsonArray['time'] = date('Y-m-d H:i:s', time()); 
        
       $this->scanap_model->register($jsonArray);
                
    }

    
    public function page(){
        $config['base_url'] = base_url('/scanap/index/');;
        $config['total_rows'] = $this->scanap_model->info_nums();
        $config['per_page'] = 5;
        $config['first_link'] = '首页';        
        $config['last_link'] = '尾页';
        $config['prev_link'] = '上一页'; 
        $config['next_link'] = '下一页';
        $config['cur_tag_open'] = "<div style='display:block;width:20px;height:20px;float:left;background:#337ab7;color:white;text-align:center'>";
        $config['cur_tag_close'] = '</div>';
        $config['num_tag_open'] = "<div style='display:block;width:20px;height:20px;float:left;text-align:center'>";
        $config['num_tag_close'] = '</div>';         
        $this->pagination->initialize($config);
        
        $data['page'] = $this->pagination->create_links();
        
        $offset = ($this->uri->segment(3) == null) ? 0 : $this->uri->segment(3);
        $pageSize = $config['per_page'];
        $data['ap_info'] = $this->scanap_model->ap_info($offset, $pageSize);
        $this->load->vars($data);
    }

    
    public function index(){
        $this->page();
        
        $this->load->view('admin/scanap');
    }    
}