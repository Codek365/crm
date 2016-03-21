<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
	public function index()
	{
		$_data = array();
		if($this->input->post("btnOK")){
			$user = $this->input->post("user");
			$pass = $this->input->post("pass");
			$this->load->model("Mlogin");
			$data=$this->Mlogin->checkuser($user,md5($pass));
			if($data == FALSE){
				$_data['error'] = "Sai tên đăng nhập hoặc mật khẩu.";
			}else{
				$this->load->model("usergroup/Musergroup");
				$permission = $this->Musergroup->getgroupbyId($data['group_id'])[0]['permission'];
				$sess=array(
					"user_name" 		=> $data['name_display'],
					"user_id"	   		=> $data['user_id'],
					"user_group"		=> $data['group_id'],
					"permission"		=> $permission
				);
				$this->session->set_userdata($sess);
				redirect(base_url());
			}
		}
		$this->load->view('login/index',$_data);	
	}
	public function logout(){
		$this->session->sess_destroy();
		session_start();
		session_destroy();
		redirect(site_url('login'));
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */