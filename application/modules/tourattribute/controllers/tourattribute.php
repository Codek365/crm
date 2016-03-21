<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TourAttribute extends AdminController{
    public function index(){
		$this->load->model("Mtourattribute");
		$data = array();
		$config = array();
		$filter = array();
	    if(isset($_POST['filter_attribute'])){
            if($_POST['filter_attribute'] != ""){
            	$filter['attribute'] = $_POST['filter_attribute'];
            }
	    }
	    if(isset($_POST['filter_name_group'])){
            if($_POST['filter_name_group'] != ""){
            	$filter['name_group'] = $_POST['filter_name_group'];
            }
	    }
	    $config["total_rows"] = $this->Mtourattribute->getTotalTour($filter);
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
	    $config["base_url"] = base_url()."tourattribute/index";
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
		$data['list'] = $this->Mtourattribute->getTourAttribute($page,$config["per_page"],$filter);
		$data['filter'] = $filter;
		$data['mess'] = $this->session->flashdata("flash_mess");
		$this->template->load_view('tourattribute/index',$data);
    }
    public function create(){
        $data = array();
        $this->load->library("form_validation");
        $this->form_validation->CI =& $this; // Muốn sử dụng hàm callback thì phải khai báo cái này
        if($this->input->post("btnOK")){
                //Xét các luật
                $this->form_validation->set_rules("txtName", "Tên Thuộc Tính", "required");
                $this->form_validation->set_rules("txtOrder", "Thứ Tự", "required");
                if ($this->form_validation->run() == TRUE) {
                        $data_insert = array(
                            "attribute_group_id"  => $this->input->post("txtAttributeGroup"),
                            "sort_order"      => $this->input->post("txtOrder")
                        );
                        $this->load->model("Mtourattribute");
                        $id = $this->Mtourattribute->insertTourAttribute($data_insert);
                        $data_insert_description = array(
                            "attribute_id"      => $id,
                            "language_id"       => '2',
                            "name"              => $this->input->post("txtName")
                        );
                        $this->Mtourattribute->insertTourAttributeDescription($data_insert_description);
                        $this->session->set_flashdata("flash_mess", "Đã thêm Thuộc Tính Tour <strong>Thành công!</strong>");
                        redirect(site_url('tourattribute'));
                }
        }
        $this->load->model("tourattributegroup/Mtourattributegroup");
        $data['list'] = $this->Mtourattributegroup->getTourAttributeGroup(0,0,array());
        $this->template->load_view('tourattribute/create',$data);
    }
    public function edit(){
        $data = array();
        $id = $this->uri->segment(3);
        $this->load->library("form_validation");
        $this->form_validation->CI =& $this; // Muốn sử dụng hàm callback thì phải khai báo cái này
        if($this->input->post("btnOK")){
                //Xét các luật
                $this->form_validation->set_rules("txtName", "Tên Thuộc Tính", "required");
                $this->form_validation->set_rules("txtOrder", "Thứ Tự", "required");
                if ($this->form_validation->run() == TRUE) {
                        $data_update = array(
                            "sort_oder"      => $this->input->post("txtOrder")
                        );
                        $data_update_description = array(
                            "name"  => $this->input->post("txtName")
                        );
                        $this->load->model('Mtourattribute');
                        $this->Mtourattribute->updateTourAttribute($id,$data_update);
                        $this->Mtourattribute->updateTourAttributeDescription($id,$data_update_description);
                        $this->session->set_flashdata("flash_mess", "Đã Cập Nhật Thuộc Tính Tour <strong>Thành công!</strong>");
                        redirect(site_url('tourattribute'));
                }
        }
        $this->load->model('Mtourattribute');
        $this->load->model("tourattributegroup/Mtourattributegroup");
        $data['list'] = $this->Mtourattributegroup->getTourAttributeGroup(0,0,array());
        $data['attribute'] = $this->Mtourattribute->getTourAttributeByID($id);
        $this->template->load_view('tourattribute/edit',$data);
    }
    public function delete(){
        $id=$this->input->post('case');
        if($id){
                $this->load->model('Mtourattribute');
                foreach ($id as $key => $value) {
                        $this->Mtourattribute->deleteTourAttribute($value);
                }
                $this->session->set_flashdata("flash_mess", "Đã Xóa Tin <strong>Thành công!</strong>");
        }
        redirect(site_url('tourattribute'));
    }
    public function search(){
        $search_name = $_POST['search_name'];
        $this->load->model("Mtourattribute");
        $list = $this->Mtourattribute->getSearchTourAttribute($search_name);
        $html = '<table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info"><thead><tr role="row"><th><input type="checkbox" name="case[]" id="selectall" /></th><th>Thuộc Tính</th><th>Nhóm Thuộc Tính</th><th>Thứ Tự</th><th>Thao tác</th></tr></thead><tbody><tr class="filter"><td style="width:4%;"></td><td><input type="text" name="filter_attribute" value="';if(isset($filter['attribute'])){$html .= $filter['attribute'];}$html .= '" style="width:100%;" /></td><td><input type="text" value="'; if(isset($filter['name_group'])){$html .= $filter['name_group'];} $html .='" id="dp1" name="filter_name_group" style="width:100%;" /></td><td></td><td style="width:7%;"></td></tr>'; if($list) {foreach ($list as $key => $value) { $html .= '<tr class="gradeX';if($key%2==0){$html .= 'odd active';}else{$html .= 'even active';}$html .= '" role="row"><td><input type="checkbox" id="check"  name="case[]" value="'.$value['attribute_id'].'"></td><td>'.$value['name'].'</td><td>'.$value['name_group'].'</td><td>'.$value['sort_order'].'</td><td style="text-align: center;"><a href="'.site_url('tourattribute').'/edit/'.$value['attribute_id'].'">Sửa <i class="fa fa-edit"></i></a></td></tr>';}}else{$html .= '<tr><td colspan="5" style="text-align: center;">Chưa Có Dữ Liệu</td></tr>';}$html .= '</tbody></table>';
        echo $html;
    }
}
?>