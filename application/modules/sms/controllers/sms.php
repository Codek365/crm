<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms extends AdminController{
	public function index(){
		$this->load->model("Msms");
		$data = array();
		$config = array();
		$filter = array();
        if(isset($_POST['filter_namekh'])){
        	$filter['namekh'] = $_POST['filter_namekh'];
        }
        if(isset($_POST['filter_contentsms'])){
        	$filter['contentsms'] = $_POST['filter_contentsms'];
        }
        if(isset($_POST['filter_sendtime'])){
        	$filter['sendtime'] = $_POST['filter_sendtime'];
        }
        if(isset($_POST['filter_viewtime']) && $_POST['filter_viewtime'] != ''){
        	$filter['viewtime'] = $_POST['filter_viewtime'];
        }
        if(isset($_POST['filter_click'])){
        	$filter['click'] = $_POST['filter_click'];
        }
        $config["total_rows"] = $this->Msms->getTotalSMS($filter);
        if(isset($_POST['filter_row']) && $_POST['filter_row'] != 0){
        	if($_POST['filter_row'] > $config["total_rows"]){
        		$config["per_page"] = $config['total_rows'];
        	}else{
        		$config["per_page"] = $_POST['filter_row'];
        	}
        }else{
	        $config["per_page"] = 5;
        }
        $config["uri_segment"] = 3;
        $config["base_url"] = base_url()."sms/index";
        $config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['links'] = $this->pagination->create_links();
        if($page == 0){
        	$data['page'] = 1;
        }else{
        	$data['page'] = $page;
        }
        $data['per_page'] = $config["per_page"];
        $data['per_page_row'] = $page+$config["per_page"];
        if($data['per_page_row'] > $config["total_rows"]){
        	$data['per_page_row'] = $config["total_rows"];
        }
        $data['total_rows'] = $config["total_rows"];
		$data['list'] = $this->Msms->getSMS($page,$config["per_page"],$filter);
		$data['filter'] = $filter;
		$data['mess'] = $this->session->flashdata("flash_mess");
		$this->template->load_view('sms/index',$data);
	}
	public function edit(){
		$this->load->model("Msms");
		$this->load->library("form_validation");
		$this->form_validation->CI =& $this; // Muốn sử dụng hàm callback thì phải khai báo cái này
		if($this->input->post("btnConfig")){
			$this->form_validation->set_rules("txtAPI", "Link API", "required");
			$this->form_validation->set_rules("txtAPIKey", "API Key", "required");
			$this->form_validation->set_rules("txtSecretKey", "Secret Key", "required");
			$this->form_validation->set_rules("txtContent", "Nội Dung Mẫu Tin", "required");
			if ($this->form_validation->run() == TRUE) {
				$data_insert = array(
					"sms_content"	=> $this->input->post("txtContent"),
					"sms_apikey"	=> $this->input->post("txtAPIKey"),
					"sms_secretkey"	=> $this->input->post("txtSecretKey"),
					"sms_api"		=> $this->input->post("txtAPI"),
					"sms_status"	=> $this->input->post("status")
				);
				$this->Msms->insertSMSSetting($data_insert);
				$this->session->set_flashdata("flash_mess", "Đã cài đặt <strong>Thành công!</strong>");
				redirect(site_url('sms'));
			}
		}
		$data = array();
		$this->load->model("Msms");
		$data['info'] = $this->Msms->getSMSSetting();
		$this->template->load_view('sms/setting',$data);
	}
	public function delete(){
		$id=$this->input->post('case');
		if($id){
			$this->load->model('Msms');
			foreach ($id as $key => $value) {
				$this->Msms->deleteSms($value);
			}
			$this->session->set_flashdata("flash_mess", "Đã Xóa Tin <strong>Thành công!</strong>");
		}
		redirect(site_url('sms'));
	}
	public function search(){
		$search_name = $_POST['search_name'];
		$this->load->model('Msms');
		$list = $this->Msms->getSearchSMS($search_name);
		$html = '<table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info">';$html .= '<thead><tr role="row"><th><input type="checkbox" name="case[]" id="selectall" /></th><th>Tên Khách Hàng</th><th>Nội Dung Tin Nhắn</th><th>Thời Gian Gửi Tin</th><th>Thời gian xem</th><th>Số Lần Xem</th></tr></thead><tbody>';if($list){foreach ($list as $key => $value) {$html .= '<tr class="gradeX ';if($key%2==0){$html .= 'odd active';}else{$html .= 'even active';}$html .= '" role="row"><td><input type="checkbox"  name="case[]" value="'.$value['smsid'].'"></td><td>'.$value['namekh'].'</td><td>'.$value['contentsms'].'</td><td>'.date("d/m/Y h:i", strtotime($value['sendtime'])).'</td><td>'.$value['clicktime'].'</td><td>'.$value['view'].'</td></tr>';}}else{$html .= '<tr><td colspan="6" style="text-align: center;">Chưa Có Dữ Liệu</td></tr>';}$html .= '</tbody></table>';
        echo $html;
	}
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */