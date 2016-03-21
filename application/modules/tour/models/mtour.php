<?php
class Mtour extends CI_Model{
	protected $_tour = "product";
	protected $_tour_description = "product_description";
	protected $_tour_special = "product_special";

	public function __construct() {
        parent::__construct();
    }

    public function getTour($start,$limit,$filter) {
    	$this->db->select($this->_tour.'.product_id,'.$this->_tour_description.'.name,model,status,'.$this->_tour.'.price,'.$this->_tour_special.'.price as special,duration,'.$this->_tour_special.'.date_start,'.$this->_tour_special.'.date_end');
    	if($limit != 0){
			$this->db->limit($limit, $start);
		}
		if(isset($filter['model'])){
			$this->db->like('model',$filter['model']);
		}
		if(isset($filter['name'])){
			$this->db->like('name',$filter['name']);
		}
		if(isset($filter['price'])){
			$this->db->like($this->_tour.'.price',$filter['price']);
		}
		if(isset($filter['date'])){
			if($filter['date'] != '*'){
				$this->db->like('duration',$filter['date']);
			}
		}
		if(isset($filter['status'])){
			if($filter['status'] != '*'){
				$this->db->like('status',$filter['status']);
			}
		}
		$this->db->join($this->_tour_description,$this->_tour.'.product_id='.$this->_tour_description.'.product_id','left');
		$this->db->join($this->_tour_special,$this->_tour.'.product_id='.$this->_tour_special.'.product_id','left');
		$this->db->order_by($this->_tour.'.product_id','DESC'); 
		$query = $this->db->get($this->_tour);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function getTotalTour($filter){
		if(isset($filter['model'])){
			$this->db->like('model',$filter['model']);
		}
		if(isset($filter['name'])){
			$this->db->like('name',$filter['name']);
		}
		if(isset($filter['date'])){
			if($filter['date'] != '*'){
				$this->db->like('duration',$filter['date']);
			}
		}
		if(isset($filter['price'])){
			$this->db->like($this->_tour.'.price',$filter['price']);
		}
		if(isset($filter['status'])){
			if($filter['status'] != '*'){
				$this->db->like('status',$filter['status']);
			}
		}
		$this->db->join($this->_tour_description,$this->_tour.'.product_id='.$this->_tour_description.'.product_id','left');
		$this->db->join($this->_tour_special,$this->_tour.'.product_id='.$this->_tour_special.'.product_id','left');
		return $this->db->count_all_results($this->_tour);
	}
	public function getTourPriceByID($tour_id){
		$this->db->select('price');
		$this->db->where('tour_id',$tour_id);
		$this->db->where('attribute','Ngày thường');
		$this->db->join('tour_attribute', 'tour_price.attribute_id = tour_attribute.id');
		return $this->db->get($this->_tour_price)->result_array();
	}
	public function getTourSpecialByID($tour_id){
		$this->db->where('tour_id',$tour_id);
		$this->db->where('attribute !=','Ngày thường');
		$this->db->join('tour_attribute', 'tour_price.attribute_id = tour_attribute.id');
		return $this->db->get($this->_tour_price)->result_array();
	}
	public function deleteTour($tour_id){
		/*xóa tour trong bảng tour*/
		$this->db->where('tour_id', $tour_id);
		$this->db->delete($this->_tour);
		/*lấy id giá tour option*/
		$this->db->select('id');
		$this->db->where('tour_id', $tour_id);
		$tour_option_id = $this->db->get($this->_tour_option)->result_array()[0]['id'];
		/*xóa giá tour option theo id vừa lấy*/
		$this->db->where('tour_option_id',$tour_option_id);
		$this->db->delete($this->_tour_option_price);
		/*xóa tour option*/
		$this->db->where('tour_id', $tour_id);
		$this->db->delete($this->_tour_option);
		/*xóa giá tour thuộc tính*/
		$this->db->where('tour_id', $tour_id);
		$this->db->delete($this->_tour_price);
	}
	public function getSearchTour($search){
		$this->db->like('model',$search);
		$this->db->or_like('tour_code',$search);
		$this->db->or_like('name_tour',$search);
		$this->db->order_by('tour_id','DESC'); 
		$query = $this->db->get($this->_tour);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
}
?>