<?php
class Register_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_ip($ip_start_threeMode) {
        $ip_vague_search = $ip_start_threeMode."%";
        $query = $this->db->query("select ip_start, ip_end, region from ips where ip_start like '{$ip_vague_search}'");
        
        return $query->result_array();
    }  
    
    public function register($array) {
        $mac = $array['mac'];
        $query = $this->db->query("select mac from info_lteinfo where mac = '{$mac}'");
        if($query->num_rows()){
            return "mac exist already";
        }
        
        $sql = "insert into info_lteinfo values(
                                    '{$array['mac']}', '{$array['ipAddress']}', '{$array['ipLocation']}', '{$array['hostModel']}', '{$array['hostsn']}', '{$array['cpuModel']}',
                                    '{$array['cpuSN']}', '{$array['memoryModel']}', '{$array['memorySN']}', '{$array['boardSN']}', '{$array['networkCardMac']}',
                                    '{$array['distModel']}', '{$array['distSN']}', '{$array['lowfreModel']}', '{$array['lowFreSN']}', '{$array['hignFreModel']}',
                                    '{$array['hignFreSN']}', '{$array['gpsModel']}', '{$array['gpsSN']}', '{$array['modelOf3g']}', '{$array['snOf3g']}', '{$array['iccid']}',
                                    '{$array['hardVersion']}', '{$array['firmwareVersion']}', '{$array['gateWayVersion']}', '{$array['contentVersion']}',
                                    '{$array['firstRegistrationTime']}', '{$array['lastRegistrationTime']}', '{$array['state']}', '{$array['lastKeepAlivetime']}'
                                    )";
        $query = $this->db->query($sql);
        
        if($query){
            return "mac register ok";
        }
        
    }   
}