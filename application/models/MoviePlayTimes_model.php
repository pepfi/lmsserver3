<?php
class MoviePlayTimes_model extends CI_Model {

    public function __construct()
    {
       
    }
    
    public function handle()
    {
        $flag = 0;
        $movieNameArray = array('how you see me','DREDD','夺命追踪','背水一战','雅典娜无间碟局','WORDS','单刀直入','DESRETO','SUPER8','FLYPAPRE','冲上云霄','BATTLE OF THE NORTH','铁血娇娃','澳门风云II','暴疯雨','匆匆那年','撒娇女人最好命','白发魔女传','INTERSTELLAR','SHADOW RECRUIT','窃听风云','放手爱','大话天仙','冲锋战警','一座城池','WILD TARGET','SHUTTER ISLAND','特种部队','变形金刚2','碟中谍3');
        $timeFlag = date("Y-m-d",strtotime("-6 day"));
        $sqlForDeviceMac = "SELECT device_mac from `pvuv-log` group by device_mac";
        $deviceMacArray = $this->db->query($sqlForDeviceMac)->result();
        //return $deviceMacArray;
       //判断  mac
        $deviceMacNum = count($deviceMacArray);
        if($deviceMacNum == 0)
        {
            $flag = 2;
            return $flag;
        }
        for($i = 0;$i < $deviceMacNum;$i++)
        {
            $targetMac = $deviceMacArray[$i]->device_mac;
            $result = $this->db->query("SELECT hostsn FROM `info_lteinfo` WHERE mac = '{$targetMac}'")->result_array();
            if(isset($result[0]['hostsn']))
            {
                $sn = $result[0]['hostsn'];
            }
            else
            {
                $sn = '000000';
            }
            $TimePerMac = array();
            $TimePerMac[0] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5020%'")->num_rows();
            
            $TimePerMac[1] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5021%'")->num_rows();
            $TimePerMac[2] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5022%'")->num_rows();
            $TimePerMac[3] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5023%'")->num_rows();
            $TimePerMac[4] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5024%'")->num_rows();
            $TimePerMac[5] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5025%'")->num_rows();
            $TimePerMac[6] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5026%'")->num_rows();
            $TimePerMac[7] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5027%'")->num_rows();
            $TimePerMac[8] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5028%'")->num_rows();
            $TimePerMac[9] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5029%'")->num_rows();
            $TimePerMac[10] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5030%'")->num_rows();
            $TimePerMac[11] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5031%'")->num_rows();
            
            $TimePerMac[12] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5032%'")->num_rows();
            $TimePerMac[13] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5033%'")->num_rows();
            $TimePerMac[14] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5034%'")->num_rows();
            $TimePerMac[15] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5035%'")->num_rows();
            $TimePerMac[16] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5036%'")->num_rows();
            $TimePerMac[17] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5037%'")->num_rows();
            $TimePerMac[18] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5038%'")->num_rows();
            $TimePerMac[19] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5039%'")->num_rows();
            $TimePerMac[20] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5040%'")->num_rows();
            $TimePerMac[21] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5041%'")->num_rows();
            $TimePerMac[22] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5042%'")->num_rows();
            $TimePerMac[23] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5043%'")->num_rows();
            $TimePerMac[24] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5044%'")->num_rows();
            $TimePerMac[25] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5045%'")->num_rows();
            $TimePerMac[26] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5046%'")->num_rows();
            $TimePerMac[27] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5047%'")->num_rows();
            
            $TimePerMac[28] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5048%'")->num_rows();
            $TimePerMac[29] = $this->db->query("SELECT * FROM `pvuv-log` WHERE time BETWEEN '{$timeFlag} 00:00:00' AND '{$timeFlag} 23:59:59' AND device_mac = '{$targetMac}' AND url like '%media_5049%'")->num_rows();
            
            for($j = 0;$j < 30;$j++)
            {
                $sql_update = "UPDATE `movie-times` set movie_play_times = {$TimePerMac[$j]} WHERE time = '{$timeFlag}' AND movie_name = '{$movieNameArray[$j]}' AND device_mac = '{$targetMac}' AND sn = '{$sn}'";
                $sql_insert = "INSERT INTO `movie-total` (device_mac,sn,time,movie_name,movie_play_times) VALUES ('{$targetMac}','{$sn}','{$timeFlag}','{$movieNameArray[$j]}','{$TimePerMac[$j]}')";
                if($this->db->query("SELECT * from `movie-times` WHERE time = '{$timeFlag}' AND movie_name = '{$movieNameArray[$j]}' AND device_mac = '{$targetMac}'")->num_rows())
                {
                    $query = $this->db->query($sql_update);
                    if(!$query)
                    {
                        $flag = 1;
                    }
                }
                else
                {
                    $query = $this->db->query($sql_insert);
                    if(!$query)
                    {
                        $flag = 1;
                    }
                }
            }   
        }
        return $flag;
    }
    
}