<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tour extends AdminController{
	public function index(){
	$this->load->model("Mtour");
	$data = array();
	$config = array();
	$filter = array();
        if(isset($_POST['filter_model'])){
        	$filter['model'] = $_POST['filter_model'];
        }
        if(isset($_POST['filter_name'])){
        	$filter['name'] = $_POST['filter_name'];
        }
        if(isset($_POST['filter_date'])){
        	$filter['date'] = $_POST['filter_date'];
        }
        if(isset($_POST['filter_price'])){
                $filter['price'] = $_POST['filter_price'];
        }
        if(isset($_POST['filter_status'])){
        	$filter['status'] = $_POST['filter_status'];
        }
        $config["total_rows"] = $this->Mtour->getTotalTour($filter);
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
        $config["base_url"] = base_url()."tour/index";
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
	$data['list'] = $this->Mtour->getTour($page,$config["per_page"],$filter);
	$data['filter'] = $filter;
	$data['mess'] = $this->session->flashdata("flash_mess");
	$this->template->load_view('tour/index',$data);
	}
	public function create(){
	$data = array();
     $this->load->library("form_validation");
     $this->form_validation->CI =& $this; // Muốn sử dụng hàm callback thì phải khai báo cái này
     if($this->input->post("btnOK")){
           //Xét các luật
           $this->form_validation->set_rules("txtName", "Tên Thuộc Tính", "required");
           $this->form_validation->set_rules("txtDateStart", "Ngày Bắt Đầu", "required");
           $this->form_validation->set_rules("txtDateEnd", "Ngày Kết Thúc", "required");
           $this->form_validation->set_rules("txtOrder", "Thứ Tự", "required");
           if ($this->form_validation->run() == TRUE) {
                   $data_insert = array(
                           "attribute"      => $this->input->post("txtName"),
                           "start_holiday"  => $this->input->post("txtDateStart"),
                           "end_holiday"    => $this->input->post("txtDateEnd"),
                           "sort_oder"      => $this->input->post("txtOrder"),
                           "status"         => $this->input->post("txtStatus")
                   );
                   $this->load->model('Mtourattribute');
                   $this->Mtourattribute->insertTourAttribute($data_insert);
                   $this->session->set_flashdata("flash_mess", "Đã thêm Thuộc Tính Tour <strong>Thành công!</strong>");
                   redirect(site_url('tourattribute'));
           }
     }
     $this->load->model('policy/Mpolicy');
     $data['policy'] = $this->Mpolicy->getAllPolicy();
	$this->template->load_view('tour/create',$data);
     }
	public function delete(){
		$id=$this->input->post('case');
		if($id){
			$this->load->model('Mtour');
			foreach ($id as $key => $value) {
				$this->Mtour->deleteTour($value);
			}
			$this->session->set_flashdata("flash_mess", "Đã Xóa Tin <strong>Thành công!</strong>");
		}
		redirect(site_url('tour'));
	}
	public function search(){
		$search_name = $_POST['search_name'];
		$this->load->model('Mtour');
		$list = $this->Mtour->getSearchTour($search_name);
		date_default_timezone_set('Asia/Ho_Chi_Minh'); 
		if($list){
			foreach ($list as $key => $value) {
				$price = $this->Mtour->getTourPriceByID($value['tour_id']);
				if($price){
					$list[$key]['price'] = $price[0]['price'];
				}
				$attribute = $this->Mtour->getTourSpecialByID($value['tour_id']);
				foreach ($attribute as $keyAttri => $valueAttri) {
					if($valueAttri['status'] == 1){
						$not_holiday = explode(',', $valueAttri['not_holiday']);
						if($valueAttri['start_holiday'] <= date('Y-m-d') && $valueAttri['end_holiday'] >= date('Y-m-d') && in_array(date('Y-m-d'),$not_holiday) == false){
							$list[$key]['special'] = $attribute[0]['price'];
						}
					}
				}
			}
		}
		$html = '<table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info"><thead><tr role="row"><th><input type="checkbox" name="case[]" id="selectall" /></th><th>Model</th><th>Tên Tour</th><th>Tour Code</th><th>Thời gian</th><th>Giá</th><th>Trạng thái</th><th>Thao tác</th></tr></thead><tbody>';if($list) {foreach ($list as $key => $value) { $html .= '<tr class="gradeX';if($key%2==0){$html .='odd active';}else{$html .= 'even active';}$html .= '" role="row"><td><input type="checkbox" id="check"  name="case[]" value="'.$value['tour_id'].'"></td><td>'.$value['model'].'</td><td>'.$value['name_tour'].'</td><td>'.$value['tour_code'].'</td><td>'.$value['duration'].'</td><td>';if(isset($value['special'])){$html .= '<p style="text-decoration: line-through;">';if(isset($value['price'])){$html .= $value['price'];}$html .='</p><p style="color:red;">'.$value['special'].'</p>';}else{ if(isset($value['price'])){$html .= $value['price'];}}$html .= '</td><td>';if($value['status'] == 0){$html .= "Tắt";}else{$html .= "Bật";}$html .= '</td><td style="text-align: center;"><a href="'.site_url('tour').'/edit/'.$value['tour_id'].'">Sửa <i class="fa fa-edit"></i></a></td></tr>';}}else{$html .= '<tr><td colspan="8" style="text-align: center;">Chưa Có Dữ Liệu</td></tr>';}$html .= '</tbody></table>';
        echo $html;
	}
}
?>