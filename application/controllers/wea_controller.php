<?php

defined('BASEPATH') or exit('No direct script access allowed');

class wea_controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('wea_model', 'weathermodel');
    }

    public function index() {
        $this->load->view('wea_view');
    }

    public function get_weather() {

        $this->load->config('env');
        $appid = $this->config->item('weather_api_token');
        
        $lat = $this->input->post('lat');
        $lon = $this->input->post('lon');
        
        $error = false;
        $message = '';

        try{
            $result = $this->weathermodel->weather_info($lat, $lon, $appid);
        } catch (Throwable $thrwoable) {
            $error = true;
            $message = $thrwoable->getMessage();
        }

        echo json_encode([
            'status' => $error ? 400 : 200,
            'response' => $error ? $message : $result
        ]);
    }
}
?>