<?php
class Test extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function from(){
        $data['name'] = 'wmg';
        $this->load->vars($data);
    }
    public function come(){
        $this->from();
        //echo $name;
    }
}