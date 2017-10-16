<?php
class Home extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('is_logged_in')) {
            redirect('admin/login');
        }
    }
	
	
	public function index() {
		$this->load->view('admin/users/home');
	}
  
    function aktif(){
      $curl = curl_init();
      $uri = $this->config->item('url_set');
      curl_setopt_array($curl, array(
       // CURLOPT_URL => "http://192.168.2.189:8183/cekfc/123",
        CURLOPT_URL => $uri."/cekfc/123",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 3000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
         ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }
    }
  
  function tukar(){
      $curl = curl_init();
      $uri = $this->config->item('url_set');
      curl_setopt_array($curl, array(
        //CURLOPT_URL => "http://192.168.2.189:8184/switchfc/123",
        CURLOPT_URL => $uri."/switchfc/123",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 3000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
         ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }
    }

}
