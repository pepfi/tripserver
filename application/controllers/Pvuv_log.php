<?php
class Pvuv_log extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('pvuv_log_model');
    }
    
    public function index()
    {
        
        $flag = $this->pvuv_log_model->handle();
        echo $flag;
       // var_dump($flag);
        
        
//        if($flag)
//        {
//            echo "导入失败";
//        }
//        else
//        {
//            echo "导入成功";
//        }
    }
}

//{"http_user_agent":"Microsoft NCSI","args":"-","is_args":"","body_bytes_sent":"9859","content_type":"-","host":"192.168.0.1","document_root":"/mnt/hd/website","document_uri":"/index.html","realpath_root":"/mnt/hd/zjhn/www","remote_mac":"00:24:d7:c2:7f:44","remote_addr":"192.168.0.12","remote_port":"61768","remote_user":"-","request_completion":"OK","request_filename":"/mnt/hd/website/index.html","request_method":"GET","request_uri":"/","scheme":"http","server_addr":"192.168.0.1","server_port":"80","server_protocol":"HTTP/1.1","status":"200","time_iso8601":"2016-01-20T16:28:39+08:00","uri":"/index.html"} 