<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class OptionCategory extends AdminController{
    public function index(){
		$this->load->model("Moptioncategory");
		$data = array();
		$config = array();
		$filter = array();
	    if(isset($_POST['filter_name'])){
            if($_POST['filter_name'] != ""){
            	$filter['name'] = $_POST['filter_name'];
            }
	    }
        if(isset($_POST['filter_date_start'])){
            if($_POST['filter_date_start'] != ""){
                $filter['date_start'] = $_POST['filter_date_start'];
            }
        }
        if(isset($_POST['filter_date_end'])){
            if($_POST['filter_date_end'] != ""){
                $filter['date_end'] = $_POST['filter_date_end'];
            }
        }
        if(isset($_POST['filter_status'])){
            if($_POST['filter_status'] != "*"){
                $filter['status'] = $_POST['filter_status'];
            }
        }
	    $config["total_rows"] = $this->Moptioncategory->getTotalOptionCategory($filter);
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
	    $config["base_url"] = base_url()."optioncategory/index";
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
		$data['list'] = $this->Moptioncategory->getOptionCategory($page,$config["per_page"],$filter);
		$data['filter'] = $filter;
		$data['mess'] = $this->session->flashdata("flash_mess");
		$this->template->load_view('optioncategory/index',$data);
    }
    public function create(){
        if($this->input->post("btnOK")){
            $data_insert = array(
                "name"      => $this->input->post("txtName"),
                "date_start"=> date('Y-m-d',strtotime($this->input->post("txtDateStart"))),
                "date_end"  => date('Y-m-d',strtotime($this->input->post("txtDateEnd"))),
                "status"    => $this->input->post('txtStatus')
            );
            $this->load->model("Moptioncategory");
            $this->Moptioncategory->insertOptionCategory($data_insert);
            $this->session->set_flashdata("flash_mess", "Đã thêm Danh Mục Tùy Chọn <strong>Thành công!</strong>");
            redirect(site_url('optioncategory'));
        }
        $this->template->load_view('optioncategory/create');
    }
    public function edit(){
        $data = array();
        $id = $this->uri->segment(3);
        if($this->input->post("btnOK")){
            $data_update = array(
                "name"      => $this->input->post("txtName"),
                "date_start"=> date('Y-m-d',strtotime($this->input->post("txtDateStart"))),
                "date_end"=> date('Y-m-d',strtotime($this->input->post("txtDateEnd"))),
                "status"    => $this->input->post('txtStatus')
            );
            $this->load->model('Moptioncategory');
            $this->Moptioncategory->updateOptionCategory($id,$data_update);
            $this->session->set_flashdata("flash_mess", "Đã Cập Nhật Danh Mục Tùy Chọn <strong>Thành công!</strong>");
            redirect(site_url('optioncategory'));
        }
        $this->load->model('Moptioncategory');
        $data['info'] = $this->Moptioncategory->getOptionCategoryByID($id);
        $this->template->load_view('optioncategory/edit',$data);
    }
    public function delete(){
        $id=$this->input->post('case');
        if($id){
            $this->load->model('Moptioncategory');
            foreach ($id as $key => $value) {
                    $this->Moptioncategory->deleteOptionCategory($value);
            }
            $this->session->set_flashdata("flash_mess", "Đã Xóa Tin <strong>Thành công!</strong>");
        }
        redirect(site_url('optioncategory'));
    }
    public function search(){
        $search_name = $_POST['search_name'];
        $this->load->model("Moptioncategory");
        $list = $this->Moptioncategory->getSearchOptionCategory($search_name);
        $html = '<table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info"><thead><tr role="row"><th><input type="checkbox" name="case[]" id="selectall" /></th><th>Loại Tùy Chọn</th><th>Ngày Bắt Đầu</th><th>Ngày Kết Thúc</th><th>Thao tác</th></tr></thead><tbody><tr class="filter"><td style="width:4%;"></td><td><input type="text" name="filter_name" value="" style="width:100%;" /></td><td style="width:12%;"></td><td style="width:13%;"></td><td><select name="filter_status"><option value="*"></option><option value="1">Bật</option><option value="0">Tắt</option></select></td><td style="width:9%;"></td></tr>';if($list) { foreach ($list as $key => $value) { $html .= '<tr class="gradeX'; if($key%2==0){$html .='odd active';}else{$html .= 'even active';} $html .= '" role="row"><td><input type="checkbox" id="check"  name="case[]" value="'.$value['option_category_id'].'"></td><td>'.$value['name'].'</td><td>'.$value['date_start'].'</td><td>'.$value['date_end'].'</td><td>';if($value['status'] == 1){$html .= "Bật";}else{$html .= "Tắt";} $html .= '</td><td style="text-align: center;"><a href="'.site_url('optioncategory').'/edit/'.$value['option_category_id'].'">Sửa <i class="fa fa-edit"></i></a></td></tr>';}}else{$html .= '<tr><td colspan="5" style="text-align: center;">Chưa Có Dữ Liệu</td></tr>';}$html .= '</tbody></table>';
        echo $html;
    }
}
?>