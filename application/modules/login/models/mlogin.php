<?php
class Mlogin extends CI_Model{
	protected $_table = "users";
	public function checkuser($user,$pass){
		$this->db->where("username",$user);
		$this->db->where("password",$pass);
		$query=$this->db->get($this->_table);
		if($query->num_rows() > 0){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}
}