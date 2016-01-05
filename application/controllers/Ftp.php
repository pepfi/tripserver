<?php 
class Ftp extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('ftp');
    }

    public function index(){
        $config['hostname'] = 'ftp.example.com';
        $config['username'] = 'your-username';
        $config['password'] = 'your-password';
        $config['debug']    = TRUE;
        
        $this->ftp->connect($config);
        
        $this->ftp->upload('/local/path/to/myfile.html', '/public_html/myfile.html', 'ascii', 0775);
        
        $this->ftp->close();
    }
}