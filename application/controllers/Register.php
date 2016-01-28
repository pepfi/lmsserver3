<?php
class Register extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('register_model');
    }
    
    public function index(){
        $this->load->view('admin/register');
    }
    
    function getIp($ipstring, $ip_start, $ip_end, $region) {
        $ipstring_array = explode(".", $ipstring);
        $ip_start = explode(".", $ip_start);
        $ip_end = explode(".", $ip_end);
            if ($ipstring_array[1] == $ip_start[1]) {
                if ($ipstring_array[2] >= $ip_start[2] and $ipstring_array[2] <= $ip_end[2]) {
                    if ($ipstring_array[3] >= $ip_start[3] and $ipstring_array[3] <= $ip_end[3]) {
                        return $region;
                    }
                }
            }
        
        return 0;
    }
    
    public function register(){

        $fileInfo = $_FILES['jsonFile'];
        $tempName = $fileInfo['tmp_name'];
//        $destFile = "application/views/global/custom/json/registerjson.json";
//        move_uploaded_file($tempName, $destFile);
        $jsonString = file_get_contents($tempName);
        $jsonArray = json_decode($jsonString, true);
        
        $ip_start_threemode = substr($jsonArray['ipAddress'], 0, 3);
        $vague_search_result = $this->register_model->get_ip($ip_start_threemode);
        foreach($vague_search_result as $val){
            $jsonArray['ipLocation'] = $this->getIp($jsonArray['ipAddress'], $val['ip_start'], $val['ip_end'], $val['region']);
            if($jsonArray['ipLocation']){
                break;
            }
        }
        
        date_default_timezone_set('PRC');
        $jsonArray['firstRegistrationTime'] = date('Y-m-d H:i:s', time());
        
        echo $this->register_model->register($jsonArray);
                
    }
}