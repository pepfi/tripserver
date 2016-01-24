<?php
header("content-type:text/html; charset=utf-8");
class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('home_model');
    }
    
    function getProvince($ip_query_result) {
        return mb_substr($ip_query_result,3,2,'utf-8');
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
        $data['pvuv_nav_class'] = '';
        $data['movie_nav_class'] = '';
        
        $data['region_status'] = $this->home_model->get_region_status();
        $data['province'] = array(array('dev' => 0, 'online' => 0, 'name' => '北京'),
                                 array('dev' => 0, 'online' => 0, 'name' => '天津'),
                                 array('dev' => 0, 'online' => 0, 'name' => '河北'),
                                 array('dev' => 0, 'online' => 0, 'name' => '山西'),
                                 array('dev' => 0, 'online' => 0, 'name' => '内蒙古'),
                                 array('dev' => 0, 'online' => 0, 'name' => '辽宁'),
                                 array('dev' => 0, 'online' => 0, 'name' => '吉林'),
                                 array('dev' => 0, 'online' => 0, 'name' => '黑龙江'),
                                 array('dev' => 0, 'online' => 0, 'name' => '上海'),
                                 array('dev' => 0, 'online' => 0, 'name' => '江苏'),
                                 array('dev' => 0, 'online' => 0, 'name' => '浙江'),
                                 array('dev' => 0, 'online' => 0, 'name' => '安徽'),
                                 array('dev' => 0, 'online' => 0, 'name' => '福建'),
                                 array('dev' => 0, 'online' => 0, 'name' => '江西'),
                                 array('dev' => 0, 'online' => 0, 'name' => '山东'),
                                 array('dev' => 0, 'online' => 0, 'name' => '河南'),
                                 array('dev' => 0, 'online' => 0, 'name' => '湖北'),
                                 array('dev' => 0, 'online' => 0, 'name' => '湖南'),
                                 array('dev' => 0, 'online' => 0, 'name' => '广东'),
                                 array('dev' => 0, 'online' => 0, 'name' => '广西'),
                                 array('dev' => 0, 'online' => 0, 'name' => '海南'),
                                 array('dev' => 0, 'online' => 0, 'name' => '重庆'),
                                 array('dev' => 0, 'online' => 0, 'name' => '四川'),
                                 array('dev' => 0, 'online' => 0, 'name' => '贵州'),
                                 array('dev' => 0, 'online' => 0, 'name' => '云南'),
                                 array('dev' => 0, 'online' => 0, 'name' => '西藏'),
                                 array('dev' => 0, 'online' => 0, 'name' => '陕西'),
                                 array('dev' => 0, 'online' => 0, 'name' => '甘肃'),
                                 array('dev' => 0, 'online' => 0, 'name' => '青海'),
                                 array('dev' => 0, 'online' => 0, 'name' => '宁夏'),
                                 array('dev' => 0, 'online' => 0, 'name' => '新疆'),
                                 array('dev' => 0, 'online' => 0, 'name' => '台湾'),
                                 array('dev' => 0, 'online' => 0, 'name' => '香港'),
                                 array('dev' => 0, 'online' => 0, 'name' => '澳门')
                                 );
        foreach($data['region_status'] as $value)
        {
            
            $province = $this->getProvince($value['ipLocation']); 
            switch ($province) {
                
                case '北京':
                    $data['province'][0]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][0]['online'] += 1; 
                     } 
                    break;
                case '天津':
                    $data['province'][1]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][1]['online'] += 1; 
                     } 
                    break;
                case '河北':
                    $data['province'][2]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][2]['online'] += 1; 
                     }                                           
                    break;
                case '山西':
                    $data['province'][3]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][3]['online'] += 1; 
                     }                                             
                    break;
                case '内蒙':
                    $data['province'][4]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][4]['online'] += 1; 
                     }                                            
                    break;
                    
                case '辽宁':
                    $data['province'][5]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][5]['online'] += 1; 
                     }                                             
                    break;
                case '吉林':
                    $data['province'][6]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][6]['online'] += 1; 
                     }                                             
                    break;
                case '黑龙':
                    $data['province'][7]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][7]['online'] += 1; 
                     }                                              
                    break;
                case '上海':
                    $data['province'][8]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][8]['online'] += 1; 
                     }                                              
                    break;
                case '江苏':
                    $data['province'][9]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][9]['online'] += 1; 
                     }                                             
                    break;
                    
                case '浙江':
                    $data['province'][10]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][10]['online'] += 1; 
                     }                                             
                    break;
                case '安徽':
                    $data['province'][11]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][11]['online'] += 1; 
                     }                                            
                    break;
                case '福建':
                    $data['province'][12]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][12]['online'] += 1; 
                     }                                            
                    break;
                case '江西':
                    $data['province'][13]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][13]['online'] += 1; 
                     }                                             
                    break;
                case '山东':
                   ///
                    $data['province'][14]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][14]['online'] += 1; 
                     } 
                    break;
                    
                case '河南':
                    $data['province'][15]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][15]['online'] += 1; 
                     }                                             
                    break;
                case '湖北':
                    $data['province'][16]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][16]['online'] += 1; 
                     }                                            
                    break;
                case '湖南':
                    $data['province'][17]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][17]['online'] += 1; 
                     }                                            
                    break;
                case '广东':
                    $data['province'][18]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][18]['online'] += 1; 
                     }                                             
                    break;
                case '广西':
                    $data['province'][19]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][19]['online'] += 1; 
                     }                                             
                    break;
                    
                case '海南':
                    $data['province'][20]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][20]['online'] += 1; 
                     }                                            
                    break;
                case '重庆':
                    $data['province'][21]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][21]['online'] += 1; 
                     }                                             
                    break;
                case '四川':
                    $data['province'][22]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][22]['online'] += 1; 
                     }                                             
                    break;
                case '贵州':
                    $data['province'][23]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][23]['online'] += 1; 
                     }                                             
                    break;
                case '云南':
                    $data['province'][24]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][24]['online'] += 1; 
                     }                                             
                    break;
                    
                case '西藏':
                    $data['province'][25]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][25]['online'] += 1; 
                     }                                             
                    break;
                case '陕西':
                    $data['province'][26]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][26]['online'] += 1; 
                     }                                            
                    break;
                case '甘肃':
                    $data['province'][27]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][27]['online'] += 1; 
                     }                                              
                    break;
                case '青海':
                    $data['province'][28]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][28]['online'] += 1; 
                     }                                             
                    break;
                    
                case '宁夏':
                    $data['province'][29]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province']['online'] += 1; 
                     }                                             
                    break;
                case '新疆':
                    $data['province'][30]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][30]['online'] += 1; 
                     }                                             
                    break;
                case '台湾':
                    $data['province'][31]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][31]['online'] += 1; 
                     }                                             
                    break;
                case '香港':
                    $data['province'][32]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][32]['online'] += 1; 
                     }                                             
                    break;
                case '澳门':
                    $data['province'][33]['dev'] += 1;
                     if ($value['state'] == 1) {
                        $data['province'][33]['online'] += 1; 
                     }                                             
                    break;
                default:
                    break;
            }
        }
        
        $data['dev_account'] = 0;
        for ($i = 0; $i < 34; $i++) {
            $data['dev_account'] = $data['dev_account'] + $data['province'][$i]['online'];
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/home');
        $this->load->view('admin/footer');     
    }
}