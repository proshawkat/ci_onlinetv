<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata("type");
        if($user != "sa" && $user == ""){
            redirect(base_url(), "refresh");
        }
    }

    public function index(){
    	$id = $this->session->userdata("user_id");
    	$data = array();
        $data['siteTitle'] = "Profile";
        $data['user'] = $this->mt->singleData("user", array("user_id"=>$id));
        //print_r($data['profile']);
        $data['content'] = $this->load->view("admin/profile", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function change_pass(){
        $id = $this->session->userdata("user_id");
        $data = array();
        $data['siteTitle'] = "Profile";
        $data['user'] = $this->mt->singleData("user", array("user_id"=>$id));
        //print_r($data['profile']);
        $data['content'] = $this->load->view("admin/change_pass", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function update_password(){
        $id = $this->session->userdata("user_id");
        $pass = $this->input->post("password");
        $user = $this->mt->singleData("user", array("user_id"=>$id));
        if($pass == $user->password){
            if($this->input->post("new_pass") == $this->input->post("cpass")){
                $udata = array(
                    "password" => $this->input->post("new_pass")
                );

                if($this->mt->Update_data("user", "user_id", $id, $udata)){
                    $this->session->set_flashdata("msg", "You have successfull Updated a category");
                    redirect(base_url() . "settings", "refresh");
                }else{
                    $this->session->set_flashdata("msg", "Server is busy now");
                    redirect(base_url() . "settings/change_pass", "refresh");
                }
            }else{
                $this->session->set_flashdata("msg", "Your new password not match");
                redirect(base_url() . "settings/change_pass", "refresh");
            }     
        }else{
            $this->session->set_flashdata("msg", "Your Old password not match!");
            redirect(base_url() . "settings/change_pass", "refresh");
        }
    }
}

?>