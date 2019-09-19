<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_table extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    public function Check_Data($table, $sel, $rel){
        if($rel){
            $this->db->where($rel);
        }
        return $this->db->get($table, $sel, $rel)->result();
    }

    public function save_data($table, $data){
        return $this->db->insert($table, $data);
    }

    public function getData($table, $oby, $order, $limit){
    	return $this->db->order_by($oby, $order)->get($table, $limit)->result();
    }

    public function singleData($table, $where){
        return $this->db->get_where($table, $where)->row();
    }

    public function Update_data($table, $tcol, $uid, $udata){
        $this->db->where($tcol, $uid);
        return $this->db->update($table, $udata);
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function getWhereLimit($table, $where, $limit, $start_row){
        return $this->db->get_where($table, $where, $limit, $start_row)->result();
    }

    public function calculate_age($date)
    {
        $today = new DateTime();
        //echo $today;
        $diff = $today->diff(new DateTime($date));

        if ($diff->y)
        {
            return $diff->y . ' years';
        }
        elseif ($diff->m)
        {
            return $diff->m . ' months';
        }
        else
        {
            return $diff->d . ' days';
        }
    }
}