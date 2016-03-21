<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TimeLine extends AdminController {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('m_timeline');
	}

	public function index()
	{
		$this->load->view('timeline/leftbar');
	}
	public function Tab1()
	{
        $this->load->model('timeline/m_timeline');
        $data['schedule'] = $this->m_timeline->getSchedule();
		$this->load->view('timeline/tab1',$data);
	}
	public function Tab2()
	{
		$this->load->view('timeline/tab2');
	}

	public function getNewSchedule()
	{
		$this->load->model('timeline/m_timeline');
        $schedules =array();
        $data = $this->m_timeline->getSchedule();
        foreach ($data as $key => $value) {
        	array_push($schedules,$value);
        }

        echo json_encode($schedules);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */