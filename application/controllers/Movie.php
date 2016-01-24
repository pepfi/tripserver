<?php
class Movie extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('movie_model');
        
    }
    
    function movie_name(){
        $data['movie_0_name'] = "我是传奇";
        $data['movie_1_name'] = "夏洛特烦恼";
        $data['movie_2_name'] = "心花路放";
        $data['movie_3_name'] = "大话天仙";
        $data['movie_4_name'] = "少女与狼";
        $this->load->vars($data);
    }
    
    function movie_init(){
        for($i = 0; $i < 30; $i++){
            $data["movie_".$i."_pv_six_days_ago"] = 0;
            $data["movie_".$i."_pv_five_days_ago"] = 0;
            $data["movie_".$i."_pv_four_days_ago"] = 0;
            $data["movie_".$i."_pv_three_days_ago"] = 0;
            $data["movie_".$i."_pv_two_days_ago"] = 0;
            $data["movie_".$i."_pv_yesterday"] = 0;
            $data["movie_".$i."_pv_today"] = 0;
        }
        $this->load->vars($data);
    }
    
    function movie_result($movie_name, $movie_time, $movie_times){
        switch($movie_name){
            case "我是传奇":
                $data['movie_0_pv'.$movie_time] = $movie_times;
                break;
            case "夏洛特烦恼":
                $data['movie_1_pv'.$movie_time] = $movie_times;
                break;
            case "心花路放":
                $data['movie_2_pv'.$movie_time] = $movie_times;
                break;
            case "大话天仙":
                $data['movie_3_pv'.$movie_time] = $movie_times;
                break;
            case "少女与狼":
                $data['movie_4_pv'.$movie_time] = $movie_times;
                break;
            case "我是谁":
                $data['movie_5_pv'.$movie_time] = $movie_times;
                break;
            case "一个好人":
                $data['movie_6_pv'.$movie_time] = $movie_times;
                break;
            default:
                echo "错误";
            break;
        }
        $this->load->vars($data);
    } 
    
    function movie_time($movie_name, $movie_time, $movie_times){
        switch($movie_time){
            case date('Y-m-d', strtotime('-6 day')):
                $this->movie_result($movie_name, "_six_days_ago", $movie_times);
                break;
            case date('Y-m-d', strtotime('-5 day')):
                $this->movie_result($movie_name, "_five_days_ago", $movie_times);
                break;
            case date('Y-m-d', strtotime('-4 day')):
                $this->movie_result($movie_name, "_four_days_ago", $movie_times);
                break;
            case date('Y-m-d', strtotime('-3 day')):
                $this->movie_result($movie_name, "_three_days_ago", $movie_times);
                break;
            case date('Y-m-d', strtotime('-2 day')):
                $this->movie_result($movie_name, "_two_days_ago", $movie_times);
                break;
            case date('Y-m-d', strtotime('-1 day')):
                $this->movie_result($movie_name, "_yesterday", $movie_times);
                break;
            case date('Y-m-d', time()):
                $this->movie_result($movie_name, "_today", $movie_times);
                break;
            default:
                echo "错误";
        }
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
        
        $data['movie_info'] = $this->movie_model->get_movies();
        
        $this->movie_init();
        $this->movie_name();
        
        date_default_timezone_set('PRC'); 
        foreach($data['movie_info'] as $num){
            $this->movie_time($num['movie_name'], $num['time'], $num['movie_play_times']);
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/movie', $data);
        $this->load->view('admin/footer');        
    }
}