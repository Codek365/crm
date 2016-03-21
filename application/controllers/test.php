<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database("db3", TRUE);
	}

	public function index()
	{
		

		$this->db->select('*');
		$results = $this->db->get('notes');
		return $results->result();
		print_r($resuls);
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */