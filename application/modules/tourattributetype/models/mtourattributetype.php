<?php
class Mtourattributetype extends CI_Model{
	protected $_attribute_type = "attribute_type";
	protected $_attribute_type_description = "attribute_type_description";

	public function __construct() {
        parent::__construct();
    }
    public function getTourAttributeType($start,$limit,$filter) {
    	$this->db->select($this->_attribute_type.'.attribute_type_id,name,sort_order');
    	if($limit != 0){
			$this->db->limit($limit, $start);
		}
		if(isset($filter['name'])){
			$this->db->like($this->_attribute_type_description.'.name',$filter['name']);
		}
		$this->db->join($this->_attribute_type_description,$this->_attribute_type.'.attribute_type_id='.$this->_attribute_type_description.'.attribute_type_id');
		$this->db->order_by($this->_attribute_type.'.attribute_type_id','DESC');
		$query = $this->db->get($this->_attribute_type);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
    }
    public function getTotalTourAttributeType($filter){
		if(isset($filter['name'])){
			$this->db->like($this->_attribute_type_description.'.name',$filter['name']);
		}
		$this->db->join($this->_attribute_type_description,$this->_attribute_type.'.attribute_type_id='.$this->_attribute_type_description.'.attribute_type_id');
		return $this->db->count_all_results($this->_attribute_type);
	}
	public function insertTourAttributeType($data){
		$this->db->insert($this->_attribute_type,$data);
		return $this->db->insert_id();
	}
	public function insertTourAttributeTypeDescription($data){
		$this->db->insert($this->_attribute_type_description,$data);
		return $this->db->insert_id();
	}
	public function deleteTourAttributeType($id){
		/*xóa tour trong bảng tour Attribute Group*/
		$this->db->where('attribute_type_id', $id);
		$this->db->delete($this->_attribute_type);
		/*xóa giá tour liên quan*/
		$this->db->where('attribute_type_id',$id);
		$this->db->delete($this->_attribute_type_description);
	}
	public function getTourAttributeTypeByID($id){
		$this->db->where($this->_attribute_type.'.attribute_type_id',$id);
		$this->db->join($this->_attribute_type_description,$this->_attribute_type.'.attribute_type_id='.$this->_attribute_type_description.'.attribute_type_id');
		$query = $this->db->get($this->_attribute_type);
		if ($query->num_rows() > 0) {
            return $query->result_array()[0];
        }
        return false;
	}
	public function updateTourAttributeType($id,$data_update){
		$this->db->where("attribute_type_id",$id);
		$this->db->update($this->_attribute_type,$data_update);
	}
	public function updateTourAttributeTypeDescription($id,$data_update){
		$this->db->where("attribute_type_id",$id);
		$this->db->update($this->_attribute_type_description,$data_update);
	}
	public function getSearchTourAttributeType($search_name){
		$this->db->like('name',$search_name);
		$this->db->join($this->_attribute_type_description,$this->_attribute_type.'.attribute_type_id='.$this->_attribute_type_description.'.attribute_type_id');
		$this->db->order_by($this->_attribute_type.'.attribute_type_id','DESC');
		$query = $this->db->get($this->_attribute_type);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
	}
}
?>