<?php
class Pvuv_device_model extends CI_Model {

    public function __construct()
    {
       
    }
    
    public function handle()
    {  
        $flag = 0;
        $timeFlag = date("Y-m-d",strtotime("-6 day"));
        $sqlForDeviceMac = "SELECT device_mac from `pvuv-log` group by device_mac";
        $deviceMacArray = $this->db->query($sqlForDeviceMac)->result();
        //return $deviceMacArray;
       //判断  mac
        $deviceMacNum = count($deviceMacArray);
        
        for($i = 0 ;$i < $deviceMacNum;$i++)
        {
            $targetMac = $deviceMacArray[$i]->device_mac;
            $sql = "SELECT count('{$deviceMacArray[$i]->device_mac}') FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59'"; 
            
            //pv数量
            $pv = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%index.html%'")->num_rows();
            //下载次数
            $download_app_times = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '2016-1-15 23:59:59' AND device_mac = '{$targetMac}' AND url like '%donggao.apk%'")->num_rows();
            //用户数量
            $uv = $this->db->query("SELECT remote_mac from `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' group by remote_mac")->num_rows();
            //android用户数量
            $uv_android = $this->db->query("SELECT remote_mac from `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND http_user_agent like '%android%' AND device_mac = '{$targetMac}' group by remote_mac")->num_rows();
            //其他系统用户数量
            $uv_unknow = $this->db->query("SELECT remote_mac from `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND http_user_agent like'%unknow%' AND device_mac = '{$targetMac}' group by remote_mac")->num_rows();
            //苹果用户数量
            $uv_ios = $this->db->query("SELECT remote_mac from `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND http_user_agent like '%ios%' AND device_mac = '{$targetMac}' group by remote_mac")->num_rows();
            //windows用户数量
            $uv_windows = $this->db->query("SELECT remote_mac from `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND http_user_agent like '%windows%' AND device_mac = '{$targetMac}' group by remote_mac")->num_rows();
            if($this->db->query("SELECT * from `pvuv-device` WHERE time = '{$timeFlag}' AND device_mac = '{$targetMac}'")->num_rows())
            {
                $query_update = $this->db->query("UPDATE `pvuv-device` set pv = '{$pv}',download_app_times = '{$download_app_times}',uv = '{$uv}',uv_android = '{$uv_android}',uv_ios = '{$uv_ios}',uv_windows = '{$uv_windows}',uv_others = '{$uv_unknow}' WHERE device_mac = '{$targetMac}' AND time = '{$timeFlag}'");
                if(!$query_update)
                {
                    $flag = 1;
                    echo "UPDATE `pvuv-device` set pv = '{$pv}',download_app_times = '{$download_app_times}',uv = '{$uv}',uv_android = '{$uv_android}',uv_ios = '{$uv_ios}',uv_windows = '{$uv_windows}',uv_others = '{$uv_unknow}' WHERE device_mac = '{$targetMac}' AND time = '{$timeFlag}'";
                }
            }
            else
            {
                $query_device = $this->db->query("INSERT INTO `pvuv-device` (device_mac,time,pv,download_app_times,uv,uv_android,uv_ios,uv_windows,uv_others) VALUES ('{$targetMac}','{$timeFlag}','{$pv}','{$download_app_times}','{$uv}','{$uv_android}','{$uv_ios}','{$uv_windows}','{$uv_unknow}')"); 
                if(!$query_device)
                {
                    $flag = 1;
                    echo "INSERT INTO `pvuv-device` (device_mac,time,pv,download_app_times,uv,uv_android,uv_ios,uv_windows,uv_others) VALUES ('{$targetMac}','{$timeFlag}','{$pv}','{$download_app_times}','{$uv}','{$uv_android}','{$uv_ios}','{$uv_windows}','{$uv_unknow}')";
                } 
            }
        
        }
        return $flag;
    }
}