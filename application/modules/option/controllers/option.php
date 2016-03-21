<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Option extends AdminController{
    public function index(){
		$this->load->model("Moption");
        $this->load->model("optioncategory/Moptioncategory");
        $this->load->model("optionclass/Moptionclass");
		$data = array();
		$config = array();
		$filter = array();
	    if(isset($_POST['filter_name'])){
            if($_POST['filter_name'] != ""){
            	$filter['name'] = $_POST['filter_name'];
            }
	    }
	    if(isset($_POST['filter_class'])){
            if($_POST['filter_class'] != "*"){
            	$filter['class'] = $_POST['filter_class'];
            }
	    }
        if(isset($_POST['filter_category'])){
            if($_POST['filter_category'] != "*"){
                $filter['category'] = $_POST['filter_category'];
            }
        }
	    $config["total_rows"] = $this->Moption->getTotalOption($filter);
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
	    $config["base_url"] = base_url()."option/index";
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
		$data['list'] = $this->Moption->getOption($page,$config["per_page"],$filter);
        $data['list_category'] = $this->Moptioncategory->getOptionCategory(0,0,array());
        $data['list_class'] = $this->Moptionclass->getOptionClass(0,0,array());
		$data['filter'] = $filter;
		$data['mess'] = $this->session->flashdata("flash_mess");
        $this->template->load_view('option/index',$data);
    }
    public function create(){
        $data = array();
        $this->load->model("option/Moption");
        $this->load->model("tourattributegroup/Mtourattributegroup");
        $this->load->model("optioncategory/Moptioncategory");
        $this->load->model("optionclass/Moptionclass");
        $this->load->library("form_validation");
        $this->form_validation->CI =& $this; // Muốn sử dụng hàm callback thì phải khai báo cái này
        if($this->input->post("btnOK")){
            $insertOption = array(
            'type'  =>'checkbox',
            'category'  =>$this->input->post("txtCategory"),
            'sort_order'    =>$this->input->post("txtOrder"),
            'class'     =>$this->input->post("txtClass"),
            );
            $id_option =  $this->Moption->insertOption($insertOption);
            $insertDesOption    =   array(
                'option_id' => $id_option,
                'language_id'   => 2,
                'name'  => $this->input->post('txtName'),
                );
            $this->Moption->insertDesOption($insertDesOption);
            foreach ($this->input->post('option_value') as $key => $value) {
                $insertValue = array(
                    'option_id' =>$id_option,
                    'image' =>  'no_image.jpg',
                    'sort_order'    =>$value['sort_order']
                );
                $id_value = $this->Moption->insertOptionVal($insertValue);
                $insertDesValue = array(
                    'option_value_id'   =>$id_value,
                    'language_id'   =>2,
                    'option_id' =>$id_option,
                    'name'  =>$value['option_value_description']
                );
                $this->Moption->insertDesOptionVal($insertDesValue);
            }
            
           $this->session->set_flashdata("flash_mess", "Đã thêm Thuộc Tính Tour <strong>Thành công!</strong>");
           redirect(site_url('option'));
        }
        $data['list_category'] = $this->Moptioncategory->getOptionCategory(0,0,array());
        $data['list_class'] = $this->Moptionclass->getOptionClass(0,0,array());
        $this->template->load_view('option/create',$data);
    }
    public function edit(){
        $this->load->model("option/Moption");
        $this->load->model("tourattributegroup/Mtourattributegroup");
        $this->load->model("optioncategory/Moptioncategory");
        $this->load->model("optionclass/Moptionclass");
        $data = array();
        $id = $this->uri->segment(3);
        $this->load->library("form_validation");
        $this->form_validation->CI =& $this; // Muốn sử dụng hàm callback thì phải khai báo cái này
        if($this->input->post("btnOK")){
            $this->Moption->deleteOption($id);
            $insertOption = array(
                'type'  =>'checkbox',
                'category'  =>$this->input->post("txtCategory"),
                'sort_order'    =>$this->input->post("txtOrder"),
                'class'     =>$this->input->post("txtClass"),
            );
            $id_option =  $this->Moption->insertOption($insertOption);
            $insertDesOption    =   array(
                'option_id' => $id_option,
                'language_id'   => 2,
                'name'  => $this->input->post('txtName'),
                );
            $this->Moption->insertDesOption($insertDesOption);
            foreach ($this->input->post('option_value') as $key => $value) {
                $insertValue = array(
                    'option_id' =>$id_option,
                    'image' =>  'no_image.jpg',
                    'sort_order'    =>$value['sort_order']
                );
                $id_value = $this->Moption->insertOptionVal($insertValue);
                $insertDesValue = array(
                    'option_value_id'   =>$id_value,
                    'language_id'   =>2,
                    'option_id' =>$id_option,
                    'name'  =>$value['option_value_description']
                );
                $this->Moption->insertDesOptionVal($insertDesValue);
            }
            $this->session->set_flashdata("flash_mess", "Đã thêm Thuộc Tính Tour <strong>Thành công!</strong>");
            redirect(site_url('option'));
        }
        
        if ($this->Moption->getOptionByID($id)) {
            $data['list'] =  $this->Moption->getOptionByID($id);
            $data['list_value'] =  $this->Moption->getOptionValueByID($id);
            $data['list_category'] = $this->Moptioncategory->getOptionCategory(0,0,array());
            $data['list_class'] = $this->Moptionclass->getOptionClass(0,0,array());
            $this->template->load_view('option/edit',$data);
        }else{
            $this->session->set_flashdata("flash_mess", "Không tồn tại id: <strong>$id!</strong>");
            redirect(site_url('option'));
        }
        
    }
    public function delete(){
        $id=$this->input->post('case');
        if($id){
                $this->load->model('Moption');
                foreach ($id as $key => $value) {
                        $this->Moption->deleteOption($value);
                }
                $this->session->set_flashdata("flash_mess", "Đã Xóa Tin <strong>Thành công!</strong>");
        }
        redirect(site_url('option'));
    }
    public function search(){
        $search_name = $_POST['search_name'];
        $this->load->model("Moption");
        $list = $this->Moption->getSearchOption($search_name);
        $this->load->model("optioncategory/Moptioncategory");
        $list_category = $this->Moptioncategory->getOptionCategory(0,0,array());
        $this->load->model("optionclass/Moptionclass");
        $list_class = $this->Moptionclass->getOptionClass(0,0,array());
        $html = '<table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info"><thead><tr role="row"><th><input type="checkbox" name="case[]" id="selectall" /></th><th>Loại Tùy Chọn</th><th>Thứ Tự</th><th>Danh Mục</th><th>Lớp</th><th>Thao tác</th></tr></thead><tbody><tr class="filter"><td style="width:4%;"></td><td><input type="text" name="filter_name" value="" style="width:100%;" /></td><td style="width:7%;"></td><td><select name="filter_category"><option value="*"></option>';if(isset($list_category)){foreach ($list_category as $value) {$html .= '<option value="'.$value['option_category_id'].'">'.$value['name'].'</option>';}}$html .= '</select></td><td><select name="filter_class"><option value="*"></option>';if(isset($list_class)){foreach ($list_class as $value) {$html .= '<option value="'.$value['option_class_id'].'">'.$value['name'].'</option>';}}$html .='</select></td><td style="width:7%;"></td></tr>';if($list) {foreach ($list as $key => $value) {$html .= '<tr class="gradeX';if($key%2==0){$html .='odd active';}else{$html .='even active';} $html .='" role="row"><td><input type="checkbox" id="check"  name="case[]" value="'.$value['option_id'].'"></td><td>'.$value['name'].'</td><td>'.$value['sort_order'].'</td><td>'.$value['category'].'</td><td>'.$value['class'].'</td><td style="text-align: center;"><a href="'.site_url('option').'/edit/'.$value['option_id'].'">Sửa <i class="fa fa-edit"></i></a></td></tr>';}}else{$html .= '<tr><td colspan="6" style="text-align: center;">Chưa Có Dữ Liệu</td></tr>'; }$html .= '</tbody></table>';
        echo $html;
    }
}
?>