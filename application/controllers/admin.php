<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

    public function index()
	{
		$data = array();
		$data['sitetitle'] = "Admin";
		$data['sitemenu'] = "login";
		$this->load->view('admin/login', $data);
	}

	public function check(){
		$input_data = array(
			"email" => $this->input->post("email"),
			"password" => $this->input->post("password")
		);
		$check_data = $this->mt->Check_Data("user", "*", $input_data);
		//print_r($check_data);
		if($check_data){
			foreach ($check_data as $v) {
				$cuser_sdata = array(
					"user_id" => $v->user_id,
					"type" => $v->type
				);
				$this->session->set_userdata($cuser_sdata);
				if($v->type == "sa"){
					redirect(base_url() . "dashboard");
				}else{
					 redirect(base_url() . "refresh");
				}
			}
		}else{
			$this->session->set_flashdata("msg", "You must login to manage your website");
            $this->index();
		}

	}

	public function logout(){
		$this->session->unset_userdata("user_id");
		$this->session->unset_userdata("type");
		redirect(base_url() . "admin", "refresh");
	}
}