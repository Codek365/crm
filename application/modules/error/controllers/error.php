<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends AdminController{
	public function index()
	{
		$this->template->load_view('error/permission');
	}
	public function Error_404()
	{
		$this->template->load_view('error/404');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */