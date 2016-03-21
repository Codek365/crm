<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkflight extends MY_Controller {
	public function index()
	{		
			$this->template->load_view('checkflight/index');
	}
	public function check(){
		$this->load->library("form_validation");
		$this->form_validation->CI =& $this;
		if($this->input->post("btnSubmit")){
		 	$data_check['data_check'] = array(
		 		"STRUCTURE" =>$this->request->post['SearchType'],
				"FROM"		=>$this->request->post['Destination'],
		 		"TO"		=>$this->request->post['MaskOrigin'],
		 		"DAY_DEP"	=>$this->request->post['DepartureDate'],
		 		"DAY_RET"	=>$this->request->post['ReturnDate'],
				"ADT"		=>$this->request->post['AdultNo'],
		 		"CHD"		=>$this->request->post['ChildNo'],
		 		"INFANT"	=>$this->request->post['InfantNo']
		 		);
			$this->template->load_view('checkflight/check',$data_check);
		}else{
		 	redirect(site_url('checkflight'));
		}
	}
	public function checkvj(){
		$html ="";
		$this->load->helper('checkflight');
		$data_check['STRUCTURE']=$this->request->post['STRUCTURE'];
		$data_check['FROM']=$this->request->post['FROM'];
		$data_check['TO']=$this->request->post['TO'];
		$data_check['DAY_DEP']= $this->request->post['DAY_DEP'];
		$data_check['DAY_RET']= $this->request->post['DAY_RET'];
		$data_check['ADT']=	$this->request->post['ADT'];
		$data_check['CHD']=	$this->request->post['CHD'];
		$data_check['INFANT']=	$this->request->post['INFANT'];
		$result = getFlightVietJet($data_check);
		echo $result;
	}
	public function checkjt(){
		$html ="";
		$this->load->helper('checkflight');
		$data_check['STRUCTURE']=$this->request->post['STRUCTURE'];
		$data_check['FROM']=$this->request->post['FROM'];
		$data_check['TO']=$this->request->post['TO'];
		$data_check['DAY_DEP']= $this->request->post['DAY_DEP'];
		$data_check['DAY_RET']= $this->request->post['DAY_RET'];
		$data_check['ADT']=	$this->request->post['ADT'];
		$data_check['CHD']=	$this->request->post['CHD'];
		$data_check['INFANT']=	$this->request->post['INFANT'];
		$result = getFlightJetStar($data_check);
		echo $result;
	}
	public function checkvn(){
		$html ="";
		$this->load->helper('checkflight');
		$this->load->helper('checkflight');
		$data_check['STRUCTURE']=$this->request->post['STRUCTURE'];
		$data_check['FROM']=$this->request->post['FROM'];
		$data_check['TO']=$this->request->post['TO'];
		$data_check['DAY_DEP']= $this->request->post['DAY_DEP'];
		$data_check['DAY_RET']= $this->request->post['DAY_RET'];
		$data_check['ADT']=	$this->request->post['ADT'];
		$data_check['CHD']=	$this->request->post['CHD'];
		$data_check['INFANT']=	$this->request->post['INFANT'];
		$result = getFlightVietNamAirlines($data_check);
		echo $result;
	}
}