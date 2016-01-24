<?php
class Movie extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('movie_model');
    }

    public function index(){
        if($this->session->userdata('username') == null){
            redirect('admin/validate_credentials');
            exit;
        }
        $data['home_nav_class'] = "";
        $data['device_nav_class'] = '';
        $data['user_nav_class'] = '';
        $data['log_nav_class'] = '';
        $data['pvuv_nav_class'] = '';
        $data['movie_nav_class'] = "class='active'";
        
        date_default_timezone_set('PRC');
        $data['six_days_ago'] = "'".date('y-m-d', strtotime('-6 day'))."'";
        $data['five_days_ago'] = "'".date('y-m-d', strtotime('-5 day'))."'";
        $data['four_days_ago'] = "'".date('y-m-d', strtotime('-4 day'))."'";
        $data['three_days_ago'] = "'".date('y-m-d', strtotime('-3 day'))."'";
        $data['two_days_ago'] = "'".date('y-m-d', strtotime('-2 day'))."'";
        $data['yesterday'] = "'".date('y-m-d', strtotime('-1 day'))."'";
        $data['today'] = "'".date('y-m-d', time())."'"; 
        
        $data['movie_0_name'] = "心花路放0";
        $data['movie_1_name'] = "白发魔女传0";
        $data['movie_2_name'] = "铁血娇娃0";
        $data['movie_3_name'] = "惊天魔盗团0";
        $data['movie_4_name'] = "大话天仙0";
        $data['movie_5_name'] = "心花路放1";
        $data['movie_6_name'] = "白发魔女传1";
        $data['movie_7_name'] = "铁血娇娃1";
        $data['movie_8_name'] = "惊天魔盗团1";
        $data['movie_9_name'] = "大话天仙1";
        $data['movie_10_name'] = "心花路放2";
        $data['movie_11_name'] = "白发魔女传2";
        $data['movie_12_name'] = "铁血娇娃2";
        $data['movie_13_name'] = "惊天魔盗团2";
        $data['movie_14_name'] = "大话天仙2"; 
        $data['movie_15_name'] = "心花路放3";
        $data['movie_16_name'] = "白发魔女传3";
        $data['movie_17_name'] = "铁血娇娃3";
        $data['movie_18_name'] = "惊天魔盗团3";
        $data['movie_19_name'] = "大话天仙3"; 
        $data['movie_20_name'] = "心花路放4";
        $data['movie_21_name'] = "白发魔女传4";
        $data['movie_22_name'] = "铁血娇娃4";
        $data['movie_23_name'] = "惊天魔盗团4";
        $data['movie_24_name'] = "大话天仙4";
        $data['movie_25_name'] = "心花路放5";
        $data['movie_26_name'] = "白发魔女传5";
        $data['movie_27_name'] = "铁血娇娃5";
        $data['movie_28_name'] = "惊天魔盗团5";
        $data['movie_29_name'] = "大话天仙5";
        
        for($i = 0; $i < 30; $i++){
            $i = (string)$i;
            $data['movie_'.$i.'_pv']['six_days_ago'] = "1";
            $data['movie_'.$i.'_pv']['five_days_ago'] = "1";
            $data['movie_'.$i.'_pv']['four_days_ago'] = "1";
            $data['movie_'.$i.'_pv']['three_days_ago'] = "1";
            $data['movie_'.$i.'_pv']['two_days_ago'] = "1";
            $data['movie_'.$i.'_pv']['yesterday'] = "1";
            $data['movie_'.$i.'_pv']['today'] = "1";
        }

//        $data['movie_0_pv']['six_days_ago'] = "1";
//        $data['movie_0_pv']['five_days_ago'] = "1";
//        $data['movie_0_pv']['four_days_ago'] = "1";
//        $data['movie_0_pv']['three_days_ago'] = "1";
//        $data['movie_0_pv']['two_days_ago'] = "1";
//        $data['movie_0_pv']['yesterday'] = "1";
//        $data['movie_0_pv']['today'] = "1";
        
//        $data['movie_1_pv']['six_days_ago'] = "1";
//        $data['movie_1_pv']['five_days_ago'] = "1";
//        $data['movie_1_pv']['four_days_ago'] = "1";
//        $data['movie_1_pv']['three_days_ago'] = "1";
//        $data['movie_1_pv']['two_days_ago'] = "1";
//        $data['movie_1_pv']['yesterday'] = "1";
//        $data['movie_1_pv']['today'] = "1";
//        
//        $data['movie_2_pv']['six_days_ago'] = "1";
//        $data['movie_2_pv']['five_days_ago'] = "1";
//        $data['movie_2_pv']['four_days_ago'] = "1";
//        $data['movie_2_pv']['three_days_ago'] = "1";
//        $data['movie_2_pv']['two_days_ago'] = "1";
//        $data['movie_2_pv']['yesterday'] = "1";
//        $data['movie_2_pv']['today'] = "1"; 
//        
//        $data['movie_3_pv']['six_days_ago'] = "1";
//        $data['movie_3_pv']['five_days_ago'] = "1";
//        $data['movie_3_pv']['four_days_ago'] = "1";
//        $data['movie_3_pv']['three_days_ago'] = "1";
//        $data['movie_3_pv']['two_days_ago'] = "1";
//        $data['movie_3_pv']['yesterday'] = "1";
//        $data['movie_3_pv']['today'] = "1"; 
//        
//        $data['movie_4_pv']['six_days_ago'] = "1";
//        $data['movie_4_pv']['five_days_ago'] = "1";
//        $data['movie_4_pv']['four_days_ago'] = "1";
//        $data['movie_4_pv']['three_days_ago'] = "1";
//        $data['movie_4_pv']['two_days_ago'] = "1";
//        $data['movie_4_pv']['yesterday'] = "1";
//        $data['movie_4_pv']['today'] = "1";     
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/movie', $data);
        $this->load->view('admin/footer');         
    }
}