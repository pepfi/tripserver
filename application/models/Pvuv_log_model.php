<?php
class Pvuv_log_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
    }
    
    public function handle()
    {
        
        $flag = 0;
        $num=0;    //用来记录目录下的文件个数
        $dirname='D:\d\log'; //要遍历的目录名字
        $dir_handle=opendir($dirname);
        
        //file 按行读取
        while($file=readdir($dir_handle))
        {
            
            if($file!="."&&$file!="..")
            {
                $num += 1;
                $dirFile=$dirname."/".$file;
                $file_handle = fopen($dirFile,"r");
                $device_mac = substr($file,9,17);
                $timeForLog = substr($file,31,10);                            
                $file_contents_array = file($dirFile);
                $per_num = 0;
                while(!empty($file_contents_array[$per_num]))
                {
                    $file_content_per_array = json_decode($file_contents_array[$per_num],true);
                    $remote_ip = $file_content_per_array['remote_addr'];
                    $remote_mac = $file_content_per_array['remote_mac'];
                    $time_content = $file_content_per_array['time_iso8601'];
                    $timeYmd = substr($time_content,0,10);
                    $timeHms = substr($time_content,-14,8);
                    $time = $timeYmd.' '.$timeHms;
                    $time_local = substr($time_content,-5,2).substr($time_content,-2,2);
                    $request = $file_content_per_array['request_method'];
                    $url = $file_content_per_array['uri'];
                    $protocol = $file_content_per_array['server_protocol'];
                    $status = $file_content_per_array['status'];
                    $body_bytes_sent = $file_content_per_array['body_bytes_sent'];
                    $http_user_agent = $file_content_per_array['http_user_agent'];
                    $host = $file_content_per_array['host'];
                    if(isset($remote_mac) && $file_content_per_array['host'] === '192.168.0.1')
                    {
                        $sql = "INSERT INTO `pvuv-log` (device_mac,remote_ip,remote_mac,time,time_local,request,url,protocol,status,body_bytes_sent,http_user_agent) values ('{$device_mac}','{$remote_ip}','{$remote_mac}','{$time}','{$time_local}','{$request}','{$url}','{$protocol}','{$status}','{$body_bytes_sent}','{$http_user_agent}')";
                    }
                    if(!$this->db->query($sql))
                    {
                        $flag = 1;
                    }
                    $per_num += 1;                    
                }
            }
        }
        //closedir($dirname);
        return $flag;
    }
}