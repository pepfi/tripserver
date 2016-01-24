<?php
class Device extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
//        $this->load->helper('url');
//        $this->load->library('session');
        $this->load->model('device_model');
        $this->load->library('pagination');
    }
    
    //get the nums of device
    public function device_nums(){
        return $this->device_model->device_nums();
    }
    
    //per page shows nums given    
    public function nums_per_page(){        
        if($this->uri->segment(4)){
            switch($this->uri->segment(4)){
                case 3:
                    $this->session->set_userdata('pageSize',3);
                    break;
                case 6:
                    $this->session->set_userdata('pageSize',6);
                    break;
                case 9:
                    $this->session->set_userdata('pageSize',9);
                    break;
                case 12:
                    $this->session->set_userdata('pageSize',12);
            }        
        }        
    }
    
    //forbid illegal access
    public function illegal_access(){
        if($this->session->userdata('username') == null){
            redirect('admin/validate_credentials');
            exit;
        }        
    }
    
    //To construct the paging
    public function page($method, $device_nums){
        $config['base_url'] = base_url("/device/".$method."/");
        $config['total_rows'] = $device_nums;        
        if($this->session->userdata('pageSize')){//Url increasing span
            $config['per_page'] = $this->session->userdata('pageSize');    
        }else {
            $config['per_page'] = 6; //default nums per page       
        }        
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
        
        if($this->uri->segment(3) == 'per_page'){//offset of data start
            $offset = 0;
        }else {
            $offset = ($this->uri->segment(3) == null)?0:$this->uri->segment(3);
        }
        $pageSize = $config['per_page'];//the number of data each page 
        
        $this->session->set_userdata('offset', $offset);
        $this->session->set_userdata('final_pagesize', $pageSize);
        $this->load->vars($data);
    }
    
    public function index(){
        $this->illegal_access();
        $this->nums_per_page();
        if(!$this->session->userdata('device_nums')){//run one time
            $data['device_nums']= $this->device_model->device_nums();
            $this->session->set_userdata('device_nums', $data['device_nums']);
        }
        else{//run from second time
            $data['device_nums'] = $this->session->userdata('device_nums');
        }
        $this->page("index", $data['device_nums']);
 
        $data['home_nav_class'] = "";
        $data['device_nav_class'] = "class='active'";
        $data['user_nav_class'] = '';
        $data['log_nav_class'] = '';
        $data['pvuv_nav_class'] = '';
        $data['movie_nav_class'] = '';
        
        $data['deviceinfo'] = $this->device_model->deviceinfo($this->session->userdata('offset'), $this->session->userdata('final_pagesize'));
  
        $data['controller'] = 'device';
        $data['method'] = "index";//for link
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/device', $data);
        $this->load->view('admin/footer');        
    }
    
    public function search(){
        $data['home_nav_class'] = "";
        $data['device_nav_class'] = "class='active'";
        $data['user_nav_class'] = '';
        $data['log_nav_class'] = '';
        
        $this->nums_per_page();
        $data['search_nums'] = $this->device_model->search_nums()->num_rows();
        $this->page('search', $data['search_nums']);
        $data['device_nums'] = $data['search_nums'];
        
        $data['deviceinfo'] = $this->device_model->search($this->session->userdata('offset'), $this->session->userdata('final_pagesize'));

        $data['controller'] = 'device';        
        $data['method'] = "search";//for link
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/device', $data);
        $this->load->view('admin/footer');         
    }
    
    public function order(){
        $Macs_order_string = $this->uri->segment(3);
        $Macs_order = explode('_', $Macs_order_string);
        $order = $Macs_order[count($Macs_order)-1];
        $order = str_replace('%20', ' ', $order);
        $Macs_order[count($Macs_order)-1] = $order;
//        if($this->device_model->order($Macs_order)){
//             $url = $_SERVER['HTTP_REFERER']; 
//             echo "<scrīpt type='text/javascript'>"; 
//             echo "window.location='".$url."'"; 
//             echo "</scrīpt>";
//        }
        if($this->device_model->order($Macs_order)){
            echo "下发命令成功";
        }
    }
        
}