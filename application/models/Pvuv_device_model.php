<?php
class Pvuv_device_model extends CI_Model {

    public function __construct()
    {
       
    }
    
    public function handle()
    {
        //测试时间，实际timeSelect需要前端传入
        //$timeSelect = date("Y-m-d",strtotime("-3 day"));
        //return $timeSelect;
       // $deviceMacArray = array();
        
        $timeFlag = date("Y-m-d",strtotime("-1 day"));
        $sqlForDeviceMac = "SELECT device_mac from `pvuv-log` group by device_mac";
        $deviceMacArray = $this->db->query($sqlForDeviceMac)->result();
        //return $deviceMacArray;
       //判断  mac
        $deviceMacNum = count($deviceMacArray);
        for($i = 0 ;$i < $deviceMacNum;$i++)
        {
            $sql = "SELECT count('{$deviceMacArray[$i]->device_mac}') FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59'";
           // return $sql;
            $targetMac = $deviceMacArray[$i]->device_mac;
            //return $targetMac;
            $pv = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}'")->num_rows();
            //14
            $download_app_times = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '2016-01-15 00:00:00' AND '2016-1-15 23:59:59' AND device_mac = '{$targetMac}' AND url like '%download%'")->num_rows();
            $uv = $this->db->query("SELECT remote_mac from `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' group by remote_mac")->num_rows();
            //return $uv;
            //11
            $uv_android = $this->db->query("SELECT remote_mac from `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND http_user_agent like '%android%' AND device_mac = '{$targetMac}' group by remote_mac")->num_rows();
            //return $uv_android_12;
            //12
            $uv_unknow = $this->db->query("SELECT remote_mac from `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND http_user_agent like'%unknow%' AND device_mac = '{$targetMac}' group by remote_mac")->num_rows();
            //return $uv_unknow_12;
            //1
            $uv_ios = $this->db->query("SELECT remote_mac from `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND http_user_agent like '%ios%' AND device_mac = '{$targetMac}' group by remote_mac")->num_rows();
            
            //2
            $uv_windows = $this->db->query("SELECT remote_mac from `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND http_user_agent like '%windows%' AND device_mac = '{$targetMac}' group by remote_mac")->num_rows();
            //return $uv_windows;
            $query = $this->db->query("INSERT INTO `pvuv-device` (device_mac,time,pv,download_app_times,uv,uv_android,uv_ios,uv_windows,uv_others) VALUES ('{$targetMac}','{$timeFlag}','{$pv}','{$download_app_times}','{$uv}','{$uv_android}','{$uv_ios}','{$uv_windows}','{$uv_unknow}')");
            
        }    
//        $device_mac_array = $this->db->query("SELECT device_mac from `pvuv-log` WHERE time like '%{$time_latest}%'")->num_rows();
//        return $device_mac_array;
//        $pv_count = $this->db->query("SELECT count(1) from `pvuv-log` WHERE time like '%{$time_latest}%' AND mac=");
    }
}