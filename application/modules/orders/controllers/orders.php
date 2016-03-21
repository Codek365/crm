<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/******************************************************
*****Create by codek365 Email: codek365@gmail.com******
******************************************************/ 
class Orders extends AdminController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('orders/order_mod');
	}

	public function index()
	{
		
	}

	public function getOrderList()
	{
		
		$orders = $this->order_mod->getOrderList();
		$order = array();
		foreach ($orders as $key => $value) {
			array_push($order, $value);
		}

		echo json_encode($order);
		exit();
		echo "<pre>";
		print_r($order);


	}



}

/* End of file order.php */
/* Location: ./application/controllers/order.php */