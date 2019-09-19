<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ict extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
    	$data = array();
        $data['siteTitle'] = "Dashboard";
        $data['products'] = $this->mt->getData("product", "pid", "pcode", "*");
        $data['video'] = $this->mt->getData("video", "video_id", "video", "*");
        $data['register'] = $this->mt->getData("register", "r_id", "name", "*");
         $data['subscriber'] = $this->mt->getData("subscriber", "subscriber_id", "subscriber_id", "*");
        //print_r($data['comments']);
        $data['content'] = $this->load->view("admin/cart", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function get_pcode($id){
        $scate = $this->mt->singleData('product', array('pid'=>$id));
        
         echo  '<input type="text" class="form-control" value="'.$scate->pcode.'" disabled />';
        
    }

    public function addToCart(){
    	$id = $this->input->post('pid');
		$pvat = $this->input->post('pvat');
		$qty = $this->input->post('qty');
		$punit = $this->input->post('punit');
		$pdiscount = $this->input->post('pdiscount');
		$pcolor = $this->input->post('pcolor');


        $pdt = $this->session->userdata("pdt");

        
        	$sdata['pdt'] = $id;
	        $sdata['punit'] = $punit;
			$sdata['pvat'] = $pvat;
			$sdata['qty'] = $qty;
			$sdata['pdiscount'] = $pdiscount;
			$sdata['pcolor'] = $pcolor;
	        $this->session->set_userdata($sdata);
       

    }

    public function cart_product(){
		$pid = $this->session->userdata('pdt');
        $qty = $this->session->userdata("qty");
        $pvat = $this->session->userdata("pvat");
        $pdiscount = $this->session->userdata("pdiscount");
        $pcolor = $this->session->userdata("pcolor");
        $punit = $this->session->userdata("punit");
		if(!$pid){
			echo 'You have no items in your shopping cart.';
		}else{
			$data['cpr'] = $pid;
			$data['qty'] = $qty;
			$data['pdiscount'] = $pdiscount;
			$data['pcolor'] = $pcolor;
			$data['pvat'] = $pvat;
			$data['punit'] = $punit;
			$this->load->view('admin/cart_products',$data);
		}
	}
}

?>