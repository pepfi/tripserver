<?php
class ReadLogToDB_model extends CI_Model {
    
    //added by pepfiwireless@163.com 2016-01-23 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
    }
    
    public function handle()
    {
        
        $flag = 0;
        $num=0;    //用来记录目录下的文件个数
        $dir =  "D:\d\log";
        $dirname = $dir."\\"; //要遍历的目录名字
        echo "dirname is:$dirname:end";
        
        $today = date("Y-m-d",time());
        $yestoday =  date("Y-m-d",strtotime("-1 day"));
        //echo $yestoday;
        
        if (is_dir($dirname)) 
        {
            if ($dh = opendir($dirname))
            {
                while (($file = readdir($dh)) !== false)
                {
                    //echo "filename: $file : filetype: " . filetype($dirname . $file) . "\n";
                    //echo strlen($file);
                    
                    if(strlen($file) > 42)
                    {
                            $num += 1;
                            $dirFile=$dirname.$file;
                            $device_mac = substr($file,9,17);
                            $timeForLog = substr($file,31,10);                            

                            if( $timeForLog != $yestoday)
                            {
                                echo "!!!!=====";
                                //continue;  //only read yestoday data
                            }
                            $file_contents_array = file($dirFile);
                            $per_num = 0;

                            //echo "dirfile:$dirFile device_mac:$device_mac timeForLog:$timeForLog";
                            //while(!empty($file_contents_array[$per_num]))
                            foreach($file_contents_array as $line => $content)
                            {
                                //$file_content_per_array = json_decode($file_contents_array[$per_num],true);
                                $file_content_per_array = json_decode($content,true);
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
                                
                                //echo "remoteip: $remote_ip";
                                //echo "$remote_ip:A$remote_mac:B$time_content:C$timeYmd:D$timeHms:E$time:F$time_local:G$request:H$url:I$protocol:J$status:K$body_bytes_sent:L$http_user_agent:M$host:N";
           
                                if(isset($remote_mac) && ($file_content_per_array['host'] === '192.168.0.1'))
                                {
                                    $sql = "INSERT INTO `pvuv-log` (device_mac,remote_ip,remote_mac,time,time_local,request,url,protocol,status,body_bytes_sent,http_user_agent) values ('{$device_mac}','{$remote_ip}','{$remote_mac}','{$time}','{$time_local}','{$request}','{$url}','{$protocol}','{$status}','{$body_bytes_sent}','{$http_user_agent}')";
                                    //echo "make sql";
                                    if(!$this->db->query($sql))
                                    {
                                        $flag = 1;
                                        echo "insert errot";
                                        continue;
                                    }
                                }
                                $per_num += 1;   
                                //echo "per_num: $per_num";
                                //break; //onefile every line
                            }
                        
                            //fclose($file_handle);
                        //break; //every file
                    } //if filename > length
                    
                }// while readdir
                        
                closedir($dh);
            } //if opendir 
        }
    
        return $flag;
    }
}