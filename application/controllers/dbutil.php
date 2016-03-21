<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbutil extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->dbutil();
	}

	public function index()
	{
		

		$tb = array();
		$tables = $this->db->list_tables();

		foreach ($tables as $table)
		{
		   array_push($tb, $table);
		   echo $table."</br>";
		 //   if ($this->dbutil->optimize_table($table))
			// {
			//     echo 'Success!';
			// }
		}

	}
	public function optimize_table()
	{
		$tables = $this->db->list_tables();

		foreach ($tables as $table)
		{
		   
		   if ($this->dbutil->optimize_table($table))
			{
			   $this->db->query('ALTER TABLE '.$table.' ENGINE = MYISAM;');
			    echo 'Optimize table <b><i>'.$table.'</i></b> success!<br>';
			}
		}
	}

}

/* End of file  */
/* Location: ./application/controllers/ */