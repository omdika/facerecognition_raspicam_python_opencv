<?php
class Users_admin extends CI_Controller {
 
   
    public function __construct() {
        parent::__construct();
        $this->load->model('model_users');
       
        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }
 
    
    public function index() {
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type'); 

        $config['per_page'] = 10;
        $config['base_url'] = base_url().'admin/users';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $page = $this->uri->segment(3);

        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        } 

        if($order_type){
            $filter_session_data['order_type'] = $order_type;
        }
        else{
            
            if($this->session->userdata('order_type')){
                $order_type = $this->session->userdata('order_type');    
            }else{
                
                $order_type = 'Asc';    
            }
        }
        
        $data['order_type_selected'] = $order_type;        

            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            
            $data['search_string_selected'] = '';
            $data['manufacture_selected'] = 0;
            $data['order'] = 'id_user';

            $data['count_products']= $this->model_users->getUserData();
            $data['users'] = $this->model_users->get_user('', '', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        $this->pagination->initialize($config);   

        $data['main_content'] = 'admin/users/list';
        $this->load->view('includes/template', $data);  

    }

    public function add() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('age', 'age', 'required|numeric');
            $this->form_validation->set_rules('occupation', 'occupation', 'required');
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('region', 'region', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
           
            if ($this->form_validation->run()) {
                $data_to_users = array(
                    'name' => $this->input->post('name'),
                    'gender' => $this->input->post('gender'),
                    'age' => $this->input->post('age'),
                    'occupation' => $this->input->post('occupation'),          
                    'country' => $this->input->post('country'),
                    'region' => $this->input->post('region')
                );
                
                if($this->model_users->insert_users($data_to_users)) {
                  $this->session->set_flashdata("adduser", "<div class='alert alert-success' style='margin:0px;' role='alert'><a class='close' data-dismiss='alert'>×</a><strong>Well done!</strong> new user created with success.</div>");
                  redirect('admin/users');
                 
                } else {
                    $this->session->set_flashdata("adduser", "<div class='alert alert-error' style='margin:0px;' role='alert'><a class='close' data-dismiss='alert'>×</a><strong>Oh snap!</strong> change a few things up and try submitting again.</div>");
                    redirect('admin/users');
                }
            }
        }
       
        $data['main_content'] = 'admin/users/add';
        $this->load->view('includes/template', $data);  
       
    }       

    public function update() {
        $id = $this->uri->segment(4);
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('age', 'age', 'required|numeric');
            $this->form_validation->set_rules('occupation', 'occupation', 'required');
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('region', 'region', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            
            if ($this->form_validation->run()) {
                $data_to_users = array(
                   'name' => $this->input->post('name'),
                    'gender' => $this->input->post('gender'),
                    'age' => $this->input->post('age'),
                    'occupation' => $this->input->post('occupation'),          
                    'country' => $this->input->post('country'),
                    'region' => $this->input->post('region')
                );
                if ($this->model_users->update_users($id, $data_to_users) == TRUE) {
                    $this->session->set_flashdata("adduser", "<div class='alert alert-success' style='margin:0px;' role='alert'><a class='close' data-dismiss='alert'>×</a><strong>Well done!</strong> user updated with success.</div>");
                    redirect('admin/users');
                } else {
                    $this->session->set_flashdata("adduser", "<div class='alert alert-error' style='margin:0px;' role='alert'><a class='close' data-dismiss='alert'>×</a><strong>Oh snap!</strong> change a few things up and try submitting again.</div>");
                    redirect('admin/users');
                }
                    redirect('admin/users/update/'.$id.'');
            }

        }

        $data['users'] = $this->model_users->get_users_by_id($id);
        $data['main_content'] = 'admin/users/edit';
        $this->load->view('includes/template', $data); 
    }

    function hapus() {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$dir          ='assets/py/att_faces/'.$name;
	 if (file_exists($dir)) {
       foreach(scandir($dir) as $file) {
			if ('.' === $file || '..' === $file) continue;
			if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
			else unlink("$dir/$file");
		}
		rmdir($dir);
     }       
		$where = array('id_users' => $id);
		$a = $this->model_users->hapus_data($where,'users');
		echo $a;
    }
  
    function capture() {
      $curl = curl_init();
      $id = $_GET['file'];
      $uri = $this->config->item('url_capture');
      curl_setopt_array($curl, array(
        //CURLOPT_URL => "http://192.168.2.189:8181/test/".$id."/123",
        CURLOPT_URL => $uri."/test/".$id."/123",
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
  
  
  function kill() {
      $curl = curl_init();
      $uri = $this->config->item('url_set');
      curl_setopt_array($curl, array(
       // CURLOPT_URL => "http://192.168.2.189:8182/kill/123",
        CURLOPT_URL => $uri."/kill/123",
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
    
    
    function show(){
      $nama = $_GET['file'];
      $a 	  = base_url();
      $dir  = 'assets/py/att_faces/'.$nama;
      $i = 0;

      $file_display = array(
          'jpg',
          'jpeg',
          'png',
          'gif'	
      );	

      if (file_exists($dir) == false ) {
            echo 'Directory \''. $dir. '\' not found!';
                } else {
                    $dir_contents = scandir($dir);
                    sort($dir_contents, SORT_NUMERIC);
                    $dir_contents = array_reverse($dir_contents);

                    foreach ($dir_contents as $file) {
                        $file_type = strtolower(end(explode('.', $file)));

                        if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
                           echo '<div class="gallery" id="gbr_'.$i.'">
                                  <a type="button" onclick="hapus(\''.$file.'\', '.$i.');"><i class="icon-remove"></i>
                                    <img src="'.$a.$dir.'/'.$file.'" width="600" height="400" id="file" name="file">
                                  </a>
                                 </div>';
                        }
                      $i++;
                    }
                }	
    }	
		


    public function delete(){
          $filename = $_POST['file'];
         
           if (file_exists($filename)) {
            $res = unlink($filename);
            } 
            else {
            $res = 'Could not delete '.$filename.', file does not exist';
            }
           echo $res; 
    }

}
