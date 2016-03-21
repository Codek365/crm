<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {
	public function Customer_list()
	{
		$this->db->cache_on();
		$this->db->select('*');
		return $this->db->get('customer')->result();
		// $this->db->cache_delete_all();
	}	


}
?>