<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/rentalmobil/api/mobil');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $data['mobil'] = json_decode($result, TRUE);
        curl_close($curl);

        $this->load->view('template/customer/header');
        $this->load->view('home', $data);
        $this->load->view('template/customer/footer');
    }

}






?>