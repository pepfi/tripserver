<?php
class Pvuv_device extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('pvuv_device_model');
    }
    
    public function index()
    {
        
        $flag = $this->pvuv_device_model->handle();
        echo $flag;
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