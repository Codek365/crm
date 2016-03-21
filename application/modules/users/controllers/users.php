<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends AdminController{
	public function index(){
		$this->load->model("Muser");
		$this->load->model("usergroup/Musergroup");
		$data = array();
		$config = array();
		$filter = array();
        if(isset($_POST['filter_name'])){
        	$filter['name'] = $_POST['filter_name'];
        }
        if(isset($_POST['filter_group'])){
        	$filter['group'] = $_POST['filter_group'];
        }
        $config["total_rows"] = $this->Muser->getTotalUsers($filter);
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
        $config["base_url"] = base_url()."users/index";
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
		$data['list'] = $this->Muser->getall($page,$config["per_page"],$filter);
		$data['filter'] = $filter;
		$data['mess'] = $this->session->flashdata("flash_mess");
		$this->template->load_view('users/index',$data);
	}
	public function create(){
		$data = array();
		$this->load->library("form_validation");
		$this->form_validation->CI =& $this; // Muốn sử dụng hàm callback thì phải khai báo cái này
		if($this->input->post("btnOK")){
			//Xét các luật
			$this->form_validation->set_rules("txtfirstName", "Họ", "required");
			$this->form_validation->set_rules("txtlastName", "Tên", "required");
			$this->form_validation->set_rules("txtEmail", "Email", "required|valid_email");
			$this->form_validation->set_rules("txtPhone", "Phone", "required|numeric");
			$this->form_validation->set_rules("txtNameDisplay", "Tên Hiển Thị", "required");
			$this->form_validation->set_rules("txtUser", "Tài Khoản", "required|callback_check_user");
			$this->form_validation->set_rules("txtPass", "Mật Khẩu", "required|matches[txtPass2]");
			if ($this->form_validation->run() == TRUE) {
				$data_insert = array(
					"firstname"		=> $this->input->post("txtfirstName"),
					"lastname"		=> $this->input->post("txtlastName"),
					"email"			=> $this->input->post("txtEmail"),
					"phone"			=> $this->input->post("txtPhone"),
					"name_display"	=> $this->input->post("txtNameDisplay"),
					"username"		=> $this->input->post("txtUser"),
					"password"		=> md5($this->input->post("txtPass")),
					"group_id"		=> $this->input->post("txtGroup"),
					"status"		=> $this->input->post("txtStatus"),
					"date_added"	=> date('Y-m-d m:i:s')
				);
				$this->load->model('Muser');
                $this->Muser->insertUser($data_insert); // insert new user
                $this->session->set_flashdata("flash_mess", "Đã thêm Nhân Viên <strong>Thành công!</strong>");
				redirect(site_url('users'));
			}
		}
		$this->load->model("usergroup/Musergroup");
		$data['listgroup'] = $this->Musergroup->getall(0,0,array());
		$this->template->load_view('users/create',$data);
	}
    public function TableEmailReceive($arr_table){
        foreach($arr_table as $items){
            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'date' => array(
                    'type' => 'datetime',
                    'null' => TRUE,
                ),
                'from_email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'to' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'subject' => array(
                    'type' => 'TEXT',
                    'null' => TRUE
                ),
                'body' => array(
                    'type' => 'TEXT',
                    'null' => TRUE
                ),
                'attach' => array(
                    'type' => 'TEXT',
                    'null' => TRUE
                ),
                'read' => array(
                    'type' => 'INT',
                    'null' => TRUE
                ),
                'transfer' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'null' => TRUE
                ),
                'start' => array(
                    'type' => 'INT',
                    'constraint' => '1',
                    'null' => TRUE
                ),
                'status' => array(
                    'type' => 'INT',
                    'constraint' => 2,
                    'null' => TRUE
                ),
            );

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table($items['table'], TRUE);
        }

    }
    public function TableEmailSend($table_send){
        $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'int',
                'constraint' => 11,
            ),
            'date' => array(
                'type' => 'datetime',
            ),
            'email_to' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'email_cc' => array(
                'type' =>'TEXT',
                'null' => TRUE
            ),
            'subject' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'content' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'attach_file' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'transfer' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'start' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => TRUE
            ),
            'status' => array(
                'type' => 'int',
                'constraint' => 1,
            )
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table($table_send, TRUE);
    }
	public function edit(){
		$id=$this->uri->segment(3);
		$this->load->model("Muser");
		$data['info'] = $this->Muser->getUserbyId($id)[0];
		$this->load->library("form_validation");
		$this->form_validation->CI =& $this; // Muốn sử dụng hàm callback thì phải khai báo cái này
		if($this->input->post("btnEdit")){
			$this->form_validation->set_rules("txtfirstName", "Họ", "required");
			$this->form_validation->set_rules("txtlastName", "Tên", "required");
			$this->form_validation->set_rules("txtEmail", "Email", "required|valid_email");
			$this->form_validation->set_rules("txtPhone", "Phone", "required|numeric");
			$this->form_validation->set_rules("txtNameDisplay", "Tên Hiển Thị", "required");
			$this->form_validation->set_rules("txtUser", "Tài Khoản", "required|callback_check_user");
			$this->form_validation->set_rules("txtPass", "Mật Khẩu", "matches[txtPass2]");
			if ($this->form_validation->run() == TRUE) {
				if($this->input->post("txtPass") != ''){
					$pass = md5($this->input->post("txtPass"));
				}else{
					$pass = $data['info']['password'];
				}
				$data_insert = array(
					"firstname"		=> $this->input->post("txtfirstName"),
					"lastname"		=> $this->input->post("txtlastName"),
					"email"			=> $this->input->post("txtEmail"),
					"phone"			=> $this->input->post("txtPhone"),
					"name_display"	=> $this->input->post("txtNameDisplay"),
					"username"		=> $this->input->post("txtUser"),
					"password"		=> $pass,
					"group_id"		=> $this->input->post("txtGroup"),
					"status"		=> $this->input->post("txtStatus"),
					"date_added"	=> date('Y-m-d m:i:s')
				);
				$this->Muser->updateUser($id,$data_insert);
				$this->session->set_flashdata("flash_mess", "Đã cập nhật thông tin nhân viên <strong>Thành công!</strong>");
				redirect(site_url('users'));
			}
		}
		$this->load->model("usergroup/Musergroup");
		$data['listgroup'] = $this->Musergroup->getall(0,0,array());
		$this->template->load_view('users/edit',$data);
	}
	public function delete(){
		$id=$this->input->post('case');//$this->uri->segment(3);
		if($id){
			$this->load->model('Muser');
			foreach ($id as $key => $value) {
				$this->Muser->deleteUser($value);
			}
			$this->session->set_flashdata("flash_mess", "Đã xóa nhân viên <strong>Thành công!</strong>");
		}
		redirect(site_url('users'));
	}
	//Kiểm tra sự tồn tại của user
	public function check_user($user) {
		$this->load->model('Muser');
		$id = $this->uri->segment(3);
		if ($this->Muser->checkUsername($user,$id) == FALSE) {
			$this->form_validation->set_message("check_user", "Tên đăng nhập đã tồn tại, vui lòng thử lại.");
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function search(){
		$search_name = $_POST['search_name'];
		$this->load->model("Muser");
		$this->load->model("usergroup/Musergroup");
		$list = $this->Muser->getSearchUsers($search_name);
		$html = '<table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info"><thead><tr role="row"><th><input type="checkbox" name="case[]" id="selectall" /></th><th>Tên Thành Viên</th><th>Nhóm Thành Viên</th><th>Thao Tác</th></tr></thead><tbody><tr class="filter"><td style="width:4%;"></td><td><input type="text" name="filter_name" style="width:100%;" /></td><td><input type="text" name="filter_group" style="width:100%;" /></td><td style="width:7%;"></td></tr>';if($list){foreach ($list as $key => $value) { $html .= '<tr class="gradeX ';if($key%2==0){$html .= 'odd active';}else{$html .='even active';} $html .= '" role="row"><td><input type="checkbox" id="check"  name="case[]" value="'.$value['user_id'].'"></td><td>'.$value['username'].'</td><td>'.$value['namegroup'].'</td><td style="text-align: center;"><a href="'.site_url('users').'/edit/'.$value['user_id'].'">Sửa <i class="fa fa-edit"></i></a></td></tr>';}}else{ $html .= '<tr><td colspan="4" style="text-align: center;">Chưa Có Dữ Liệu</td></tr>';}$html .= '</tbody></table>';
        echo $html;
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */