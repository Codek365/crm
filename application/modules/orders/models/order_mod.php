<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/******************************************************
*****Create by codek365 Email: codek365@gmail.com******
******************************************************/ 
class Order_mod extends CI_Model {

	private $_table='order';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getOrderList()
	{
		$this->db->select('*');
		$results = $this->db->get($this->_table."_product", 20,0);
		return $results->result();
		
	}

}

/* End of file order_model.php */
/* Location: ./application/models/order_model.php */