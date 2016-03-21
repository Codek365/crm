<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends MX_Controller{
	public function index(){
    
		if (ENVIRONMENT == 'development') {
        $this->load->library('migration');
        $this->migration->latest();
        if ( ! $this->migration->current()) {
          if ($this->migration->error_string()) {
            show_error($this->migration->error_string());
          }
          
          echo "========================================</br>";
          echo "Migrate Down Done! </br>";
        } else {
         echo "Migrate Error! </br>";
      } 
    }
  }
  public function Drop()
  {
    $this->load->dbutil();
    $tables = $this->db->list_tables();

    foreach ($tables as $table)
    {
       $this->dbforge->drop_table($table);
    }
  }
}