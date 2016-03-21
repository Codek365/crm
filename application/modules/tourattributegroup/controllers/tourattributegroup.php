<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TourAttributeGroup extends AdminController{
	public function index(){
		$this->load->model("Mtourattributegroup");
		$data = array();
		$config = array();
		$filter = array();
	    if(isset($_POST['filter_name'])){
            if($_POST['filter_name'] != ""){
            	$filter['name'] = $_POST['filter_name'];
            }
	    }
	    $config["total_rows"] = $this->Mtourattributegroup->getTotalTourAttributeGroup($filter);
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
	    $config["base_url"] = base_url()."tourattributegroup/index";
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
		$data['list'] = $this->Mtourattributegroup->getTourAttributeGroup($page,$config["per_page"],$filter);
		$data['filter'] = $filter;
		$data['mess'] = $this->session->flashdata("flash_mess");
		$this->template->load_view('tourattributegroup/index',$data);
	}
	public function create(){
        $data = array();
        $this->load->library("form_validation");
        $this->form_validation->CI =& $this; // Muốn sử dụng hàm callback thì phải khai báo cái này
        if($this->input->post("btnOK")){
                //Xét các luật
                $this->form_validation->set_rules("txtName", "Tên Nhóm Thuộc Tính", "required");
                $this->form_validation->set_rules("txtOrder", "Thứ Tự", "required");
                if ($this->form_validation->run() == TRUE) {
                        $data_insert = array(
                            "sort_order"      => $this->input->post("txtOrder")
                        );
                        $this->load->model("Mtourattributegroup");
                        $id = $this->Mtourattributegroup->insertTourAttributeGroup($data_insert);
                        $data_insert_description = array(
                            "attribute_group_id"        => $id,
                            "language_id"       		=> '2',
                            "name"              		=> $this->input->post("txtName")
                        );
                        $this->Mtourattributegroup->insertTourAttributeGroupDescription($data_insert_description);
                        $this->session->set_flashdata("flash_mess", "Đã Thêm Nhóm Thuộc Tính Tour <strong>Thành công!</strong>");
                        redirect(site_url('tourattributegroup'));
                }
        }
        $this->template->load_view('tourattributegroup/create',$data);
    }
    public function edit(){
        $data = array();
        $id = $this->uri->segment(3);
        $this->load->library("form_validation");
        $this->form_validation->CI =& $this; // Muốn sử dụng hàm callback thì phải khai báo cái này
        if($this->input->post("btnOK")){
                //Xét các luật
                $this->form_validation->set_rules("txtName", "Tên Nhóm Thuộc Tính", "required");
                $this->form_validation->set_rules("txtOrder", "Thứ Tự", "required");
                if ($this->form_validation->run() == TRUE) {
                        $data_update = array(
                            "sort_order"	=> $this->input->post("txtOrder")
                        );
                        $this->load->model("Mtourattributegroup");
                      	$this->Mtourattributegroup->updateTourAttributeGroup($id,$data_update);
                        $data_update_description = array(
                            "name"	=> $this->input->post("txtName")
                        );
                        $this->Mtourattributegroup->updateTourAttributeGroupDescription($id,$data_update_description);
                        $this->session->set_flashdata("flash_mess", "Đã Cập Nhật Nhóm Thuộc Tính Tour <strong>Thành công!</strong>");
                        redirect(site_url('tourattributegroup'));
                }
        }
        $this->load->model("Mtourattributegroup");
        $data['attribute_group'] = $this->Mtourattributegroup->getTourAttributeGroupByID($id);
        $this->template->load_view('tourattributegroup/edit',$data);
    }
    public function delete(){
    	$id=$this->input->post('case');
        if($id){
                $this->load->model('Mtourattributegroup');
                foreach ($id as $key => $value) {
                        $this->Mtourattributegroup->deleteTourAttributeGroup($value);
                }
                $this->session->set_flashdata("flash_mess", "Đã Xóa Tin <strong>Thành công!</strong>");
        }
        redirect(site_url('tourattributegroup'));
    }
	public function search(){
		$search_name = $_POST['search_name'];
        $this->load->model("Mtourattributegroup");
        $list = $this->Mtourattributegroup->getTourSearch($search_name);
        $html = '<table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info"><thead><tr role="row"><th><input type="checkbox" name="case[]" id="selectall" /></th><th>Nhóm Thuộc Tính</th><th>Thứ Tự</th><th>Thao tác</th></tr></thead><tbody><tr class="filter"><td style="width:4%;"></td><td><input type="text" name="filter_name" value="';if(isset($filter['name'])){$html .= $filter['name'];}$html .= '" style="width:100%;" /></td><td></td><td style="width:7%;"></td></tr>';if($list) {foreach ($list as $key => $value) {$html .= '<tr class="gradeX';if($key%2==0){$html .= 'odd active';}else{$html .= 'even active';} $html .= '" role="row"><td><input type="checkbox" id="check"  name="case[]" value="'.$value['attribute_group_id'].'"></td><td>'.$value['name'].'</td><td>'.$value['sort_order'].'</td><td style="text-align: center;"><a href="'.site_url('tourattributegroup').'/edit/'.$value['attribute_group_id'].'">Sửa <i class="fa fa-edit"></i></a></td></tr>';}}else{$html .= '<tr><td colspan="4" style="text-align: center;">Chưa Có Dữ Liệu</td></tr>'; } $html .= '</tbody></table>';
        echo $html;
	}
}
?>