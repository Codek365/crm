<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Setup tool for start project
*/
class Setup extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		

		ini_set("error_reporting", E_ALL & ~E_DEPRECATED);

		$dbconn = mysql_connect('localhost','root','');
		mysql_select_db('crm',$dbconn);
		$file = APPPATH.'db/youtek_app.sql';
		// echo $file."<br>";
		if($fp = file_get_contents($file)) {
		  $var_array = explode(';',$fp);
		  foreach($var_array as $value) {
		  	// echo $value.';';

		    mysql_query($value.';',$dbconn);
		  // $this->db->query($value.';');
		  }
		}

		

	}
}


/* End of file setup.php */
/* Location: ./application/controllers/setup.php */