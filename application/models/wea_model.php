<?php
class Wea_model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function weather_info($lat, $lon, $appid) {
        $url = "http://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid={$appid}";
        $data = file_get_contents($url);
        return json_decode($data);
    }

};
?>