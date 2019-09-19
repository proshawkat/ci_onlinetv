<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tv extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$data = array();
		$data['sitetitle'] = "Welcome | online tv";
		$data['sitemenu'] = "home";
		$data['category'] = $this->mt->getData("category", "cate_id", "asc", "*");
		$data['pvideo'] = $this->mt->getWhereLimit("video", array("popular"=>1), 4, "desc");
		$data['content'] = $this->load->view("home", $data, true);
		$this->load->view('master', $data);
	}

	public function category(){
		$data = array();
		$data['sitetitle'] = "Feature | online tv";
		$data['sitemenu'] = "category";
		$data['content'] = $this->load->view("category", $data, true);
		$this->load->view('master', $data);
	}

	public function cat(){
		$data = array();
		$data['cate_name'] = $this->uri->segment(3);
		$data['sitetitle'] = "Video";
		$data['sitemenu'] = "category";
		$data['category'] = $this->mt->getData("category", "cate_id", "asc", "*");
		$data['cwvideo'] = $this->mt->getData("video", "video_id", "desc", "*");
		$data['pvideo'] = $this->mt->getWhereLimit("video", array("popular"=>1), 4, "desc");
		//print_r($data['cwvideo']);
		$data['content'] = $this->load->view("category-wise-video", $data, true);
		$this->load->view('master', $data);
	}

	public function cwvs(){
		$video_id = $this->uri->segment(3);
		//echo $video_id;
		$data['sitetitle'] = "Video";
		$data['sitemenu'] = "category";
		$data['category'] = $this->mt->getData("category", "cate_id", "asc", "*");
		$data['pvideo'] = $this->mt->getWhereLimit("video", array("popular"=>1), 4, "desc");
		$data['cwvs'] = $this->mt->singleData("video", array("video_id"=>$video_id));
		//$data['comments'] = $this->mt->singleData("comments", array("video_id"=>$video_id));
		//print_r($data['comments']);
		$data['content'] = $this->load->view("cw-single-video", $data, true);
		$this->load->view('master', $data);
	}

	public function register(){
		$data = array();
		$data['sitetitle'] = "Login | online tv";
		$data['sitemenu'] = "register";
		$data['category'] = $this->mt->getData("category", "cate_id", "asc", "*");
		$data['content'] = $this->load->view("register", $data, true);
		$this->load->view('master', $data);
	}

	public function comments(){
		$video_id = $this->uri->segment(3);
		$this->load->library('form_validation');

     	$this->form_validation->set_rules('name', 'name', 'required');
     	$this->form_validation->set_rules('email', 'email', 'required');
     	$this->form_validation->set_rules('comment', 'comment', 'required');

     	if ($this->form_validation->run() == FALSE)
        {
                $this->cwvs();
        }
        else
        {
            $cdata = array(
                "name" => $this->input->post("name"),
                "email" => $this->input->post("email"),
                "comment" => $this->input->post("comment"),
                "comments_date" => date("Y-m-d"),
                "video_id" => $video_id
            );
            //print_r($cdata);
            //die();
            if($this->mt->save_data("comments", $cdata)){
                $this->session->set_flashdata("msg", "Thank you for your comments");
                redirect(base_url() . "tv/cwvs/$video_id", "refresh");
            }else{
                 $this->session->set_flashdata("msg", "Server is busy now");
                redirect(base_url() . "tv/cwvs/$video_id", "refresh");
            }
        }
	}

	public function insert_rdata(){
		$this->load->library('form_validation');

     	$this->form_validation->set_rules('name', 'name', 'required');
     	$this->form_validation->set_rules('email', 'email', 'required');
     	$this->form_validation->set_rules('password', 'password', 'required');
     	// $this->form_validation->set_rules('repassword', 're-password', 'required');
     	$this->form_validation->set_rules('gender', 'gender', 'required');
     	if ($this->form_validation->run() == FALSE)
        {
                $this->register();
        }
        else
        {
            $rdata = array(
                "name" => $this->input->post("name"),
                "email" => $this->input->post("email"),
                "password" => md5($this->input->post("password")),
                "gender" => $this->input->post("gender"),
                "type" => "r"
            );
            $pass = $this->input->post("password");
            $repass = $this->input->post("repassword");
            if($pass == $repass){
	            if($this->mt->save_data("register", $rdata)){
	                $this->session->set_flashdata("msg", "You have successfully registration our Tv");
	                redirect(base_url() . "tv/register", "refresh");
	            }else{
	                 $this->session->set_flashdata("msg", "Server is busy now");
	                redirect(base_url() . "tv/register", "refresh");
	            }
	        }else{
	        	$this->session->set_flashdata("msg", "Password not match");
	            redirect(base_url() . "tv/register", "refresh");
	        }
        }
	}

	public function subscriber(){
		$this->load->library('form_validation');

     	$this->form_validation->set_rules('email', 'email', 'required');

     	if ($this->form_validation->run() == FALSE)
        {
                $this->index();
        }
        else
        {
            $rdata = array(
                "email" => $this->input->post("email")
            );
           $this->mt->save_data("subscriber", $rdata);
        }
	}

	public function check_r(){
		$input_data = array(
			"email" => $this->input->post("email"),
			"password" => md5($this->input->post("password")),
		);
		$cdata = $this->mt->Check_Data("register", "*", $input_data);
		if($cdata){
			foreach($cdata as $v){
				$rdata = array(
					"r_id" => $v->r_id,
					'r_type' => $v->type
				);
				$this->session->set_userdata($rdata);
			}
			$this->session->set_flashdata("lmsg", "You have successfully logged in");
			redirect(base_url() . "tv", "refresh");
		}else{
			$this->session->set_flashdata("emsg", "Your email & password not match");
			redirect(base_url() . "tv/register", "refresh");
		}
	}

	public function register_logout(){
		$this->session->set_flashdata("lmsg", "You have successfully logged out");
		$this->session->unset_userdata('r_id');
		$this->session->unset_userdata('r_type');
		redirect(base_url(), "refresh");
	}

	public function search(){
		$data = array();
		$search = $this->input->post("search");
		$data['sitetitle'] = "Search";
		$data['sitemenu'] = "category";
		$data['pvideo'] = $this->mt->getWhereLimit("video", array("popular"=>1), 4, "desc");
		$data['result'] = $this->db->query("SELECT * FROM video WHERE title like '%".$search."%'")->result();
		$data['category'] = $this->mt->getData("category", "cate_id", "asc", "*");
		$data['content'] = $this->load->view("search", $data, true);
		$this->load->view('master', $data);
	}
}
