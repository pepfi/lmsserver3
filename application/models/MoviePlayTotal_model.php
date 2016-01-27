<?php
class MoviePlayTotal_model extends CI_Model {

    public function __construct()
    {
       
    }
    
    public function handle()
    {
        $flag = 0;
        $movieNameArray = array('how you see me','DREDD','夺命追踪','背水一战','雅典娜无间碟局','WORDS','单刀直入','DESRETO','SUPER8','FLYPAPRE','冲上云霄','BATTLE OF THE NORTH','铁血娇娃','澳门风云II','暴疯雨','匆匆那年','撒娇女人最好命','白发魔女传','INTERSTELLAR','SHADOW RECRUIT','窃听风云','放手爱','大话天仙','冲锋战警','一座城池','WILD TARGET','SHUTTER ISLAND','特种部队','变形金刚2','碟中谍3');
        for($i = 0;$i<30;$i++)
        {
            $data = $this->db->query("SELECT * from `movie-times` WHERE movie_name = '{$movieNameArray[$i]}'")->result_array();
            $movie_play_total = 0;
            foreach($data as $row)
            {
                $movie_play_total += $row['movie_play_times'];
            }
            $sql_update = "UPDATE `movie-total` set movie_play_total = '{$movie_play_total}' WHERE movie_name = '{$movieNameArray[$i]}'";
            $sql_insert = "INSERT INTO `movie-total` (movie_name,movie_play_total) VALUES ('{$movieNameArray[$i]}','{$movie_play_total}')";
            if($this->db->query("SELECT * from `movie-total` WHERE movie_name = '{$movieNameArray[$i]}'")->num_rows())
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
        return $flag;
    }
     
}