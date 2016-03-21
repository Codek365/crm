<?php
class Mtourattribute extends CI_Model{
	protected $_attribute = "attribute";
	protected $_attribute_description = "attribute_description";
	protected $_attribute_group_description = "attribute_group_description";

	public function __construct() {
        parent::__construct();
    }
    public function getTourAttribute($start,$limit,$filter) {
    	$this->db->select($this->_attribute.'.attribute_id,'.$this->_attribute_description.'.name,'.$this->_attribute.'.attribute_group_id,'.$this->_attribute_group_description.'.name AS name_group,'.$this->_attribute.'.sort_order');
    	if($limit != 0){
			$this->db->limit($limit, $start);
		}
		if(isset($filter['attribute'])){
			$this->db->like($this->_attribute_description.'.name',$filter['attribute']);
		}
		if(isset($filter['name_group'])){
			$this->db->like($this->_attribute_group_description.'.name',$filter['name_group']);
		}
		$this->db->join($this->_attribute_description,$this->_attribute.'.attribute_id='.$this->_attribute_description.'.attribute_id','left');
    	$this->db->join($this->_attribute_group_description,$this->_attribute.'.attribute_group_id='.$this->_attribute_group_description.'.attribute_group_id','left');
		$this->db->order_by($this->_attribute.'.attribute_id','DESC'); 
		$query = $this->db->get($this->_attribute);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
    }
    public function getTotalTour($filter){
		if(isset($filter['attribute'])){
			$this->db->like($this->_attribute_description.'.name',$filter['attribute']);
		}
		if(isset($filter['name_group'])){
			$this->db->like($this->_attribute_group_description.'.name',$filter['name_group']);
		}
		$this->db->join($this->_attribute_description,$this->_attribute.'.attribute_id='.$this->_attribute_description.'.attribute_id','left');
    	$this->db->join($this->_attribute_group_description,$this->_attribute.'.attribute_group_id='.$this->_attribute_group_description.'.attribute_group_id','left');
		return $this->db->count_all_results($this->_attribute);
	}
	public function insertTourAttribute($data){
		$this->db->insert($this->_attribute,$data);
		return $this->db->insert_id();
	}
	public function insertTourAttributeDescription($data){
		$this->db->insert($this->_attribute_description,$data);
		return $this->db->insert_id();
	}
	public function deleteTourAttribute($tour_id){
		/*xóa tour trong bảng tour Attribute*/
		$this->db->where('attribute_id', $tour_id);
		$this->db->delete($this->_attribute);
		/*xóa giá tour liên quan*/
		$this->db->where('attribute_id',$tour_id);
		$this->db->delete($this->_attribute_description);
	}
	public function getTourAttributeByID($id){
		$this->db->where($this->_attribute.'.attribute_id',$id);
		$this->db->join($this->_attribute_description,$this->_attribute.'.attribute_id='.$this->_attribute_description.'.attribute_id','left');
		$query = $this->db->get($this->_attribute);
		if ($query->num_rows() > 0) {
            return $query->result_array()[0];
        }
        return false;
	}
	public function updateTourAttribute($id,$data_update){
		$this->db->where("attribute_id",$id);
		$this->db->update($this->_attribute,$data_update);
	}
	public function updateTourAttributeDescription($id,$data_update){
		$this->db->where("attribute_id",$id);
		$this->db->update($this->_attribute_description,$data_update);
	}
	public function getSearchTourAttribute($search_name){
		$this->db->select($this->_attribute.'.attribute_id,'.$this->_attribute_description.'.name,'.$this->_attribute.'.attribute_group_id,'.$this->_attribute_group_description.'.name AS name_group,'.$this->_attribute.'.sort_order');
		$this->db->like($this->_attribute_description.'.name',$search_name);
		$this->db->or_like($this->_attribute_group_description.'.name',$search_name);
		$this->db->join($this->_attribute_description,$this->_attribute.'.attribute_id='.$this->_attribute_description.'.attribute_id','left');
    	$this->db->join($this->_attribute_group_description,$this->_attribute.'.attribute_group_id='.$this->_attribute_group_description.'.attribute_group_id','left');
		$this->db->order_by($this->_attribute.'.attribute_id','DESC'); 
		$query = $this->db->get($this->_attribute);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
	}
}
?>