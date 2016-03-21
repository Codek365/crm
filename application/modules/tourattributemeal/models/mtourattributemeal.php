<?php
class Mtourattributemeal extends CI_Model{
	protected $_attribute_meal = "attribute_meal";
	protected $_attribute_meal_description = "attribute_meal_description";

	public function __construct() {
        parent::__construct();
    }
    public function getTourAttributeMeal($start,$limit,$filter) {
    	$this->db->select($this->_attribute_meal.'.attribute_meal_id,name,sort_order');
    	if($limit != 0){
			$this->db->limit($limit, $start);
		}
		if(isset($filter['name'])){
			$this->db->like($this->_attribute_meal_description.'.name',$filter['name']);
		}
		$this->db->join($this->_attribute_meal_description,$this->_attribute_meal.'.attribute_meal_id='.$this->_attribute_meal_description.'.attribute_meal_id');
		$this->db->order_by($this->_attribute_meal.'.attribute_meal_id','DESC');
		$query = $this->db->get($this->_attribute_meal);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
    }
    public function getTotalTourAttributeMeal($filter){
		if(isset($filter['name'])){
			$this->db->like($this->_attribute_meal_description.'.name',$filter['name']);
		}
		$this->db->join($this->_attribute_meal_description,$this->_attribute_meal.'.attribute_meal_id='.$this->_attribute_meal_description.'.attribute_meal_id');
		return $this->db->count_all_results($this->_attribute_meal);
	}
	public function insertTourAttributeMeal($data){
		$this->db->insert($this->_attribute_meal,$data);
		return $this->db->insert_id();
	}
	public function insertTourAttributeMealDescription($data){
		$this->db->insert($this->_attribute_meal_description,$data);
		return $this->db->insert_id();
	}
	public function deleteTourAttributeMeal($id){
		/*xóa tour trong bảng tour Attribute Group*/
		$this->db->where('attribute_meal_id', $id);
		$this->db->delete($this->_attribute_meal);
		/*xóa giá tour liên quan*/
		$this->db->where('attribute_meal_id',$id);
		$this->db->delete($this->_attribute_meal_description);
	}
	public function getTourAttributeMealByID($id){
		$this->db->where($this->_attribute_meal.'.attribute_meal_id',$id);
		$this->db->join($this->_attribute_meal_description,$this->_attribute_meal.'.attribute_meal_id='.$this->_attribute_meal_description.'.attribute_meal_id');
		$query = $this->db->get($this->_attribute_meal);
		if ($query->num_rows() > 0) {
            return $query->result_array()[0];
        }
        return false;
	}
	public function updateTourAttributeMeal($id,$data_update){
		$this->db->where("attribute_meal_id",$id);
		$this->db->update($this->_attribute_meal,$data_update);
	}
	public function updateTourAttributeMealDescription($id,$data_update){
		$this->db->where("attribute_meal_id",$id);
		$this->db->update($this->_attribute_meal_description,$data_update);
	}
	public function getTourSearch($search_name){
		$this->db->like('name',$search_name);
		$this->db->join($this->_attribute_meal_description,$this->_attribute_meal.'.attribute_meal_id='.$this->_attribute_meal_description.'.attribute_meal_id');
		$this->db->order_by($this->_attribute_meal.'.attribute_meal_id','DESC');
		$query = $this->db->get($this->_attribute_meal);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
	}
}
?>