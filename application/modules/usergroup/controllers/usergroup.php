<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserGroup extends AdminController{
	public function index(){
		$this->load->model("usergroup/Musergroup");
		$data = array();
		$config = array();
		$filter = array();
        if(isset($_POST['filter_name'])){
        	$filter['namegroup'] = $_POST['filter_name'];
        }
        $config["total_rows"] = $this->Musergroup->getTotalUserGroup($filter);
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
        $config["base_url"] = base_url()."usergroup/index";
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
		$data['listgroup'] = $this->Musergroup->getall($page,$config["per_page"],$filter);
		$data['filter'] = $filter;
		$data['mess'] = $this->session->flashdata("flash_mess");
		$this->template->load_view('usergroup/index',$data);
	}
	public function create(){
		$this->load->library("form_validation");
		$this->form_validation->CI =& $this;
		if($this->input->post("btnOK")){
			$this->form_validation->set_rules("txtName", "Name Group", "required|callback_checkname");
			if ($this->form_validation->run() == TRUE) {
			$array = glob('application/modules/*',GLOB_ONLYDIR);
			foreach ($array as $key => $value) {
				$module = explode("/", $value);
				if($module[2] != "backup" && $module[2] != "error" && $module[2] != "login" && $module[2] != "main"){
					if(array_key_exists($module[2],$this->request->post['checkbox']) == false){
						$this->request->post['checkbox'][$module[2]] = array();
					}
				}
			}
			$this->request->post['checkbox'] = json_encode($this->request->post['checkbox']);
				$data_insert = array(
					"namegroup"		=> $this->request->post['txtName'],
					"permission"	=> $this->request->post['checkbox'],
				);
			$this->load->model('Musergroup');
			$this->Musergroup->insertgroup($data_insert);
			$this->session->set_flashdata("flash_mess", "Đã thêm nhóm người dùng <strong>Thành công!</strong>");
			redirect(site_url('usergroup'));
			}
		}
		$this->load->model("Musergroup");
		$data = array();
		$array = glob('application/modules/*',GLOB_ONLYDIR);
		foreach ($array as $key => $value) {
			$module = explode("/", $value);
			if($module[2] != "backup" && $module[2] != "error" && $module[2] != "login" && $module[2] != "main"){
				$data['modules'][] = $module[2];
			}
		}
		$this->template->load_view('usergroup/create',$data);
	}
	public function edit(){
		$id=$this->uri->segment(3);
		$this->load->model("Musergroup");
		$this->load->library("form_validation");
		$this->form_validation->CI =& $this;
		if($this->input->post("btnEdit")){
			$this->form_validation->set_rules("txtName", "Name Group", "required|callback_checkname");
			if ($this->form_validation->run() == TRUE) {
			$array = glob('application/modules/*',GLOB_ONLYDIR);
			foreach ($array as $key => $value) {
				$module = explode("/", $value);
				if($module[2] != "backup" && $module[2] != "error" && $module[2] != "login" && $module[2] != "main"){
					if(array_key_exists($module[2],$this->request->post['checkbox']) == false){
						$this->request->post['checkbox'][$module[2]] = array();
					}
				}
			}
			$this->Musergroup->deletegroup($id);
			$this->request->post['checkbox'] = json_encode($this->request->post['checkbox']);
				$data_insert = array(
					"namegroup"		=> $this->request->post['txtName'],
					"permission"	=> $this->request->post['checkbox'],
				);
			$new_id = $this->Musergroup->insertgroup($data_insert);
			$data_update_id_group = array(
					"group_id"	=> $new_id
				);
			$this->load->model("Muser");
			$this->Muser->UpdateUserGroup($id,$data_update_id_group);
			$this->session->set_flashdata("flash_mess", "Đã cập nhật nhóm người dùng <strong>Thành công!</strong>");
			redirect(site_url('usergroup'));
			}
		}
		$data['info'] = $this->Musergroup->getgroupbyId($id);
		foreach ($data['info'] as $key => $value) {
			$data['info'][$key]['permission'] = json_decode($value['permission'],true);
		}
		$array = glob('application/modules/*',GLOB_ONLYDIR);
		foreach ($array as $key => $value) {
			$module = explode("/", $value);
			if($module[2] != "backup" && $module[2] != "error" && $module[2] != "login" && $module[2] != "main"){
				$data['modules'][] = $module[2];
			}
		}
		$this->template->load_view('usergroup/edit',$data);
	}
	public function delete(){
		$id=$this->input->post('case');//$this->uri->segment(3);
		if($id){
			$this->load->model('Musergroup');
			foreach ($id as $key => $value) {
				$this->Musergroup->deletegroup($value);
			}
			$this->session->set_flashdata("flash_mess", "Đã xóa nhóm người dùng <strong>Thành công!</strong>");
		}
		redirect(site_url('usergroup'));
	}
	public function search(){
		$search_name = $_POST['search_name'];
		$this->load->model('Musergroup');
		$list = $this->Musergroup->getSearchUserGroup($search_name);
		$html = '<table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info">';$html .= '<thead><tr role="row"><th><input type="checkbox" name="case[]" id="selectall" /></th><th>Tên Nhóm Thành Viên</th></tr></thead><tbody><tr class="filter"><td style="width:4%;"></td><td><input type="text" name="filter_name" style="width:100%;" /></td><td style="width:7%;"></td></tr>';if($list){foreach ($list as $key => $value) {$html .= '<tr class="gradeX ';if($key%2==0){$html .= 'odd active';}else{$html .= 'even active';}$html .= '" role="row"><td><input type="checkbox"  name="case[]" value="'.$value['id'].'"></td><td>'.$value['namegroup'].'</td><td colspan="2"><a href="<?php echo site_url(\'usergroup\'); ?>/edit/'.$value['id'].'">Sửa <i class="fa fa-edit"></i></a></td></tr>';}}else{$html .= '<tr><td colspan="4" style="text-align: center;">Chưa Có Dữ Liệu</td></tr>';}$html .= '</tbody></table>';
        echo $html;
	}
	public function checkname($groupname){
		$this->load->model('Musergroup');
		$id = $this->uri->segment(3);
		if ($this->Musergroup->checkname($groupname,$id) == FALSE) {
			$this->form_validation->set_message("checkname", "Group name is already exists!");
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
/* Location: ./application/controllers/login.php */