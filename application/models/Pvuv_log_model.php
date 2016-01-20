<?php
class Pvuv_log_model extends CI_Model {

    public function __construct()
    {
       
    }
    
    public function handle()
    {
        
        $flag = 0;
        $num=0;    //用来记录目录下的文件个数
        $dirname='D:\nginx\test'; //要遍历的目录名字
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
                
//                if($this->db->query("SELECT * from `pvuv-log` WHERE device_mac = '{$device_mac}' AND time like '%{$timeForLog}%'"))
//                {
//                    continue;
//                }
                $file_contents_array = file($dirFile);
                $per_num = 0;
                
                while(!empty($file_contents_array[$per_num]))
                {
                    
                    $file_content_per_array = json_decode($file_contents_array[$per_num],true);
//                    if(property_exists($file_content_per_array,"remote_addr") && property_exists($file_content_per_array,"remote_mac") && property_exists($file_content_per_array,"time_iso8601") && property_exists($file_content_per_array,"request_method") && property_exists($file_content_per_array,"uri") && property_exists($file_content_per_array,"server_protocol") && property_exists($file_content_per_array,"status") && property_exists($file_content_per_array,"body_bytes_sent") && property_exists($file_content_per_array,"http_user_agent") && property_exists($file_content_per_array,"host") && property_exists($file_content_per_array,"request_filename"))
//                    {
                        
                        
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
                        //if($this->db->query("SELECT * from `pvuv-log` WHERE device_mac = $device_mac AND time like '%{$}%'"))
                        //判断需要加入规则匹配request_filename
                        if(isset($remote_mac) && $file_content_per_array['host'] === '192.168.0.1')
                        {
                            $sql = "INSERT INTO `pvuv-log` (device_mac,remote_ip,remote_mac,time,time_local,request,url,protocol,status,body_bytes_sent,http_user_agent) values ('{$device_mac}','{$remote_ip}','{$remote_mac}','{$time}','{$time_local}','{$request}','{$url}','{$protocol}','{$status}','{$body_bytes_sent}','{$http_user_agent}')";
                        
                            
                        }
//                    }
                    if(!$this->db->query($sql))
                    {
                        $flag = 1;
                    }
                    $per_num += 1;                    
                }
                //fclose($dirFile);
            }
        }
        //closedir($dirname);
        return $flag;
    }
}