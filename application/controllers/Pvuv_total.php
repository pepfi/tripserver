<?php
class Pvuv_total extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('pvuv_total_model');
    }
    
    public function index()
    {
        
        $flag = $this->pvuv_total_model->handle();
        if($flag)
        {
            echo "导入失败";
        }
        else
        {
            echo "导入成功";
        }
    }
}