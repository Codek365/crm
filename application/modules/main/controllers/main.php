<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends AdminController{

	function __construct() {
        parent::__construct();
        $this->load->model('orders/order_mod');
        $this->template->add_js('fullcalendar/fullcalendar.min.js');
        $this->template->add_css('js/fullcalendar/fullcalendar.min.css');
    }
	public function index()
	{

		$this->template->load_view('main/index');
	}
	public function LoadCustomer()
	{
		
    	
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */