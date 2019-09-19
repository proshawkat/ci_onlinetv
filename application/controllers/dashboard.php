<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata("type");
        if($user != "sa" && $user == ""){
            redirect(base_url(), "refresh");
        }
    }

    public function index() {
    	$data = array();
        $data['siteTitle'] = "Dashboard";
        $data['comments'] = $this->mt->getData("comments", "comment_id", "name", "*");
        $data['video'] = $this->mt->getData("video", "video_id", "video", "*");
        $data['register'] = $this->mt->getData("register", "r_id", "name", "*");
         $data['subscriber'] = $this->mt->getData("subscriber", "subscriber_id", "subscriber_id", "*");
        //print_r($data['comments']);
        $data['content'] = $this->load->view("admin/dashboard", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function add_category() {
        $data = array();
        $data['siteTitle'] = "category";
        $data['content'] = $this->load->view("admin/add_category", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert_category(){
         $this->load->library('form_validation');

         $this->form_validation->set_rules('cate_name', 'category name', 'required');

         if ($this->form_validation->run() == FALSE)
            {
                    $this->add_category();
            }
            else
            {
                $cdata = array(
                    "cate_name" => $this->input->post("cate_name")
                );

                if($this->mt->save_data("category", $cdata)){
                    $this->session->set_flashdata("msg", "You have successfull saved a category");
                    redirect(base_url() . "dashboard/manage_category", "refresh");
                }else{
                     $this->session->set_flashdata("msg", "Server is busy now");
                    redirect(base_url() . "dashboard/manage_category", "refresh");
                }
            }
    }

    public function manage_category(){
        $data = array();
        $data['siteTitle'] = "category";
        $data['category'] = $this->mt->getData("category", "cate_id", "asc", "*");
        $data['content'] = $this->load->view("admin/manage_category", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function edit_cate(){
        $id = $this->uri->segment(3);

        $data = array();
        $data['siteTitle'] = "category";
        $data['singlecate'] = $this->mt->singleData("category", array("cate_id"=>$id));
        $data['content'] = $this->load->view("admin/edit_category", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function update_category(){

         $this->load->library('form_validation');

        $cate_id = $this->input->post("hidden");
        $this->form_validation->set_rules('cate_name', 'category name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $this->edit_cate();
        }
        else
        {
            $udata = array(
                "cate_name" => $this->input->post("cate_name")
            );

            if($this->mt->Update_data("category", "cate_id", $cate_id, $udata)){
                $this->session->set_flashdata("msg", "You have successfull Updated a category");
                redirect(base_url() . "dashboard/manage_category", "refresh");
            }else{
                 $this->session->set_flashdata("msg", "Server is busy now");
                redirect(base_url() . "dashboard/edit_cate", "refresh");
            }
        }
    }

    public function delete_cate(){
        $id = $this->uri->segment(3);
       if($this->mt->delete("category", array('cate_id'=>$id))){
            $this->session->set_flashdata("msg", "You have successfull Delete a category");
            redirect(base_url() . "dashboard/manage_category", "refresh");
       }else{
            $this->session->set_flashdata("msg", "Server is busy now");
            redirect(base_url() . "dashboard/manage_category", "refresh");
       }
    }

     public function add_video() {
        $data = array();
        $data['siteTitle'] = "video";
        $data['category'] = $this->mt->getData("category", "cate_id", "asc", "*");
        $data['content'] = $this->load->view("admin/add_video", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert_video(){
         $this->load->library('form_validation');


         $this->form_validation->set_rules('cate_id', 'category name', 'required');
         $this->form_validation->set_rules('title', 'title', 'required');
         $this->form_validation->set_rules('video', 'video id', 'required');

         if ($this->form_validation->run() == FALSE)
            {
                    $this->add_video();
            }
            else
            {
                $vdata = array(
                    "cate_id" => $this->input->post("cate_id"),
                    "title" => $this->input->post("title"),
                    "video" => $this->input->post("video")
                );

                if($this->mt->save_data("video", $vdata)){
                    $this->session->set_flashdata("msg", "You have successfull saved a category");
                    redirect(base_url() . "dashboard/manage_video", "refresh");
                }else{
                     $this->session->set_flashdata("msg", "Server is busy now");
                    redirect(base_url() . "dashboard/manage_video", "refresh");
                }
            }
    }

    public function manage_video(){
        $data = array();
        $data['siteTitle'] = "Video";
        $data['video'] = $this->mt->getData("video", "video_id", "asc", "*");
        $data['content'] = $this->load->view("admin/manage_video", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function edit_video(){
        $id = $this->uri->segment(3);

        $data = array();
        $data['siteTitle'] = "category";
        $data['category'] = $this->mt->getData("category", "cate_id", "asc", "*");
        $data['singlevideo'] = $this->mt->singleData("video", array("video_id"=>$id));
        $data['content'] = $this->load->view("admin/edit_video", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function update_video(){

        $this->load->library('form_validation');

        $video_id = $this->input->post("hidden");

        $this->form_validation->set_rules('cate_id', 'category name', 'required');
         $this->form_validation->set_rules('video', 'video id', 'required');

         if ($this->form_validation->run() == FALSE)
        {
                $this->edit_video();
        }
        else
        {
            $vdata = array(
                "cate_id" => $this->input->post("cate_id"),
                "title" => $this->input->post("title"),
                "video" => $this->input->post("video"),
                'popular' => $this->input->post("checkbox")
            );
            //print_r($vdata);
            //die();
            if($this->mt->Update_data("video", "video_id", $video_id, $vdata)){
                $this->session->set_flashdata("msg", "You have successfull Updated");
                redirect(base_url() . "dashboard/manage_video", "refresh");
            }else{
                 $this->session->set_flashdata("msg", "Server is busy now");
                redirect(base_url() . "dashboard/manage_video", "refresh");
            }
        }
    }

    public function delete_video(){
        $id = $this->uri->segment(3);

        if($this->mt->delete("video", array('video_id'=>$id))){
            $this->session->set_flashdata("msg", "You have successfull Delete");
            redirect(base_url() . "dashboard/manage_video", "refresh");
       }else{
            $this->session->set_flashdata("msg", "Server is busy now");
            redirect(base_url() . "dashboard/manage_video", "refresh");
       }
    }

    public function comments(){
        $data = array();
        $data['siteTitle'] = "Comments";
        $data['comments'] = $this->mt->getData("comments", "comment_id", "desc", "*");
        $data['content'] = $this->load->view("admin/comments", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function delete_comment(){
        $id = $this->uri->segment(3);

        if($this->mt->delete("comments", array('comment_id'=>$id))){
            $this->session->set_flashdata("msg", "You have successfully Delete");
            redirect(base_url() . "dashboard/comments", "refresh");
       }else{
            $this->session->set_flashdata("msg", "Server is busy now");
            redirect(base_url() . "dashboard/comments", "refresh");
       }
    }

    public function register(){
        $data = array();
        $data['siteTitle'] = "Register";
        $data['register'] = $this->mt->getData("register", "r_id", "desc", "*");
        $data['content'] = $this->load->view("admin/register", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function subscriber(){
        $data = array();
        $data['siteTitle'] = "Subscriber";
        $data['subscriber'] = $this->mt->getData("subscriber", "subscriber_id", "desc", "*");
        $data['content'] = $this->load->view("admin/subscriber", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function delete_subscriber(){
        $id = $this->uri->segment(3);

        if($this->mt->delete("subscriber", array('subscriber_id'=>$id))){
            $this->session->set_flashdata("msg", "You have successfully Delete");
            redirect(base_url() . "dashboard/subscriber", "refresh");
       }else{
            $this->session->set_flashdata("msg", "Server is busy now");
            redirect(base_url() . "dashboard/subscriber", "refresh");
       }
    }

    public function published(){
        $cid = $this->input->post("comment_id");
        $ps = $this->input->post("pbstatus");

        $cstatus = array(
            "published_status" => $ps,
        );
        //print_r($cstatus);
        //die();
        if($this->mt->Update_data("comments", "comment_id", $cid, $cstatus)){
            $this->session->set_flashdata("msg", "Published this comments");
            redirect(base_url() . "dashboard/comments", "refresh");
        }else{
             $this->session->set_flashdata("msg", "Server is busy now");
            redirect(base_url() . "dashboard/comments", "refresh");
        }
    }
}